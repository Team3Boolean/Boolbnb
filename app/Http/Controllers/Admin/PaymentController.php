<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sponsorship;
class PaymentController extends Controller
{
    public function index(Request $request, Apartment $apartment){


    //    $sponsorships = Sponsorship::all();

        $dataRequest = $request->all();

        // $data = [
        //     "apartment_id" => $dataRequest["apartment_id"],
        //     "sponsorship" => $dataRequest["sponsorship_id"]
        // ];

        dump($dataRequest);




        return view('admin.payments.index', ["data" => $dataRequest]);
    }
}
