<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Message;
use App\Apartment;
use App\User;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Apartment $apartments)
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
                $received_messages[] = $message;
            }
        }
        return view('admin.messages.index', ['received_messages' => $received_messages]);
        // $data = [
        //     'messages' => Message::join("apartments", "apartments.id", "=", "messages.apartment_id")
        //     ->get()
        // ];
        // return view("admin.messages.index", $data);
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
    public function destroy(Message $message)
    {
        // // elimino id appartamento dall' oggetto
        $message->apartment()->detach();
        $message->delete();

        return redirect()->route('admin.apartments.index');
    }

}
