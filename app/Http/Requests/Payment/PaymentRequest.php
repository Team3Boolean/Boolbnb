<?php

namespace App\Http\Requests\Payment;

use App\Rules\ValidApartment;
use App\Rules\ValidSponsorship;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "token" => "required",
            "apartment" => [
                "required",
                new ValidApartment()
            ],
            "sponsorship" => [
                "required",
                new ValidSponsorship()
            ]
        ];
    }
}
