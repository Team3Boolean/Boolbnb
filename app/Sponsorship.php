<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'payment_response'
    ];

    public function apartments()
    {
        return $this->ManyToMany('App\Apartment')
            ->withPivot('starting_at', 'expiring_at')
            ->using('App\ApartmentSponsorship')
            ->withTimestamps();

    }

}
