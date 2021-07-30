<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApartmentResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Apartment;
use App\User;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with("sponsorships")->orderBy('created_at','DESC')->get();
        //$apartments = apartment::all();
        
        foreach ($apartments as $apartment) {
          $apartment->img_cover = $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://via.placeholder.com/250';
          $apartment->link = route("apartments.show", $apartment->id);
    
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


    
    public function filter(Request $request){
      $filters = $request->only(["title", "address", "services", "sponsorships"]);

      $result = Apartment::with(["services","sponsorships"]);
    
      foreach ($filters as $filter => $value) {
         
         if($filter === "services") {	  
    
           if(!is_array($value)){
              $value = explode(",", $value);
           }
    
           $result->whereIn("service_id", $value);
           //$result->whereNotNull("category_id");
           
      } else if ($filter === "sponsorships") {
             if (!is_array($value)) {
        $value = explode(",", $value);
             }
    
           $result->join("apartment_sponsorship", "apartment.id", "=", "apartment_sponsorship.apartment_id")
                  ->whereIn("apartment_sponsorship.sponsorship_id", $value);
        } else {
              $result->where($filter, "LIKE", "%$value%");
              }
      }

      $apartments = $result->get();

      foreach ($apartments as $apartment) {
        $apartment->img_cover = $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://via.placeholder.com/250';
        $apartment->link = route("apartments.show", $apartment->id);

        if (strlen($apartment->description) > 100) {
          $apartment->description = substr($apartment->description, 0, 100) . "...";
        }

      }
    
    
      return response()->json([
          "success"=> true,
          "filters" => $filters,
          "query" => $result->getQuery()->toSql(),
          "results" => $apartments
      ]);
    }

    public function searchFilteredApartments(Request $request){

     

     /*  $data = $request->all();
      $request->validate([
          'rooms' => 'numeric | max: 127',
          'bathrooms' => 'numeric | max: 127',
          'beds' => 'numeric | max: 127',
          'mq' => 'numeric | max: 3000',
          'radius' => 'numeric | max: 20038'
      ]); */

      $lat = 41.001520;
      $long = 16.796250;
      $distance = 20;
      $rooms = 1;
      $bathrooms = 1;
      $beds = 1;
      $mq = 50;

      if ( isset($data['services']) ) {
        $services = $data['services'];
      }

      if ( isset($data['radius']) ) {
       $radius_km = $data['radius'];
      } 
      //provo a passare distanza con funzione di Haversine - uso metodo selectRaw()
      $apartments = Apartment::selectRaw("* , ( 6371 * acos( cos( radians(gps_lat) ) * cos( radians(`gps_lat` ) ) * cos( radians( `gps_lng` ) - radians(gps_lng) ) + sin( radians(gps_lat) ) * sin( radians( `gps_lat` ) ) ) ) AS distance")
        //seleziono le caratteristiche che seleziona ricerca
        ->where('rooms', '>=', $rooms)
        ->where('bathrooms', '>=', $bathrooms)
        ->where('beds', '>=', $beds)
        ->where('mq', '>=', $mq)
        ->where('searchable', '=', true)
        ->having( 'distance', '<', $distance )
        ->orderBy('distance', 'asc' )
        ->get();
        //controllo su servizi
        if(isset($data['services'])){
          // cicliamo su ogni appartamento per vedere se ha servizi
          foreach($apartments as $apartment){
            $ap_services=[];
            //array servizi vuoto
            foreach ($apartment->services as $service){
              $ap_services[] = $service;
            }
          }
        }
        //controllo che appartamento abbia la sponsorizzazione attiva per posizionarlo primo nella ricerca
        // if($data['searchable'] == true){

        // }

        return response()->json([
          "success" => true,
          "results" => $apartments        
        ]);
    }


    public function findNearestHouse($latitude, $longitude, $radius = 20) {
      $apartments = DB::table('apartments') -> selectRaw("id, title, description, price, rooms, bathrooms, beds, address, img_cover, searcheable, gps_lat, latitude, longitude, user_id ,
                       ( 6371 * acos( cos( radians(?) ) *
                         cos( radians( latitude ) )
                         * cos( radians( longitude ) - radians(?)
                         ) + sin( radians(?) ) *
                         sin( radians( latitude ) ) )
                       ) AS distance", [$latitude, $longitude, $radius])
      ->having("distance", "<", $radius)
      ->orderBy("distance",'asc')
      ->get();

      return response()->json([
        "success" => true,
        "results" => $apartments        
      ]);
    }
}