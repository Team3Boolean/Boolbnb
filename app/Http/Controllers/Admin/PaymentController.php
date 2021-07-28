<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function update(Request $request,Apartment $apartment){

            dump($apartment);
        // $form_data =
        // // prima di aggiungere service controlliamo che la chiave esiste
        // if (key_exists('sponsorships', $form_data)) {

        //     // poi con attach specifichiamo i nuovi service da aggiungere
        //     $apartment->sponsorships()->attach($form_data['sponsorships']);
        // }

        // $apartment->update($form_data);

       
    }

    

    
}
