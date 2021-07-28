@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dashboard')
@section('content')

{{--dashboard admin --}}
  <div class="container">
      
    <div class="row">
        <div class="col text-center">
            <h2 class="text-uppercase"> 
                <span class="user-name">{{ Auth::user()->name }}</span>
                benenuto nella tua pagina personale
            </h2>
            <p>gestisci con facilità i tuoi appartamenti</p>
        </div>
    </div>
  
    <div class="dashboard-box">
      <div class="dashboard-card">
      <a href="{{ route('home.index') }}">Torna alla home del sito</a>
      </div>
      <div class="dashboard-card">
        <a href="{{ route('admin.apartments.index') }}">I tuoi appartamenti</a>
      </div>
      <div class="dashboard-card">
        <a href="{{ route('admin.apartments.create') }}">Aggiungi appartamento</a>
      </div>
      <div class="dashboard-card">
        <a href="{{ route('admin.messages.index') }}">I tuoi messaggi</a>
      </div>
    </div>

  </div>
    
@endsection