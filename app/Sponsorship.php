<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
    ];
    const UPDATED_AT = null;
    public function apartments()
    {
        return $this->belongsToMany('App\Apartment')
            // ->withPivot('starting_at', 'expiring_at')
        ->withPivot('price');
            // // ->using('App\ApartmentSponsorship')
            // ->withTimestamps();

    }

}
