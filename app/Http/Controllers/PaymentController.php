<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use App\User;
use BrainTree;
use Braintree\Transaction;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function make(Request $request)
    {
        //echo($clientToken = $gateway->clientToken()->generate());
        $sponsorshipName = $request->input('value');

        if($sponsorshipName === 'bronze') {
            $promotion= [
                'name' => 'bronze',
                'price' => 2.99,
                'duration' => 24,
            ];
        }
        if($sponsorshipName === 'silver') {
            $promotion= [
                'name' => 'silver',
                'price' => 4.99,
                'duration' => 72,
            ];
        }
        if($sponsorshipName === 'gold') {
            $promotion= [
                'name' => 'gold',
                'price' => 9.99,
                'duration' => 144,
            ];
        }

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $status = Transaction::sale([
            'amount' => $promotion['price'],
            'paymentMethodNonce' => $nonce,
            'options' => [
            'submitForSettlement' => True
            ]
        ]);

        if($status->success){
            $sponsorship = new Sponsorship();
            $sponsorship->accomodation_id =  $request->input('flat');
            $sponsorship->name = $promotion['name'];
            $sponsorship->duration = $promotion['duration'];
            $sponsorship->starting_at = $promotion['created_at'];
            $sponsorship->price = $promotion['price'];

            $sponsorship->end_date = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $sponsorship->duration)));
            $sponsorship->save();

            return response()->json($status);
        }else{
            return response()->json($status);
        }
    }
}
