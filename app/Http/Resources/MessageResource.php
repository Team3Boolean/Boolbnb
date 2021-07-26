<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'email' => $this->email,
            'text' => $this->text,
            'apartment_id' => $this->apartment_id,
        ];
        // return parent::toArray($request);  
    }
    

}
