@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
  <h1>dashboard admin</h1>
  <div>
    <a href="{{ route('home.index') }}">Visualizza tutti gli appartamenti</a>
  </div>
  <div>
    <a href="{{ route('admin.apartments.index') }}">I tuoi appartamenti</a>
  </div>
  <div>
    <a href="{{ route('admin.apartments.create') }}">Aggiungi appartamento</a>
  </div>
  <div>
    <a href="">I tuoi messaggi ciao ste</a>
  </div>
  
@endsection