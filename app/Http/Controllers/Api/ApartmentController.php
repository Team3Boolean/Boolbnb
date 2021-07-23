<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Apartment;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::with("sponsorships")->orderBy('created_at','DESC')->get();
        //$apartments = apartment::all();
        
        foreach ($apartments as $apartment) {
          $apartment->img_cover = $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://via.placeholder.com/250';
          //$apartment->link = route("apartments.show", ['apartment' => $apartment]);
    
          if (strlen($apartment->description) > 100) {
            $apartment->description = substr($apartment->description, 0, 100) . "...";
          }
        }
    
        return response()->json([
          "success" => true,
          "results" => $apartments
        ]);
    }
    public function apartmentSearch(){
        //funzione per filtrare appartamenti in ricerca no refresh
    }

}


    