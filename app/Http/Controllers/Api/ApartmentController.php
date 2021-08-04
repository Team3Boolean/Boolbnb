<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApartmentResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Apartment;
use App\User;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with("services")->with("sponsorships")->orderBy('created_at','DESC')->get();
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
      $filters = $request->only(["address", "rooms", "beds", "services"]);

      // recupero a parte la distanza scelta dall'utente
      $radius = $request->only(['distance']);
      // siccome il request la ritorna come array
      // estrapolo il dato e lo trasformo in un numero
      // cosi' da poterlo utilizzare in seguito per il calcolo della distanza
      $radiusAsNum = (int)$radius['distance'];

      $result = Apartment::with(['services']);

    
      foreach ($filters as $filter => $value) {
         
         if($filter === "services") {	  
    
           if(!is_array($value)){
              $value = explode(",", $value);
           }
    
           $result->join("apartment_service", "apartments.id", "=", "apartment_service.apartment_id")
                  ->where("apartment_service.service_id", $value);
           
        } else {
              $result->where($filter, "LIKE", "%$value%");
              }
      }

      // salvo la lista degli appartamenti che ottengo dopo i filtri
      $filteredApartments = $result->get();

      foreach ($filteredApartments as $apartment) {
        $apartment->img_cover = $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://via.placeholder.com/250';
        $apartment->link = route("apartments.show", $apartment->id);

        if (strlen($apartment->description) > 100) {
          $apartment->description = substr($apartment->description, 0, 100) . "...";
        }

      }

      // faccio una condizione che se non metto la via/paese nella ricerca
      // gli altri filtri vanno lo stesso
      if (isset($filters['address'])) {
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/'. $filters['address'] . '.json?key=rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ&limit=1')->json();

          
  
          $position = [
            'lat' => $response['results'][0]['position']['lat'],
            'lng' => $response['results'][0]['position']['lon'],
          ];
  
          function distance($lat1, $lng1, $lat2, $lng2, $unit) {
            // se la lat e la long combaciano 
            if(($lat1 == $lat2) && ($lng1 == $lng2)) {
              //ritorno 0 perche' i due posti valutati sono identici
              return 0;
            } else {
              //calcolo la differenza della longitudine che mi servira' dopo
              $lngDiff = $lng1 - $lng2;
              
              // per calcolare la distanza trasformo la lat in gradi per poter usare le funzioni trigonometriche di seno e coseno
              $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lngDiff));
              
              // una volta ottenuta la distanza si utilizza la funzione arcocoseno per ottenere una distanza lineare e non in gradi
              $dist = acos($dist);
              
              $dist = rad2deg($dist);
              
              
              $miles = $dist * 60 * 1.1515;
              
              
              
              $distUnitType = strtoupper($unit);
              // si presentano le diverse possibilita' di unita' di misura
              if ($distUnitType == 'K') {
                return ($miles * 1.609344);
              } else {
                return $miles;
              }
            } 
          }
  
          // setto il range di distanza dal punto di ricerca
          $selectedRange = $radiusAsNum ? $radiusAsNum : 10;
          
          // creo una variabile che mi conterra' gli appartamenti che usciranno dopo il filtro per distanza
          // che lascio inizialmente come array vuoto
          $apartments = [];
          
          //tramite un ciclo andro' a popolare l'array con solo gli appartamenti all'interno dell'area scelta
          foreach($filteredApartments as $singleApartment) {
            // per ogni appartmento che soddisfa i filtri si calcola la distanza dal punto cercato e si arrotonda ad 1 cifra dopo la virgola
            $distance = round(distance($response['results'][0]['position']['lat'], $response['results'][0]['position']['lon'], $singleApartment->gps_lat, $singleApartment->gps_lng, 'K'), 1);

            // se la distanza e' minore o uguale al range che e' stato scelto,
            // l'appartamento verra' tenuto in considerazione altrimenti verra' scartato
            if ($distance <= $selectedRange) {
                $apartments[] = $singleApartment;
            }
          }
  
        return response()->json([
            "success"=> true,
            "filters" => $filters,
            "query" => $result->getQuery()->toSql(),
            "position" => $position,
            "results" => $apartments
        ]);

      } else {

        return response()->json([
          "success"=> true,
          "filters" => $filters,
          "query" => $result->getQuery()->toSql(),
          "results" => $filteredApartments
        ]);
      }
    }   
}