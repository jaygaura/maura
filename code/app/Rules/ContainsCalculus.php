<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContainsCalculus implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $choices = json_decode($value);
        return false !== array_search('calculus', array_map('strtolower', $choices), true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'one of the selected cources has to be calculus.';
    }
}