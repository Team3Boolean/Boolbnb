<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title', 
        'slug',
        'description', 
        'rooms', 
        'beds', 
        'bathrooms', 
        'mq', 
        'address', 
        'gps_lng', 
        'gps_lat', 
        'img_cover', 
        'searchable', 
        'user_id',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function dailyPageViews()
    {
        return $this->hasMany("App\DailyPageView");
    }

    public function messages()
    {
        return $this->hasMany("App\Message");
    }
    
    public function sponsorships()
    {
        return $this->belongsToMany('App\Sponsorship')
        ->using('App\ApartmentSponsorship')
        // ->withPivot('starting_at', 'expiring_at')
        ->with('price')
        ->withTimestamps();
    }
    


    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}
