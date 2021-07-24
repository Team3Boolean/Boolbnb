@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
   <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>
    {{-- <single-apartment-map/> --}}
    <input type="text" id="query" value="">
    <button onclick="search()">SEARCH</button>
    <div id="map" style="width: 30vw; height: 30vh;">Benvenuti nelle mappa TomTom!!!</div>

    <script type="application/javascript">
        var map = tt.map({
            key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
            container: "map",
            zoom: 5,
            //center: [12.4818, 41.9109],
        });

        var moveMap = function(lnglat) {
            map.flyTo({
                center: lnglat,
                zoom: 14,
            })
        }

        var handleResults = function(result) {
            console.log(result);
            if(result.results) {
                moveMap(result.results[0].position)
            }
        }
        var search = function() {
            
            tt.services.fuzzySearch({
            key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
            query: document.getElementById("query").value,
            }).then(handleResults);
        }
    </script>
@endsection