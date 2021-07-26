<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Service;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // importo i service
        $services = Service::all();
        // dump($services);
        // return;
        // ritorno la pagina di create
        return view('admin.apartments.create', ["services" => $services]);

        // // recuperiamo le categorie
        // $services = Service::all();
        // $apartments = Apartment::all();
        // // creiamo un array per passare i dati
        // $data = [
        //     'apartments' => $apartments,
        //     'services' => $services
        // ];
        // return view('admin.apartments.create', $data);
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
            'services' => 'exists:services,id'
        ]);

        // prendiamo i dati
        $form_data = $request->all();

        // dump($form_data);
        // return;
        // verifico che la chiave img_cover esiste
        if (key_exists("img_cover", $form_data)) {

            // salvo il file immagine creando la cartella apartmentsCover
            $imgCover = Storage::put("apartmentsCover", $form_data["img_cover"]);

            // salvo il file nell' oggetto
            $form_data["img_cover"] = $imgCover;
        };

        // istanziamo un nuovo oggetto Apartment
        $new_apartment = new Apartment();

        // inseriamo tutti i dati con fill nel nuovo oggetto
        $new_apartment->fill($form_data);
        // dump($new_apartment);
        // return;

        // inseriamo i dati utente che crea l appartamento,non lo lasciamo al fillable per ragioni di sicurezza
        $new_apartment->user_id = $request->user()->id;

        $new_apartment->save();
        // prima di aggiungere tag controlliamo che la chiave esiste
        if (key_exists('services', $form_data)) {

            // poi con attach specifichiamo i nuovi services da aggiungere
            // $new_apartment->attach($form_data['services'])->services();

            $new_apartment->services()->sync($form_data['services']);
            // $post->tags()->sync($form_data["tags"]);
            // $new_apartment->apartments()->attach($form_data['id']);
        }
        
        // salvo e reindirizzo l' utente
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

        
        // verifico che la chiave esiste
        if(key_exists("img_cover", $form_data)){

            // verifico se è già presente un immagine
            if($apartment->img_cover){

                // cancello la vecchia immagine
                Storage::delete($apartment->img_cover);
            };

            // salvo il file immagine creando la cartella apartmentsCover
            $imgCover = Storage::put("apartmentsCover", $form_data["img_cover"]);
        
            // salvo il file nell' oggetto
            $form_data["img_cover"] = $imgCover;
        };
        

        $apartment->update($form_data);
        return redirect()->route('admin.apartments.index');
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
