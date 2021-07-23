@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
<h1>admin/apartments/show</h1>
<div>
    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
</div>
<div>
    <a href="{{ route('admin.apartments.create') }}">Aggiungi un appartamento</a>
</div>
<div>
    <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Modifica appartamento</a>
</div>
<form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">
        Elimina
    </button>
</form>
   <h2>{{ $apartment->title }}</h2>
    <img src="{{ $apartment->img_cover }}" alt="casa">
  
    
@endsection