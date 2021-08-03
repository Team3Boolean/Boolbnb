<?php

namespace App\Rules;

use App\Apartment;
use Illuminate\Contracts\Validation\Rule;

class ValidApartment implements Rule
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
        // prendiamo l' appartamento passato per id
        $apartment = Apartment::find($value);

        // se il prodotto esiste ritorniamo true, altrimenti false
        if ($apartment) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
