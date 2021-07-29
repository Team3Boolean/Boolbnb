@extends('layouts/map')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
   <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=785&q=80' }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>

    <div id="app" class="container">
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <!-- your email -->
                    <label for="email">Email</label>
                    @guest
                    <input type="text" name="email" id="email" class="form-control" required>
                    @else
                    <input type="text" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" required>
                    @endguest                
                </div>
                <div class="form-group">
                    <!-- text -->
                    <label for="text">Messaggio:</label>
                    <textarea type="text" name="text" id="text" class="form-control" rows="10" required></textarea> 
                </div>
                @if (Session::has('success'))
                        <div class="form-group">
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        </div>
                @endif
                <div class="form-group">
                    <!-- apartment_id -->
                    <input type="text" name="apartment_id" id="apartment_id" value="{{$apartment->id}}" class="form-control" hidden>   
                </div>                          
                <input  class="btn btn-primary" type="submit">
                
                
        </form>
    </div>


    <div id="map" style="width: 550px; height: 450px;"></div>
    {{-- <script type='text/javascript' src='../assets/js/mobile-or-tablet.js'></script> --}}
    <script type="application/javascript">
        console.log({{$apartment->gps_lng}});
        console.log({{$apartment->gps_lat}});

        // creo una variabile che salva la posizione dell'appartamento
        var position = [{{$apartment->gps_lng}} , {{$apartment->gps_lat}}];
        // variabile che salva la chiave personale per le chiamate
        const APIKEY = 'rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ';

        // variabile che renderizza la mappa
        var map = tt.map({
            key: APIKEY,
            container: 'map',
            center: position,
            zoom: 5,
            basePath: 'sdk/',
            theme: {
                style: 'main',
                layer: 'basic',
                source: 'vector'
            }
            
        });
        // aggiunti controlli di zoom e fullscreen
        map.addControl(new tt.FullscreenControl());
        map.addControl(new tt.NavigationControl());

        //aggiunto marker che identifica la posizione dell'appartamento
        var marker = new tt.Marker({
            draggable: false
        }).setLngLat(position).addTo(map);

    </script>
@endsection