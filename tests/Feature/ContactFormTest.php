<?php

namespace Tests\Feature;

use App\Mail\ContactInquiry;
use App\Models\ContactUs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['services.turnstile.site_key' => null, 'services.turnstile.secret' => null]);
        RateLimiter::clear('contact');
        Mail::fake();
    }

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Sara Ahmed',
            'email' => 'sara.ahmed@gmail.com',
            'phone' => '+20 100 123 4567',
            'subject' => 'New app',
            'message' => 'We would like a quote for a Flutter app with a Laravel backend.',
            'website' => '',
            '_ts' => encrypt(now()->subSeconds(30)->timestamp),
        ], $overrides);
    }

    private function submit(array $overrides = [], string $ip = '10.0.0.1', string $url = '/contact')
    {
        return $this->withServerVariables(['REMOTE_ADDR' => $ip])->post($url, $this->payload($overrides));
    }

    public function test_valid_submission_is_saved_and_emailed(): void
    {
        config(['app.email' => 'info@pyraven.com']);

        $this->submit()->assertRedirect(route('contact'))->assertSessionHasNoErrors()->assertSessionHas('success');
        $this->assertDatabaseHas('contact_us', ['email' => 'sara.ahmed@gmail.com', 'phone' => '+201001234567']);

        Mail::assertSent(ContactInquiry::class, function (ContactInquiry $mail) {
            // From stays the site's own MAIL_FROM_ADDRESS; the visitor is only Reply-To.
            return $mail->hasTo('info@pyraven.com')
                && $mail->hasReplyTo('sara.ahmed@gmail.com');
        });
    }

    public function test_inquiry_is_kept_when_mail_fails(): void
    {
        Mail::shouldReceive('to')->andThrow(new \RuntimeException('SMTP down'));

        $this->submit()->assertRedirect(route('contact'))->assertSessionHas('success');
        $this->assertSame(1, ContactUs::count());
    }

    public function test_header_injection_in_subject_is_neutralised(): void
    {
        $this->submit(['subject' => "Hi\r\nBcc: victim@gmail.com"]);

        Mail::assertSent(ContactInquiry::class, fn ($mail) => ! str_contains($mail->envelope()->subject, "\n"));
    }

    public function test_failed_validation_returns_to_contact_page(): void
    {
        $this->submit(['email' => 'test@example.com'])->assertRedirect(route('contact'));
    }

    public static function invalidCases(): array
    {
        return [
            'example.com email' => [['email' => 'test@example.com'], 'email'],
            'disposable email' => [['email' => 'x@mailinator.com'], 'email'],
            'no tld email' => [['email' => 'a@b'], 'email'],
            'whitespace name' => [['name' => ' '], 'name'],
            'long name' => [['name' => str_repeat('a', 81)], 'name'],
            'html in name' => [['name' => '<script>alert(1)</script>'], 'name'],
            'short message' => [['message' => 'hi'], 'message'],
            'long message' => [['message' => str_repeat('a', 3001)], 'message'],
            'too many links' => [['message' => 'see http://a.com http://b.com http://c.com http://d.com http://e.com'], 'message'],
            'letters in phone' => [['phone' => 'abc!!'], 'phone'],
            'honeypot filled' => [['website' => 'http://spam.biz'], 'website'],
            'too fast' => [['_ts' => 'NOW'], '_ts'],
            'tampered timestamp' => [['_ts' => '12345'], '_ts'],
        ];
    }

    #[DataProvider('invalidCases')]
    public function test_invalid_submission_is_rejected(array $overrides, string $field): void
    {
        if (($overrides['_ts'] ?? null) === 'NOW') {
            $overrides['_ts'] = encrypt(now()->timestamp);
        }

        $this->submit($overrides)->assertSessionHasErrors($field);
        $this->assertSame(0, ContactUs::count());
        Mail::assertNothingSent();
    }

    public function test_fourth_submission_in_a_minute_is_throttled(): void
    {
        foreach (range(1, 3) as $i) {
            $this->submit([], '10.0.0.9')->assertRedirect();
        }
        $this->submit([], '10.0.0.9')->assertStatus(429);
    }

    public function test_turnstile_required_when_configured(): void
    {
        config(['services.turnstile.site_key' => 'site', 'services.turnstile.secret' => 'secret']);
        $this->submit()->assertSessionHasErrors('cf-turnstile-response');
    }

    public function test_arabic_submission_returns_arabic_messages(): void
    {
        $this->submit([], '10.0.0.5', '/ar/contact')
            ->assertRedirect(url('/ar/contact'))
            ->assertSessionHas('success', fn ($msg) => str_contains($msg, 'شكرًا'));

        Mail::assertSent(ContactInquiry::class, fn ($mail) => $mail->siteLocale === 'ar');
    }

    public function test_arabic_validation_errors_are_in_arabic(): void
    {
        $this->submit(['email' => 'test@example.com', 'message' => 'قصير'], '10.0.0.6', '/ar/contact')
            ->assertRedirect(url('/ar/contact'))
            ->assertSessionHasErrors([
                'email' => 'يُرجى استخدام بريد إلكتروني حقيقي.',
                'message' => 'يجب ألّا يقلّ الرسالة عن 20 حرفًا.',
            ]);
    }

    public function test_arabic_names_are_accepted(): void
    {
        $this->submit(['name' => 'سارة أحمد'], '10.0.0.7', '/ar/contact')->assertSessionHasNoErrors();
    }
}
