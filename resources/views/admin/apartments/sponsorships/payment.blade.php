@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
@section('content')
<div class="container">
    qui tutte le sponsorizzazioni
    <p>{{Auth::user()->name}}</p>
<div>
    <p>{{ $apartment->title }}</p>
</div>
</div>
@endsection