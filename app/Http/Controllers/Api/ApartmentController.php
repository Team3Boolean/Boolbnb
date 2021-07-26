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
    public function filter(Request $request){
      $filters = $request->only(["title", "address", "services", "sponsorships"]);

      $result = Apartment::with(["services","sponsorships"]);
    
      foreach ($filters as $filter => $value) {
         
         if($filter === "services") {	  
    
           if(!is_array($value)){
              $value = explode(",", $value);
           }
    
           $result->whereIn("category_id", $value);
           //$result->whereNotNull("category_id");
           
      } else if ($filter === "sponsorships") {
             if (!is_array($value)) {
        $value = explode(",", $value);
             }
    
           $result->join("post_tag", "post.id", "=", "post_tag.post_id")
                  ->whereIn("post_tag.tag_id", $value);
        } else {
        $result->where($filter, "LIKE", "%$value%");
              }
      }
    
    
      return response()->json([
          "success"=> true,
          "filters" => $filters,
          "query" => $result->getQuery()->toSql(),
          "results" => $result->get()
      ]);
    }

}


    
