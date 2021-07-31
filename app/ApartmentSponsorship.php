<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentSponsorship extends Model
{
    //
    public function apartmentSponsorship()
    {
        return $this->belongsToMany('App\ApartmentSponsorship')
        // ->withPivot('starting_at', 'expiring_at')
        //->withPivot();
        // // ->using('App\ApartmentSponsorship')
        // ->withTimestamps();

    }
    
}

