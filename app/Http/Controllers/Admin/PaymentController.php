<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\Gateway;

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

    public function make(){

    }

}
