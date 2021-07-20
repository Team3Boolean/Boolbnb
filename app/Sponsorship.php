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
        return $this->belongsToMany('App\Apartment');
    } 
}
