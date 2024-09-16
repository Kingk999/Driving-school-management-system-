<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class pricevalidation implements Rule
{
    public function passes($attribute, $value)
    {
        return is_numeric($value) && $value >= 0;
    }

    public function message()
    {
        return 'The :attribute must be a positive number.';
    }
}


