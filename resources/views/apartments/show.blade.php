@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
   <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>

    <div class="container">
        <h3>sei interessato? Invia un messaggio all'host</h3>
        {{-- component vue per inviare messaggi --}}
        <send-message>
            
        </send-message>
    </div>

@endsection