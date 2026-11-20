<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Rejects reserved/test domains and common disposable inbox providers.
 */
class NotBlockedEmailDomain implements ValidationRule
{
    private const BLOCKED = [
        'example.com', 'example.org', 'example.net', 'test.com', 'test.test', 'email.com',
        'mailinator.com', 'guerrillamail.com', 'guerrillamail.net', 'guerrillamailblock.com',
        'sharklasers.com', 'grr.la', '10minutemail.com', '10minutemail.net', 'tempmail.com',
        'temp-mail.org', 'tempmail.net', 'tempmailo.com', 'tempr.email', 'throwawaymail.com',
        'yopmail.com', 'yopmail.net', 'trashmail.com', 'trashmail.de', 'getnada.com', 'nada.email',
        'dispostable.com', 'maildrop.cc', 'mailnesia.com', 'mintemail.com', 'fakeinbox.com',
        'mohmal.com', 'emailondeck.com', 'spamgourmet.com', 'mytemp.email', 'burnermail.io',
        'moakt.com', 'inboxkitten.com', 'mailpoof.com', 'getairmail.com', 'discard.email',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $domain = strtolower(substr(strrchr((string) $value, '@') ?: '', 1));

        if (! preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,}$/', $domain)
            || in_array($domain, self::BLOCKED, true)
            || preg_match('/(^|\.)(test|example|invalid|localhost|local)$/', $domain)
            || preg_match('/^(example|test)\./', $domain)) {
            $fail(__('site.form.real_email'));
        }
    }
}
