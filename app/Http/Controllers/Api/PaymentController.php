<?php


//commit di prova
namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;

class PaymentController extends Controller
{
    public function generateToken(Request $request, Gateway $gateway)
    {

        // creiamo la variabile token alla quale assegnamo il token generato:
        $token = $gateway->clientToken()->generate();

        $data = [
            "success" => true,
            "token" => $token
        ];

        // ritorniamo il json con il token
        return response()->json($data, 200);
    }

    // creo metodo per invio pagamento
    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {

        // prendo l appartamento richiesto
        $apartment = Apartment::find($request->apartment);

        $sponsorship = Sponsorship::find($request->sponsorship);

        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'apartment' => $apartment->id,
            // 'amount' => 9.99,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]

        ]);

        if ($result->success) {
            $data = [
                "success" => true,
                "message" => "transazione eseguita"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                "success" => false,
                "message" => "transazione fallita"
            ];
            return response()->json($data, 200);
        }

        // return response()->json($data); 

    }
}
