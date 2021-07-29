{{-- HOME PAGE INIZIALE --}}

@extends('layouts/app')

@section('content')
    <div id="app">
        <div class="jumbotron">
            <home-filter-apartment></home-filter-apartment>
        </div>
        <section class="adv-section">
            <div class="container">
                <h6>sezione dedicata agli appartamenti in evidenza con sponsorizzazione</h6>
            </div>
        </section>
    </div>
    
    {{-- <div class="container">
        <h1>Ciao dalla home</h1>
    </div> --}}
    <!--<div class="container">
        <section class="jumbotron">
            {{--componente per ricerca appartamento --}}
            <search-apartment> </search-apartment>
        </section>
        {{-- <section>
            {{--componente mostrare appartamenti cercati 
            <show-apartment/>
        </section>--}}
        {{-- <section>
            <div class="row">   
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">appartamenti sponsorizzati</h5>
                            <p class="card-text">mettere info appartamento</p>
                            <!-- link diretto a blade.php singolo appartamento -->
                            <a href="#" class="btn btn-primary">Mostra Dettagli</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">appartamenti sponsorizzati</h5>
                            <p class="card-text">mettere info appartamento</p>
                            <!-- link diretto a blade.php singolo appartamento -->
                            <a href="#" class="btn btn-primary">Mostra Dettagli</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">appartamenti sponsorizzati</h5>
                            <p class="card-text">mettere info appartamento</p>
                            <!-- link diretto a blade.php singolo appartamento -->
                            <a href="#" class="btn btn-primary">Mostra Dettagli</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}   
    </div>
        
    {{-- <div v-for="i in 10" :key="i">
        <span v-text="'Testo in vue' + i"></span>
    </div> --}}
    
    
    {{-- @foreach($apartments as $apartment)
        <apartment-card
            id="{{ $apartment->id }}"
            title="{{ $apartment->title }}"
            description="{{ $apartment->description}}"
            link="{{ route('apartments.show', $apartment->id) }}"
        ></apartment-card>
    @endforeach --}}
  

@endsection
