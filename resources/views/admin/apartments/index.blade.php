@extends('layouts.layoutAdmin')
@section('pageTitle', 'I Miei Appartamenti')
@section('content')

<h1>admin/apartments</h1>

    @foreach($apartments as $apartment)
        <div>
            <h2>{{ $apartment->id }}</h2>
            <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=785&q=80' }}" alt="img_cover" style="width:300px;height:150px;">
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