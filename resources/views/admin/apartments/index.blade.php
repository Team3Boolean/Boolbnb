@extends('layouts.layoutAdmin')
@section('pageTitle', 'I Miei Appartamenti')
@section('content')
<div class="green-bg">
    <div class="container">
        <div class="row all-pd p-relative">
            <div class="col text-center">
                <h2 class="text-uppercase"> 
                    i tuoi appartamenti
                </h2>      
            </div>
            <span class="btn-cirle back-btn p-absolute">
                    <a href="{{ '/' }}"><i class="fas fa-arrow-left"></i></a>
            </span>
        </div>

        @if(count($apartments) > 0 )
            <div class="admin-apartment-box all-pd">
                @foreach($apartments as $apartment)

                    <div class="admin-apartment-cards">
                        <div class="cover-box">
                            <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://i.ibb.co/J59PxKr/cover-casa.png' }}" alt="img_cover">
                        </div>
                        <div class="text-center g-2 app-title blue-t bold">
                            <h3>{{ $apartment->title }}</h3>
                        </div>
                        <div class="apartment-link text-center">
                            <div class="d-flex-col">
                                <a href="{{ route('admin.apartments.show', $apartment->id) }}">Mostra dettagli</a>
                            </div>
                            <div class="d-flex-col">
                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Modifica appartamento</a>
                            </div>
                        </div>  
                         {{-- spaziatura --}}
                        <div class="g-2"></div>
                        <form class="delete-form text-center" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                            <button class="btn-delete" type="submit">Elimina</button>
                        </form>       
                    </div>
                @endforeach
            </div>        
        @else
           
                <div class="admin-apartment-cards">
                    <div class="text-center">
                        <p>{{ Auth::user()->name }},</p>
                        <p>non hai ancora inserito appartamenti, cosa aspetti?</p>
                        <p><a href="{{ route('admin.apartments.create') }}">diventa host!</a></p>
                    </div>
                </div>
            
            
        @endif
    </div>

   
</div>
 
    
@endsection