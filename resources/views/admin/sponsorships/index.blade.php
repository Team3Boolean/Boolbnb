@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')

<div class="container">

<h3>{{ Auth::user()->name }}</h3>
<p>metti in prima pagina il tuo appartamento {{ $apartment->title }}</p>
<p>scegli una sponsorizzazione:</p>
{{-- sponsorizzazione 1 --}}
@foreach($sponsorships as $sponsorship)

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$sponsorship->name}}</h5>
        <p class="card-text">{{$sponsorship->duration}}</p>
        <p class="card-text">{{$sponsorship->price}}</p>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection