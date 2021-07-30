<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorship;

class PaymentController extends Controller
{
    
    
    //la funzione ritorna l'id di un appartamento 
    public function getApartmentID(Apartment $apartment)
    {
        return $apartment->id;
    }
    
    //la funzione ritorna l'id di una sponsorship
    public function getSponsorshipID(Sponsorship $sponsorship)
    {
        return $sponsorship->id;
    }
    //la funzione deve restituire la view del  pagamento 
    public function payment(Request $request, Apartment $apartment, Sponsorship $sponsorship)
    {
        $apartmentiID = getApartmentID($apartment);
        $sponsorshipID = getSponsorshipID($sponsorship);
        
        // $data = $request->all();
        // dump($request);
    
        return view('admin.payments.payment', [$apartmentiID,$sponsorshipID]);
    }

    
}
