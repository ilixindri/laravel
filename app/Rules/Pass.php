<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class Pass implements ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        // Permitir apenas senhas que consistem em espaços em branco
        if (!preg_match('/^\s*$/', $value)) {
            $fail('The :attribute must consist of only whitespace characters.');
        }
    }
}