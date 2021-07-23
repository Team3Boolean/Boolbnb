<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{    
    public function show($id){
        
        $apartment = Apartment::findOrFail($id);

        return view('apartments.show', ['apartment' => $apartment]);
    }
}
