@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
@section('content')
<div class="container">

  {{-- <h1>admin/apartments/create</h1> --}}

  <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
  <div class="title-label blue-label">
    <h3>Aggiungi il tuo appartamento</h3>
  </div>
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
    <div class="form-group d-flex-col">
      <label for="img_cover">carica una foto</label>
      <input class="input-basic" type="file" name="img_cover" accept=".jpg,.png,.svg,.jpeg">
    </div>
    <div class="form-group d-flex-col">
      <label for="title">da un nome al tuo appartamento</label>
      <input class="input-basic" type="text" name="title" id="title">
    </div>
    <div class="form-group d-flex-col">
      <label for="description">racconta il tuo appartamento ai tuoi visitatori</label>
      <textarea class="input-basic" type="text" name="description" id="description"  rows="10" placeholder="L'appartamento si trova a pochi passi da..">
      </textarea>
    </div>
    <div class="form-group d-flex-col">
      <label for="mq">mq</label>
      <input class="input-basic" type="number" name="mq" id="mq">
    </div>
   {{--  <div class="form-group d-flex-col">
      <label for="address">indirizzo completo</label>
      <input class="input-basic" type="text" name="address" id="address"  placeholder="e.g Via Roma 1, Milano, 20100, Italia ">
    </div>
    <div class="form-group d-flex-col">
      <label for="gps_lng">Longitudine</label>
      <input class="input-basic" type="string" name="gps_lng" id="gps_lng">
    </div>
    <div class="form-group d-flex-col">
      <label for="gps_lat">Latitudine</label>
      <input class="input-basic" type="string" name="gps_lat" id="gps_lat"> 
    </div>--}}
    <div class="form-group d-flex-col">
        <label for="address">Indirizzo</label>
        <input type="text" id="address" name="address" placeholder="Inserisci indirizzo" class="input-basic"/>
        <button onclick="event.preventDefault(); search()" class="btn-primary">Confermi indirizzo?</button>
        <input id="gps_lat" type="hidden" name="gps_lat" value="">
        <input id="gps_lng" type="hidden" name="gps_lng" value="">
    </div>


    <div class="form-group d-flex-col">
      <label for="rooms">numero di camere</label>
      <input class="input-basic" type="number" name="rooms" id="rooms">
    </div>
    <div class="form-group d-flex-col">
      <label for="beds">numero posti letto</label>
      <input class="input-basic" type="number" name="beds" id="beds">
    </div>
    <div class="form-group d-flex-col">
      <label for="bathrooms">numero di bagni</label>
      <input class="input-basic" type="number" name="bathrooms" id="bathrooms">
    </div>
    <div class="form-group d-flex-col">
      <label for="price">tariffa richiesta a notte</label>
      <input class="input-basic" type="number" name="price" id="price" placeholder="la tariffa minima è 25€ a notte">
    </div>
    <div class="form-group d-flex-col">
      <label>servizi aggiuntivi:</label>


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

        <div class="form-group">
          <label>Sponsorships</label><br>

          @foreach($sponsorships as $sponsorship) 

          <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input name="sponsorships[]" class="form-check-input" type="radio" value="{{ $sponsorship->id }}">
                {{ $sponsorship->name }} 
            </label>
          </div> 

          @endforeach

        </div>

      {{-- <div class="form-check">
        <label>
            <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
            {{ $service->name }} 
        </label>
      </div> 

      @endforeach --}}
    </div>
    <div class="d-flex f-end">
      <input class="btn-primary" type="submit" value="Send"> 
    </div>        
  </form>
</div>
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