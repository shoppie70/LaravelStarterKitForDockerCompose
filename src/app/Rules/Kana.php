<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Kana implements Rule
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
        return (bool) preg_match('/^([ァ-ン]|ー)+$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '平仮名で入力してください';
    }
}
