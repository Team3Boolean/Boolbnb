@extends('layouts.layoutAdmin')
@section('pageTitle', 'Modifica Appartamento')
@section('content')
<section class="t-b-pd green-bg">
  <div class="container">
  
    {{-- <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a> --}}
    <div class="title-label blue-label">
      <h3>Modifica il tuo appartamento</h3>
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


    <form class="white-bg" action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group d-flex-col">
          <label for="img_cover">cambia l'immagine di copertina</label>
          <input class="input-basic" type="file" name="img_cover" accept=".jpg,.png,.svg,.jpeg">
        </div>

        <div class="form-group d-flex-col">
          <label for="title">nome dell'appartamento</label>
          <input class="input-basic" type="text" name="title" id="title" value="{{ old('title', $apartment->title) }}">
        </div>
        
        <div class="form-group d-flex-col">
          <label for="description">Modifica la descrizione del tuo appartamento</label>
          {{-- <input class="input-basic" type="text" name="description" id="description" value="{{ old('description', $apartment->description) }}"> --}}
          <textarea class="input-basic" type="text" name="description" id="description" rows="10">
          {{ old('description', $apartment->description) }}"
          </textarea>
        </div>
        
        <div class="form-group d-flex-col">
          <label for="mq">mq</label>
          <input class="input-basic" type="number" name="mq" id="mq" value="{{ old('mq', $apartment->mq) }}">
          
        </div>

        <div class="form-group d-flex-col">
          <label for="address">Indirizzo</label>
          <input class="input-basic" type="text" name="address" id="address" value="{{ old('address', $apartment->address) }}" class="input-basic"/>
        </div>
        
        <div class="form-group d-flex-col">
          <input class="input-basic" type="text" name="gps_lng" id="gps_lng" value="{{ old('gps_lng', $apartment->gps_lng) }}">
        </div>
      
        <div class="form-group d-flex-col">
          <input class="input-basic" type="text" name="gps_lat" id="gps_lat" value="{{ old('gps_lat', $apartment->gps_lat) }}">
        </div>

        <div class="form-group d-flex-col">
          <label for="rooms">numero di camere</label>
          <input class="input-basic" type="number" name="rooms" id="rooms" value="{{ old('rooms', $apartment->rooms) }}">
        </div>

        <div class="form-group d-flex-col">
          <label for="beds">numero di posti letto</label>
          <input class="input-basic" type="number" name="beds" id="beds" value="{{ old('beds', $apartment->beds) }}">
        </div>

        <div class="form-group d-flex-col">
          <label for="bathrooms">numero di bagni</label>
          <input class="input-basic" type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $apartment->bathrooms) }}">
        </div>
        
        <div class="form-group d-flex-col">
          <label for="price">tariffa richiesta a notte</label>
          <input class="input-basic" type="number" name="price" id="price" value="{{ old('price', $apartment->price) }}">
        </div>
        
        <div class="form-group d-flex-col">
          <label>Servizi aggiuntivi</label><br>

          @foreach($services as $service)

          <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="input-basic" name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}" {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                {{ $service->name }}
            </label>            
          </div>

          @endforeach
        </div>
        <div class="d-flex f-end">
          <input type="submit" value="Send" class="btn-primary">
        </div>
    </form>
  </div>
</section>

@endsection