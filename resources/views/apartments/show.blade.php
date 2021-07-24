@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
   <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>
    <!-- aggiunta boxmessaggi con componente vue -->
    <div>
        <message-box/>
    </div>

    <!-- prova aggiunta mappa-->
    <div id="map" style="height: 50vh; width: 50vw;">Benvenuti nelle mappa TomTom!!!</div>
    <script type="application/javascript">
        var map = tt.map({
            key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
            container: "map",
            zoom: 5,
            center: [12.4818, 41.9109],
            //center: [$apartment->gps_lng, $apartment->gps_lat]
        });

        var marker = new tt.Marker()
            .setLngLat([12.4818, 41.9109])
            .addTo(map);
    </script>
@endsection