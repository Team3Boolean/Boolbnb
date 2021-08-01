<?php

namespace App\Rules;

use App\Sponsorship;
use Illuminate\Contracts\Validation\Rule;

class ValidSponsorship implements Rule
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
        $sponsorship = Sponsorship::find($value);

        // se il prodotto esiste ritorniamo true, altrimenti false
        if ($sponsorship) {
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
