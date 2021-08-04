@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')
<section class="single-aprtm">
    
    
    <div class="container">
        <span class="btn-cirle blue">
            <a href="{{ route('admin.apartments.index') }}"><i class="fas fa-arrow-left"></i></a>
        </span>            
        <span class="border-title">
                    <h2>{{ $apartment->title }}</h2>
        </span>

        <div class="row">
            <div class="col-7 all-pd">
                <div class="cover-box">
                    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://i.ibb.co/J59PxKr/cover-casa.png' }}" alt="img_cover">
                </div>
            </div>
            <div class="col-5 all-pd">
                <div class="d-flex-col">
                    <span class="t-b-pd"></span>
                    <span class="text-uppercase" >indirizzo:</span>
                    <span class="text-capitalize">{{ $apartment->address }}</span>
                    <span class="t-b-pd"></span>
                    <span class="text-uppercase">prezzo a notte:</span>
                    <span >{{ $apartment->price }} 	&euro; </span>
                    <span class="btn-cirle blue bottom-link">
                        <a href="{{ route('admin.apartments.edit', $apartment->id) }}">
                        <i class="fas fa-edit"></i>
                        </a>
                        <span class="add-info">
                            modifica 
                        </span>
                    </span>
                    
                </div>
            </div>
        </div>
        <div class="row r-l-pd">
            <div class="col-4 text-right text-box">               
                <span class="text-uppercase">
                descrizione:
                </span>
            </div>
            <div class="col-8">
                <span>
                     {{$apartment->description}}
                </span>
            </div>    
        </div>
        <div class="row all-pd">
            <div class="col-4 text-right">
                <span class="text-uppercase">
                    Servizi aggiuntivi
                </span>
            </div>

            <div class="col-8">
            @if(count($apartment->services) > 0)
                @foreach($apartment->services as $service)
                    <span class="service-tag">{{ $service->name }}</span>
                @endforeach
            @else
                <span>Non e' stato selezionato nessun servizio aggiuntivo...</span>
            @endif
            </div>
        </div>
        <section class="buy-sponsorship all-pd">
            <div class="row">
                <div class="col text-center"> aumenta la visibilità del tuo appartamentoacquistando, acquistando una nostra </div>
            </div>   
            <div class="row">
                <div class="col text-center t-b-pd">
                    <a class="link-sponsor" href="{{ route('admin.payments.index', $apartment)}}">sponsorizzazione</a>
                </div>
            </div>         
        </section>
        <div class="row all-pd">
            <div class="col">
                <form  class="delete-form text-right" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}" method="post">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn-delete">
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
