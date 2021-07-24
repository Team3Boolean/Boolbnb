@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
    <div class="container">
        <h1>Ciao dalla home</h1>
    </div>

    <div class="container">
        <section class="jumbotron">
            {{--componente per ricerca appartamento --}}
            <search-apartment> </search-apartment>
        </section>
        <section>
            {{--componente mostrare appartamenti cercati --}}
            <show-apartment> </show-apartment>
        </section>
        <section>
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
        </section>
        
    </div>

    @foreach($apartments as $apartment)
        <div>
            <h2>{{ $apartment->id }}</h2>
            <h3>{{ $apartment->title }}</h3>
            <p>{{ $apartment->description }}</p>
            <a href="{{ route('apartments.show', $apartment->id) }}">Vai ai dettagli...</a>
        </div>
    @endforeach
@endsection
