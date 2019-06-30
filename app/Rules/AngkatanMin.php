<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AngkatanMin implements Rule
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
        return $value <= date('Y');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Angkatan harus kurang dari atau sama dengan tahun '.date('Y');
    }
}
