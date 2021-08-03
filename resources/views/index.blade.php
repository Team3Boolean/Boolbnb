{{-- HOME PAGE INIZIALE --}}

@extends('layouts/app')

@section('content')
    <div id="app">
        <div class="jumbotron bg-jumbotron">
            <home-filter-apartment></home-filter-apartment>
        </div>
        <section class="adv-section">
            <div class="container">
                <h6>sezione dedicata agli appartamenti in evidenza con sponsorizzazione</h6>
            </div>
        </section>
    </div>
    

@endsection
