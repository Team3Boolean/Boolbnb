@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
@section('content')

<h1>admin/apartments/create</h1>

    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>

    <h2>Aggiungi il tuo appartamento</h2>

    <div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>

    <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="img_cover" accept=".jpg,.png,.svg,.jpeg">

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="mq">mq</label>
        <input type="number" name="mq" id="mq">

        {{-- <label for="address">Address</label>
        <input type="text" name="address" id="address">

        <label for="gps_lng">Longitudine</label>
        <input type="string" name="gps_lng" id="gps_lng">

        <label for="gps_lat">Latitudine</label>
        <input type="string" name="gps_lat" id="gps_lat"> --}}

        <label for="address">Indirizzo</label>
        <input type="text" id="address" name="address" placeholder="Inserisci indirizzo"/>
        <button onclick="event.preventDefault(); search()">Premi per calcolare lat e lon</button>
        <input id="gps_lat" type="hidden" name="gps_lat" value="">
        <input id="gps_lng" type="hidden" name="gps_lng" value="">


        <label for="rooms">Rooms</label>
        <input type="number" name="rooms" id="rooms">

        <label for="beds">Bed</label>
        <input type="number" name="beds" id="beds">

        <label for="bathrooms">Bathrooms</label>
        <input type="number" name="bathrooms" id="bathrooms">

        <label for="price">Price</label>
        <input type="number" name="price" id="price">

        <div class="form-group">
          <label>Services</label><br>

          @foreach($services as $service) 

          <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
                {{ $service->name }} 
            </label>
          </div> 

          @endforeach

        </div>

        <input type="submit" value="Send"> 
    
    </form>

    <!--messo div della mappa per poter usare le funzioni di tomtom-->
    <div id="map" style="width: 0;"></div>

    <script type="application/javascript">
        //provo a creare una funzione che fa una chiamata axios a tomtom
        var APIKEY = "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ";

        var map = tt.map({
            key: 'rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ',
            container: 'map',
            center: [8.90061, 45.73791],
            zoom: 3,
        });

        var handleResults = function(result) {
            console.log(result);
            if(result.results) {
                console.log(result.results[0].position['lng']);
                document.getElementById('gps_lat').value = result.results[0].position['lat'];
                document.getElementById('gps_lng').value = result.results[0].position['lng'];
            }
        }
        var search = function() {
            tt.services.fuzzySearch({
            key: "rO0rNeCiaH7GWWFhA2L2ZWahHr3ArAoQ",
            query: document.getElementById("address").value,
            }).then(handleResults);
        }
    </script>
@endsection