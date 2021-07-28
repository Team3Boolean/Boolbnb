<?php

namespace App\Http\Controllers\Api;


use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\PaymentRequest;


class PaymentController extends Controller
{
    // creo metodo per la generazione del token
    public function generateToken(Request $request, Gateway $gateway){
        
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
    public function makePayment(PaymentRequest $request, Gateway $gateway){
    

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if($result->success){
            $data = [
                "success" => true,
                "message" => "transazione eseguita"
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                "success" => false,
                "message" => "transazione fallita"
            ];
            return response()->json($data, 200); 
        }

        // return response()->json($data); 

    }
}
