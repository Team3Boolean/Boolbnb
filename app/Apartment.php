<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title', 
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
        'user_id'
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
        return $this->belongsToMany('App\Sponsorship');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}
