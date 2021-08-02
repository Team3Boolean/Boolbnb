@extends('layouts.layoutAdmin')
@section('pageTitle', 'Modifica Appartamento')
@section('content')

<h1>admin/apartments/$id/edit</h1>

    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
    
    <h2>Modifica il tuo appartamento</h2>

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


    <form action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" name="img_cover" accept=".jpg,.png,.svg,.jpeg">

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{ old('title', $apartment->title) }}">

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description', $apartment->description) }}">

        <label for="mq">mq</label>
        <input type="number" name="mq" id="mq" value="{{ old('mq', $apartment->mq) }}">

        <label for="address">Address</label>
        <input type="text" onblur="search()" name="address" id="address" value="{{ old('address', $apartment->address) }}">

        <label for="rooms">Rooms</label>
        <input type="number" name="rooms" id="rooms" value="{{ old('rooms', $apartment->rooms) }}">

        <label for="beds">Bed</label>
        <input type="number" name="beds" id="beds" value="{{ old('beds', $apartment->beds) }}">

        <label for="bathrooms">Bathrooms</label>
        <input type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $apartment->bathrooms) }}">

        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ old('price', $apartment->price) }}">

        <div class="form-group">
          <label>Services</label><br>

          @foreach($services as $service)

          <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}" {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                {{ $service->name }}
            </label>
          </div>

          @endforeach

        </div>

        <input type="submit" value="Send">
    
    </form>

    <!-- div con id map messo per poter usare le funzioni -->
    <div id="map" style="width: 0;"></div>
    <script type="application/javascript">
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