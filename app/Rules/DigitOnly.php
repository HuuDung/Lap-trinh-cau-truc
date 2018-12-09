<?php

namespace App\Rules;

use function GuzzleHttp\Psr7\str;
use Illuminate\Contracts\Validation\Rule;

class DigitOnly implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        for ($i = 0; $i < strlen($value); $i++) {
            if ($value[$i] < '0' || $value > '9')
                return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Must only number';
    }
}
