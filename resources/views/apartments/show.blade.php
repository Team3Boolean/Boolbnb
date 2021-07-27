@extends('layouts/map')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
   <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>

    <div class="container">
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


    <div id="map" style="width: 350px; height: 250px;"></div>
    {{-- <script type='text/javascript' src='../assets/js/mobile-or-tablet.js'></script> --}}
    <script type="application/javascript">
        var endpoint = 'https://a.api.tomtom.com/map/1/tile/basic/' +
                       'main/4/8/5.png?key=rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ'; 

        var tiles = ['a', 'b', 'c', 'd'].map(function(a){
            return endpoint.replace('a.api.tomtom.com', 'api.tomtom.com');
        });
        var APIKEY = 'rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ';
        var map = tt.map({
            key: APIKEY,
            container: 'map',
            center: [-3.703790, 40.416775],
            basePath: 'sdk/',
            theme: {
                style: 'main',
                layer: 'basic',
                source: 'vector'
            }

        });
        map.addControl(new tt.FullscreenControl());
        map.addControl(new tt.NavigationControl());
    </script>
@endsection