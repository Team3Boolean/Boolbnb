<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApartmentResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Apartment;
use App\User;

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

  public function takeApartment(Request $request)
  {
    $data = [
      // 'apartments' => Apartment::orderBy("created_at", "DESC")
      //   ->where("user_id", $request->user()->id)
      //   ->get()
      'apartmets' => Apartment::all()
    ];

    return response()->json($data);
  }
}