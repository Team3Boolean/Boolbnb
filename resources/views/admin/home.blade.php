@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dashboard')
@section('content')

{{--dashboard admin --}}
  <div class="green-bg t-b-pd">
    <div class="container">
        
      <div class="row">
          <div class="col text-center">
              <h2 class="text-uppercase"> 
                benvenuto 
                <span class="user-name">{{ Auth::user()->name }}</span>
              </h2>
              <p>gestisci con facilità i tuoi appartamenti</p>
          </div>
      </div>
    
      <div class="dashboard-box">
        
        <div class="dashboard-card">
          <div class="xs-title-label blue-label">
            <h4>i miei appartamenti</h4>
          </div>
          <div class="card-link">
            <a href="{{ route('admin.apartments.index') }}">visualizza e  gestisci i tuoi appartamenti già presenti</a>
          </div>
          <div class="dash-i-box">
            <i class="fas fa-house-user"></i>
          </div>
        </div>
        <div class="dashboard-card">
          <div class="xs-title-label blue-label">
              <h4>nuovo appartamento</h4>
          </div>
          <div class="card-link">
            <a href="{{ route('admin.apartments.create') }}">aggiungi un appartamento</a>
          </div>
          <div class="dash-i-box">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="dashboard-card">
          <div class="xs-title-label blue-label">
            <h4>messaggi</h4>
          </div>
          <div class="card-link">
            <a href="{{ route('admin.messages.index') }}">visualizza le richieste per i tuoi appartamenti</a>
          </div>
          <div class="dash-i-box">
            <i class="fas fa-envelope"></i>
          </div>
        </div>
        <div class="dashboard-card">
          <div class="xs-title-label blue-label">
            <h4>statistiche</h4>
          </div>
          <div class="card-link">
            <a href="{{ route('admin.messages.index') }}">come sta andando il tuo profilo</a>
          </div>
          <div class="dash-i-box">
            <i class="fas fa-chart-line"></i>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col text-center">
            <a href="{{ route('home.index')}}">Torna alla home del sito</a>
        </div>
      </div>

    </div>
  </div>
    
@endsection