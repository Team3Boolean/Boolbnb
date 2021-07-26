<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            //non esce da form
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->with("success", "il messaggio è stato correttamente inviato, l'host vi contatterà via email");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
