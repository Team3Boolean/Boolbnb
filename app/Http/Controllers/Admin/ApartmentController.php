<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Message;
use App\Service;
use App\Apartment;
use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
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
      
        // ritorno la pagina di create
        return view('admin.apartments.create', ["services" => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validazione = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'mq' => 'required',
            'address' => 'required|max:255',
            'rooms' => 'required',
            'bathrooms' => 'required',
            'beds' => 'required',
            'price' => 'required',
            'services' => 'exists:services,id'
        ]);

        if(!$validazione){
            abort(404);
        };

        // prendiamo i dati
        $form_data = $request->all();
        //dump($form_data);

       

        // verifico che la chiave img_cover esiste
        if (isset($form_data["img_cover"])) {

            // salvo il file immagine creando la cartella apartmentsCover
            $imgCover = Storage::put("apartmentsCover", $form_data["img_cover"]);

            // salvo il file nell' oggetto
            $form_data["img_cover"] = $imgCover;
        };

        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/'. $form_data['address'] . '.json?key=rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ&limit=1')->json();

        $lat = $response['results'][0]['position']['lat'];
        $lng = $response['results'][0]['position']['lon'];


        
        // istanziamo un nuovo oggetto Apartment
        $new_apartment = new Apartment();

        // inseriamo tutti i dati con fill nel nuovo oggetto
        //$new_apartment->fill($form_data);
        $new_apartment->title = $form_data['title'];
        $new_apartment->description = $form_data['description'];
        $new_apartment->mq = $form_data['mq'];
        $new_apartment->address = $form_data['address'];
        $new_apartment->rooms = $form_data['rooms'];
        $new_apartment->beds = $form_data['beds'];
        $new_apartment->bathrooms = $form_data['bathrooms'];
        $new_apartment->price = $form_data['price'];
        $new_apartment->gps_lat = $lat;
        $new_apartment->gps_lng = $lng;
        //$new_apartment->img_cover = $imgCover;

        // inseriamo i dati utente che crea l appartamento,non lo lasciamo al fillable per ragioni di sicurezza
        $new_apartment->user_id = $request->user()->id;

        // salviamo prima l' oggetto e poi inseriamo chiavi di relazione
        $new_apartment->save();

        // prima di aggiungere tag controlliamo che la chiave esiste
        if (key_exists('services', $form_data)) {

            // con sync eliminiamo le chiavi e facciamo attach
            $new_apartment->services()->sync($form_data['services']);
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

        $sponsorships = Sponsorship::all();
        $data = [
            "sponsorships" => $sponsorships,
            "apartment" => $apartment
        ];
        // dump($sponsorships);
        // return;
        // ritorno la pagina di show e invio l appartamento
        return view('admin.apartments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        // importo i service
        $services = Service::all();

        $data = [
            'services' => $services,
            'apartment' => $apartment,
        ];
        // return view('admin.apartments.edit', ["apartment" => $apartment]);
        return view('admin.apartments.edit', $data);
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
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'mq' => 'required',
            'address' => 'required|max:255',
            'rooms' => 'required',
            'bathrooms' => 'required',
            'beds' => 'required',
            'price' => 'required',
            'services' => 'exists:services,id'
        ]);

        $form_data = $request->all();
        //per aggiornamento adderess
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/'. $form_data['address'] . '.json?key=rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ&limit=1')->json();
        $lat = $response['results'][0]['position']['lat'];
        $lng = $response['results'][0]['position']['lon'];
        $apartment->gps_lat = $lat;
        $apartment->gps_lng = $lng;

        // verifico che la chiave immagini esiste
        if(key_exists("img_cover", $form_data)){

            // verifico se ?? gi?? presente un immagine
            if($apartment->img_cover){

                // cancello la vecchia immagine
                Storage::delete($apartment->img_cover);
            };

            // salvo il file immagine creando la cartella apartmentsCover
            $imgCover = Storage::put("apartmentsCover", $form_data["img_cover"]);
        
            // salvo il file nell' oggetto
            $form_data["img_cover"] = $imgCover;
        };

        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/'. $form_data['address'] . '.json?key=rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ&limit=1')->json();

        $form_data['gps_lat'] = $response['results'][0]['position']['lat'];
        $form_data["gps_lng"] = $response['results'][0]['position']['lon'];


        // se esistono togliamo tutte le associazioni di service all appartamento
        $apartment->services()->detach();
        // //elimino i messaggi dall' oggetto
        // $apartment->messages()->detach();

        // prima di aggiungere service controlliamo che la chiave esiste
        if (key_exists('services', $form_data)) {

            // poi con attach specifichiamo i nuovi service da aggiungere
            $apartment->services()->attach($form_data['services']);
        }
        
        
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
        //elimino i messaggi dall' oggetto
        $apartment->messages()->delete();
        // elimino i service dall' oggetto
        $apartment->services()->detach();
        

        // cancello oggetto
        $apartment->delete();

        return redirect()->route('admin.apartments.index');
    }
}
