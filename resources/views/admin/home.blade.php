@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dashboard')
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
    <a href="{{ route('admin.messages.index') }}">I tuoi messaggi</a>
  </div>
  @endsection