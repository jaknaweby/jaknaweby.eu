<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoSpecialCharactersAndHyphen implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/[^\w\s\áéíóúýěščřžďťňĺľäô]/iu', $value)) {
            $fail('The :attribute may contain only the letters of the czech alphabet');
        }
    }
}
