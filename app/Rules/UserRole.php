<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Str;

use Illuminate\Contracts\Validation\ValidationRule;

class UserRole implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (strtolower($value) !== 'user') {
            $fail('The :attribute must be "user')->translate();
        }
    }
}
