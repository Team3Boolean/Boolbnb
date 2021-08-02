<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index(Apartment $apartment)
    {  
        //configurazione del gateway di Braintree
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '2tb4wq3yx2wm33nj',
            'publicKey' => 'r9m8vxj384g343d2',
            'privateKey' => 'c5198ba4bad0934aff1f1423fc8fb5e5'
        ]);

        $client_token = $gateway->ClientToken()->generate();


        return view('admin.payments.index', compact('apartment', 'gateway', 'client_token'));
    }
    //avrà metodo post per creazione tabella ponte
    public function checkout(Request $request, Apartment $apartment){
        $data = $request->all();

        // $amount = $data["amount"];
        // $nonce  = $data["payment_method_nonce"];
        // $sponsorship_id = $data['sponsorship_id'];

        // $result = $gateway->transaction()->sale([
        //     'amount' => $amount,
        //     'paymentMethodNonce' => $nonce,
        //     'options' => [
        //         'submitForSettlement' => true
        //     ]
        // ]);
    }

}
