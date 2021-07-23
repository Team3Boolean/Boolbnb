@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
    <h1>admin/apartments</h1>
    <div><a href="{{ route('admin.apartments.create') }}">Aggiungi un appartamento</a></div>
    @foreach($apartments as $apartment)
        <div>
            <h2>{{ $apartment->id }}</h2>
            <h3>{{ $apartment->title }}</h3>
            <p>{{ $apartment->description }}</p>
            <div>
                <a href="{{ route('admin.apartments.show', $apartment->id) }}">Vai ai dettagli...</a>
            </div>
            <div>
                <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Modifica appartamento</a>
            </div>            
        </div>

        <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">
                Elimina
            </button>
        </form>
    @endforeach
@endsection