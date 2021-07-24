@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
@section('content')
<h1>admin/apartments/create</h1>
    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
    <h2>Aggiungi il tuo appartamento</h2>

    <form action="{{ route('admin.apartments.store') }}" method="post">
        @csrf

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="mq">mq</label>
        <input type="number" name="mq" id="mq">

        <label for="address">Address</label>
        <input type="text" name="address" id="address">

        <div id="app">
            <get-lon-lan>
    
            </get-lon-lan>
        </div>

        <label for="rooms">Rooms</label>
        <input type="number" name="rooms" id="rooms">

        <label for="bed">Bed</label>
        <input type="number" name="bed" id="bed">

        <label for="bathrooms">Bathrooms</label>
        <input type="number" name="bathrooms" id="bathrooms">

        <label for="price">Price</label>
        <input type="number" name="price" id="price">

        {{-- <label for="gps_lng">Longitudine</label>
        <input type="text" name="gps_lng" id="gps_lng">

        <label for="gps_lat">Latitudine</label>
        <input type="text" name="gps_lat" id="gps_lat"> --}}

        <input type="submit" value="Send">
    
    
    
    
    </form>
@endsection