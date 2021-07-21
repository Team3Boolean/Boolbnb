<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ApartmentSponsorship extends Pivot
{
    protected $fillable = [
        'apartment_id',
        'sponsorship_id',
        'starting_at',
        'expiring_at'  
    ];
}
