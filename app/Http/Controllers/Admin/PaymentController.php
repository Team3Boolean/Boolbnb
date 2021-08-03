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
            "environment" => "sandbox",
            "merchantId" => "2tb4wq3yx2wm33nj",
            "publicKey" => "r9m8vxj384g343d2",
            "privateKey" => "c5198ba4bad0934aff1f1423fc8fb5e5"
        ]);

        $client_token = $gateway->ClientToken()->generate();


        return view('admin.payments.index', compact('apartment', 'gateway', 'client_token'));
    }
    //avrà metodo post per creazione tabella ponte
    public function checkout(Request $request, Apartment $apartment, Gateway $gateway){

        // $gateway = new Gateway([
        //     "environment" => "sandbox",
        //     "merchantId" => "2tb4wq3yx2wm33nj",
        //     "publicKey" => "r9m8vxj384g343d2",
        //     "privateKey" => "c5198ba4bad0934aff1f1423fc8fb5e5"
        // ]);

        $data = $request->all();
        //dd($data);

        $amount = $data["amount"];
        $nonce  = $data["payment_method_nonce"];
        $sponsorship_id = $data['sponsorship'];

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success || !is_null($result->transaction)) {

            $transaction = $result->transaction;
            
            $starting_at = Carbon::now();

            //nuova sponsorship
            $sponsorship = Sponsorship::find($sponsorship_id);
            
            $expiring_at = $starting_at->copy()->addHours($sponsorship->hours);

            $fields = [
                //'transaction_id' => $transaction->id,
                'amount' => $transaction->amount,
                'starting_at' => $starting_at,
                'expiring_at' => $expiring_at
            ];

            $apartment->sponsorship()->attach($sponsorship_id, $fields);

            // return redirect()->route('admin.apartments.sponsorship.transaction', ['transaction_id' => $transaction->id, 'apartment' => $apartment]);
            return redirect()->route('admin.apartments.show', $apartment);

            } else {
                $errorString = "";
        
                foreach($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }
            
                $_SESSION["errors"] = $errorString;
                redirect()->back()->with("success", "non è stato possibile eseguire il pagamento");
            }
        }

}
