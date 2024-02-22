<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UsernameValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (str_contains($value, ' ')) {
            $fail('The :attribute must not contain a space');
        }

        if (preg_match('/[^\w\s]/', $value)) {
            $fail('The :attribute must not contain any special characters');
        }
    }
}
