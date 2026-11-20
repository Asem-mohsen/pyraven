<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * Verifies a Cloudflare Turnstile token server-side.
 */
class Turnstile implements ValidationRule
{
    public static function enabled(): bool
    {
        return filled(config('services.turnstile.site_key')) && filled(config('services.turnstile.secret'));
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $response = Http::asForm()->timeout(5)->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => config('services.turnstile.secret'),
                'response' => (string) $value,
                'remoteip' => request()->ip(),
            ]);

            $ok = $response->successful() && $response->json('success') === true;
        } catch (Throwable) {
            $ok = false;
        }

        if (! $ok) {
            $fail(__('site.form.bot_failed'));
        }
    }
}
