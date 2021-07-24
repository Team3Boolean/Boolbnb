@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
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









    <div id="map" style="width: 30vw; height: 30vh;">Benvenuti nelle mappa TomTom!!!</div>

    <script type="application/javascript">
        var map = tt.map({
            key: "AtGqnHY32ooY98VM06Pxm6dZtVvn8PGb",
            container: "map",
            zoom: 5,
            // center: [12.4818, 41.9109],
        });
    </script>

    
@endsection