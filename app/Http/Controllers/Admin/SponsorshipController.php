<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorship;
use Braintree;

class SponsorshipController extends Controller
{
    public function payment(Apartment $apartment){

        $data = $request->all();
        $sponsorship = $data['sponsorship_id'];

        return view('admin.apartments.sponsorships.payment', ['apartment' => $apartment, 'sponsorship' =>$sponsorship]);
    }
}
