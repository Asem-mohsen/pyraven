<?php

namespace App\Http\Requests;

use App\Rules\MaxLinks;
use App\Rules\NotBlockedEmailDomain;
use App\Rules\Turnstile;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreContactUsRequest extends FormRequest
{
    /** Minimum seconds between page render and submit (time trap). */
    public const MIN_FILL_SECONDS = 3;


    /** Send failed submissions back to the contact page in the visitor's language. */
    protected function getRedirectUrl()
    {
        return lroute('contact');
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $clean = fn ($v) => trim(preg_replace('/[\r\n\t]+/', ' ', strip_tags((string) $v)));

        $this->merge([
            'name' => $clean($this->input('name')),
            'email' => strtolower(trim((string) $this->input('email'))),
            // Strip only formatting characters; anything else (letters, symbols) must fail validation.
            'phone' => preg_replace('/[\s\-().]/', '', (string) $this->input('phone')) ?: null,
            'subject' => $clean($this->input('subject')) ?: null,
            'message' => trim(strip_tags((string) $this->input('message'))),
        ]);
    }

    public function rules(): array
    {
        $emailRule = app()->environment('production') ? 'email:rfc,dns,spoof' : 'email:rfc,spoof';

        $rules = [
            'name' => ['required', 'string', 'min:2', 'max:80', 'regex:/^[\pL\pM\s\'\-\.]+$/u'],
            'email' => ['required', 'string', 'max:150', $emailRule, new NotBlockedEmailDomain],
            'phone' => ['nullable', 'regex:/^\+?\d{8,15}$/'],
            'subject' => ['nullable', 'string', 'max:120'],
            'message' => ['required', 'string', 'min:20', 'max:3000', new MaxLinks(2)],
            'website' => ['prohibited'], // honeypot — must stay empty
            '_ts' => ['required', 'string'],
        ];

        if (Turnstile::enabled()) {
            $rules['cf-turnstile-response'] = ['required', 'string', new Turnstile];
        }

        return $rules;
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                try {
                    $renderedAt = (int) decrypt((string) $this->input('_ts'));
                } catch (DecryptException) {
                    $renderedAt = null;
                }

                if ($renderedAt === null || now()->timestamp - $renderedAt < self::MIN_FILL_SECONDS) {
                    $validator->errors()->add('_ts', __('site.form.too_fast'));
                }
            },
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => __('site.form.name_regex'),
            'phone.regex' => __('site.form.phone_regex'),
            'email.email' => __('site.form.email_invalid'),
            'website.prohibited' => __('site.form.not_sent'),
            '_ts.required' => __('site.form.reload'),
            'cf-turnstile-response.required' => __('site.form.verify'),
        ];
    }

    /** Only the fields we persist. */
    public function contactData(): array
    {
        return $this->safe()->only(['name', 'email', 'phone', 'subject', 'message']);
    }
}
