<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApartmentResource;
use Illuminate\Http\Request;
use App\Apartment;
use App\User;

class ApartmentController extends Controller
{
    // public function index()
    // {
    //     $apartments = Apartment::all();
    //     $apartments = Apartment::with("user")->orderBy("created_at", "DESC")->get();
    //     return response()->json([
    //         "success" => true,
    //         "results" => $apartments,
    //     ]);
    // }
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
    //ritorna dati sottoforma di array - converte json
    /**
     * @param Apartment $apartment
     * @return ApartmentResource
     */
    public function show(Apartment $apartment):ApartmentResource{
      return new ApartmentResource($apartment);       
    }
}
