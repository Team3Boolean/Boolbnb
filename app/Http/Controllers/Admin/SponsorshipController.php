<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use DateTime;
use Braintree\Gateway;
use App\User;
class SponsorshipController extends Controller
{
    public function index(Apartment $apartment){
        $sponsorships = Sponsorship::all();
        // $gateway = new Braintree\Gateway(config('braintree'));
        // $client_token = $gateway->ClientToken()->generate(); 
        return view("admin.sponsorships.index", ['apartment' => $apartment, 'sponsorships'=>$sponsorships]);
    }




    //funzione per storare sponsorizzazione in tabella
    public function store(Request $request,Apartment $apartment){

    $id= Apartment::findOrFail($apartment['apartment_id']);
    $new_sponsorship = new Sponsorship();

    $request->validate([
        'option' => 'required|string|min:4|max:6'
    ]);

    $data = $request->all();
    $now = new DateTime(now());
    $verify = null;
    $sponsorship = [];

    if($data['option'] === 'bronze') {
        $verify = true;
        $sponsorship = [
            'name' => 'bronze',
            'price' => 2.99,
            'duration' => 24,
            'starting_at' =>$now,
            'end_date' => $now->modify('+1 day'),
            'apartment_id' => $id,
        ];
    }
    if($data['option'] === 'silver') {
        $verify = true;
        $sponsorship = [
            'name' => 'silver',
            'price' => 4.99,
            'duration' => 72,
            'starting_at' =>$now,
            'end_date' => $now->modify('+3 day'),
            'apartment_id' => $id,
        ];
    }
    if($data['option'] === 'gold') {
        $verify = true;
        $sponsorship = [
            'name' => 'gold',
            'price' => 9.99,
            'duration' => 144,
            'starting_at' =>$now,
            'end_date' => $now->modify('+6 day'),
            'apartment_id' => $id,
        ];
    }

    if($verify) {

        $new_sponsorship->fill($sponsorship);
        $new_sponsorship->accomodation_id = $id;

        $new_sponsorship->save();
    }

    return redirect()->route('admin.apartments.show', ['apartment' => $apartment]);

    }
}
