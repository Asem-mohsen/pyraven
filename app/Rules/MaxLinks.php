<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxLinks implements ValidationRule
{
    public function __construct(private int $max = 2) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = preg_match_all('~(https?://|www\.)~i', (string) $value);

        if ($count > $this->max) {
            $fail(__('site.form.max_links', ['max' => $this->max]));
        }
    }
}
