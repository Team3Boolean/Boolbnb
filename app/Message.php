<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'email',
        'date',
        'ip',
        'apartment_id'
    ];

    public function apartment()
    {
        return $this->belongsTo("App\Aparment");
    }
}
