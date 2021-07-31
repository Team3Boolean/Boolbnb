<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Sponsorship;
use App\ApartmentSponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\PaymentRequest;

class PaymentController extends Controller
{

    public function generateToken(Request $request, Gateway $gateway)
    {
        //  creiamo la variabile token alla quale assegnamo il token generato:
            $token = $gateway->clientToken()->generate();
        
            $data = [
                'success' => true,
                'token' => $token
            ];

            return response()->json($data, 200);
    }
    
    public function makePayment(PaymentRequest $request, Gateway $gateway){

       // $apartment = Apartment::find($request->apartment);
        $prezzi = Apartment::find($request->apartment)->sponsorships()->orderBy('price')->get();
       
        return response()->json($prezzi);

        //la variabile che contiene il prezzo della sponsorizzazie
       // $sponsorshipPrice = $apartment->pivot->price;

        return response()->json($sponsorshipPrice);

        $result = $gateway->transaction()->sale([
            'amount'=> $sponsorshipPrice,
            // 'amount'=>$apartment->sponsorships()->price,
            // 'amount'=> 88,
            'paymentMethodNonce'=>$request->token,
            'options'=>[
                'submitForSettlement'=>true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => 'transazione eseguita'
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'success' => false,
                'message' => 'transazione fallita'
            ];
            
            return response()->json($data, 200);
        }
        // non troa nulla nella ponte
        
    }
            
    
}