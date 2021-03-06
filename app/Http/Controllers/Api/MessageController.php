<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;

use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return response()->json([
            "success" => true,
            "results" => $messages
        ]);
    }
    
    //ritorna dati sottoforma di array - converte json
    /**
     * @param Message $message
     * @return MessageResource
     */
    public function show(Message $message):MessageResource{
        return new MessageResource($message);       
    }

    public function store(Request $request){

        //creare un messaggio
        //controllo validazioni
        $request->validate([
            'text' => 'required|max:1000|min:10',
            'email' => 'required',
        ]);
        dump($request);
        return;

        $message = Message::create($request->all());
        
        //return con messaggio creato. uso MessageResource
        return new MessageResource($message);

    }
}
