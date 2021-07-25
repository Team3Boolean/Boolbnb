<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'email',
        'apartment_id'
    ];

    const UPDATED_AT = null;

    public function apartment()
    {
        return $this->belongsTo("App\Aparment");
    }
}
