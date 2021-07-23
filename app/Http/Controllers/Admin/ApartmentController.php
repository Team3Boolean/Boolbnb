<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Prendo tutti gli appartamenti e li invio alla view
        // dump($request);
        // $apartments = Apartment::all();

        $data = [
            'apartments' => Apartment::orderBy("created_at", "DESC")
            ->where("user_id", $request->user()->id)
            ->get()
        ];

        
        return view("admin.apartments.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ritorno la pagina di create
        return view('admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // prendiamo i dati
        $form_data = $request->all();

        // istanziamo un nuovo oggetto Apartment
        $new_apartment = new Apartment();

        // inseriamo tutti i dati con fill nel nuovo oggetto
        $new_apartment->fill($form_data);

        // inseriamo i dati utente che crea il post,non lo lasciamo al fillable per ragioni di sicurezza
        $new_apartment->user_id = $request->user()->id;

        // salvo e reindirizzo l' utente
        $new_apartment->save();
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        // ritorno la pagina di show e invio l appartamento
        return view('admin.apartments.show', ['apartment' => $apartment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        return view('admin.apartments.edit', ["apartment" => $apartment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $form_data = $request->all();

        $apartment->update($form_data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }
}
