<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Tel implements Rule
{
    /**
     * Create a new rule instance.
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^0\d{2,3}-\d{1,4}-\d{4}$/u', $value) || preg_match('/^0\d{9,10}$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '不正な電話番号です。';
    }
}
