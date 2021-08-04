{{-- HOME PAGE INIZIALE --}}

@extends('layouts/app')

@section('content')
    <div id="app">
        <home-filter-apartment home-route="{{ route('home.index') }}">
         <a href="home-route">Clicca qui</a>    

        </home-filter-apartment>
    </div>
@endsection
