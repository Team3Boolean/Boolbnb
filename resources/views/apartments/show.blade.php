@extends('layouts/map')

@section('pageTitle', 'Home Page')
@section('content')
<section class="single-aprtm">
    <div class="container">
        <span class="btn-cirle blue">
            <a href="{{ route('home.index') }}"><i class="fas fa-arrow-left"></i></a>
        </span>
        <span class="border-title">
            <h1>{{ $apartment->title }}</h1>
        </span>
         
        <div class="row">   
            <div class="col-7 all-pd">
                <div class="cover-box">
                    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://via.placeholder.com/150
                        C/O https://placeholder.com/' }}" alt="casa">
                </div>          
            </div>
            <div class="col-5 all-pd">
                <div class="d-flex-col">
                    <span class="text-uppercase" >indirizzo:</span>
                    <span class="text-capitalize">{{ $apartment->address }}</span>
                    <span class="text-uppercase">metri quadri:</span>
                    <span class="text-capitalize">{{ $apartment->mq}}</span>
                    <span class="text-uppercase">prezzo a notte:</span>
                    <span> {{ $apartment->price }} 	&euro; </span>
                    <span class="text-uppercase">numero di stanze:</span>
                    <span class="text-capitalize">{{ $apartment->rooms }}</span>
                    <span class="text-uppercase">posti letto:</span>
                    <span class="text-capitalize">{{ $apartment->beds }}</span>
                    <span class="text-uppercase">numero di bagni:</span>
                    <span class="text-capitalize">{{ $apartment->bathrooms}}</span>
                </div>
            </div>
        </div>
        <div class="row r-l-pd">
            <div class="col-3">
                <span class="text-uppercase">descrizione:</span>
            </div>
            <div class="col-9 text-left">
                {{ $apartment->description}}
            </div>
        </div>
        <div class="row r-l-pd end-link">
            <div class="d-flex-col">
                <span class="text-uppercase">
                    Servizi aggiuntivi
                </span>
                <div>
                    @if(count($apartment->services) > 0)
                    @foreach($apartment->services as $service)
                        <span class="service-tag">{{ $service->name }}</span>
                    @endforeach
                @else
                    <span>Questo appartamento non presenta servizi aggiuntivi:</span>
                @endif
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col">
                <button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                CONTATTA L'HOST
                </button>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
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
            </div>
        </div>       
    </div>
</section>  

    <div id="app" class="container">
        
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