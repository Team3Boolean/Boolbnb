<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'text' => 'required|min:20|max:1000'
        ]);

        $data = $request->all();
        //recupero id appartamento
        $apartment_id =$data['apartment_id'];
        //istanza nuovo messaggio
        $new_message = new Message();
        $new_message->apartment_id = $apartment_id;
        $new_message->email = $data['email'];
        $new_message->text = $data['text'];        
        //salvo dati
        $success_message_creation = $new_message->save();
        if(!$success_message_creation) {
            //non esce da form e segnala campi obbligatori con errore (classe bootstrap)
            return redirect()->back()->withInput();
        } else {
            //ritorna messaggio di invio con successo
            return redirect()->back()->with("success", "il messaggio è stato correttamente inviato, l'host vi contatterà via email");
        }
    }    
}
