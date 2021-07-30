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
        <input type="text" name="address" id="address" value="{{ old('address', $apartment->address) }}">

        <label for="gps_lng">Longitudine</label>
        <input type="text" name="gps_lng" id="gps_lng" value="{{ old('gps_lng', $apartment->gps_lng) }}">

        <label for="gps_lat">Latitudine</label>
        <input type="text" name="gps_lat" id="gps_lat" value="{{ old('gps_lat', $apartment->gps_lat) }}">

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

         <div class="form-group">
          <label>Sponsorships</label><br>

          @foreach($sponsorships as $sponsorship) 

          <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input name="sponsorships[]" class="form-check-input" type="radio" value="{{ $sponsorship->id }}" {{ $apartment->sponsorships->contains($sponsorship) ? 'checked' : '' }}>
                {{ $sponsorship->name }} 
            </label>
          </div> 
        </div>

          @endforeach

       

        <input type="submit" value="Send">
    
    </form>
    @endsection