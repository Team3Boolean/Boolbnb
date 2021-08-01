<?php


//commit di prova
namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
