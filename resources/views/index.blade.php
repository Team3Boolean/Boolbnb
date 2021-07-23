@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
    <h1>Ciao dalla home</h1>

    @foreach($apartments as $apartment)
        <div>
            <h2>{{ $apartment->id }}</h2>
            <h3>{{ $apartment->title }}</h3>
            <p>{{ $apartment->description }}</p>
            <a href="{{ route('apartments.show', $apartment->id) }}">Vai ai dettagli...</a>
        </div>
    @endforeach
@endsection
