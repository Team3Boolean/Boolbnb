@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')

<h1>admin/apartments/show</h1>

<div>
    <a href="{{ route('admin.apartments.index') }}">I miei appartamenti</a>
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
 
    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=785&q=80' }}" alt="img_cover" style="width:300px;height:150px;">

     <div>
        @if(count($apartment->services) > 0)
            @foreach($apartment->services as $service)
                <span class="badge badge-primary">{{ $service->name }}</span>
            @endforeach
        @else
            <em>Non e' stato selezionato nessun servizio aggiuntivo...</em>
        @endif
    </div>

    <div id="map"  style="width: 350px; height: 250px;"></div>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <script type="application/javascript">
        tt.map({
            key: 'rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ',
            container: 'map'
        })
    </script>


 @endsection