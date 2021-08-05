<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Message;
use App\Apartment;
use App\User;
use Carbon\Carbon;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {   
       
        //recuper utente
        $user = Auth::user();
        //voglio anche appartamenti dello user
        $apartments = $user->apartments;
     
        
        //cerco messaggi utente - array
        $received_messages = [];
        // ciclo su appartamenti
        foreach ($apartments as $apartment){
            // ciclo su messaggi
      
            foreach ($apartment->messages as $message){
                

                $message['received'] =  Carbon::parse($message->created_at)->format("d/m/y h:i:s");
                
                if($message->apartment_id === $apartment->id){

                    $message['apartment_title'] = $apartment->title;
                    $received_messages[] = $message;
                }
            }
        }
        return view('admin.messages.index', ['received_messages' => $received_messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // return view('admin.messages.show', ['message' => $message]);
    }

}
