@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')
<h1>admin/apartments/show</h1>
{{-- <div>
    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
</div>
<div>
    <a href="{{ route('admin.apartments.create') }}">Aggiungi un appartamento</a>
</div> --}}
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
    {{-- <img src="{{ asset('storage/' . $apartment->img_cover) }}" alt="img_cover" style="width:300px;height:150px;"> --}}
    {{-- <img src="{{ asset('storage/' . $apartment->img_cover) }} ? {{ asset('storage/' . $apartment->img_cover) }} : {{ $apartment->img_cover }}" alt="casa"> --}}

    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=785&q=80' }}" alt="img_cover" style="width:300px;height:150px;">

     <div>
        @if(count($apartment->services) > 0)
            @foreach($apartment->services as $service)
                <span class="badge badge-primary">{{ $service->name }}</span>
            @endforeach
        @else
            <em>Nessun tag disponibile...</em>
        @endif
    </div>

    <div>
            @foreach($apartment->services as $service)
                <span>{{ $service->name }}</span>
            @endforeach
       
    </div>






    {{-- <div id="map" style="width: 30vw; height: 30vh;">Benvenuti nelle mappa TomTom!!!</div>

    <script type="application/javascript">
        var map = tt.map({
            key: "AtGqnHY32ooY98VM06Pxm6dZtVvn8PGb",
            container: "map",
            zoom: 5,
            // center: [12.4818, 41.9109],
        });
    </script> --}}

    
@endsection