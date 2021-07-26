@extends('layouts.layoutAdmin')
@section('pageTitle', 'Modifica Appartamento')
@section('content')
<h1>admin/apartments/$id/edit</h1>
    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
    <h2>Modifica il tuo appartamento</h2>

    <form action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" name="img_cover" accept=".jpg,.png,.svg,.jpeg">

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{ old('title', $apartment->title) }}">

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('title', $apartment->description) }}">

        <label for="mq">mq</label>
        <input type="number" name="mq" id="mq" value="{{ old('title', $apartment->mq) }}">

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ old('title', $apartment->address) }}">

        <label for="gps_lng">Longitudine</label>
        <input type="text" name="gps_lng" id="gps_lng" value="{{ old('title', $apartment->gps_lng) }}">

        <label for="gps_lat">Latitudine</label>
        <input type="text" name="gps_lat" id="gps_lat" value="{{ old('title', $apartment->gps_lat) }}">

        <input type="submit" value="Send">
    
    
    
    
    </form>
    @endsection