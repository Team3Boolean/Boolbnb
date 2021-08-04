@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')
<section class="single-aprtm">
    
    <div class="container">
                   
        <div class="border-title">
                    <h2>{{ $apartment->title }}</h2>
            <span class="btn-cirle back-btn">
                <a href="{{ route('admin.apartments.index') }}"><i class="fas fa-arrow-left"></i></a>
            </span>         
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-12 all-pd">
                <div class="cover-box">
                    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://i.ibb.co/J59PxKr/cover-casa.png' }}" alt="img_cover">
                </div>
            </div>
            <div class="col-lg-5 col-md-12 info-ap">

                <div class="d-flex-col">
                    <div class="half-t-b-pd">
                        <span class="text-uppercase m-right bold" >indirizzo:</span>
                        <span class="text-capitalize">{{ $apartment->address }}</span>
                    </div>
                    <div>
                        <span class="text-uppercase m-right bold">metri quadri:</span>
                        <span class="text-capitalize">{{ $apartment->mq}}</span>
                    </div>
                    <div class="half-t-b-pd">
                        <span class="text-uppercase m-right bold">prezzo a notte:</span>
                        <span class="text-capitalize"> {{ $apartment->price }} 	&euro; </span>
                    </div>
                    <div>
                        <span class="text-uppercase m-right bold">numero di stanze:</span>
                        <span class="text-capitalize">{{ $apartment->rooms }}</span>
                    </div>
                    <div class="half-t-b-pd">
                        <span class="text-uppercase m-right bold">posti letto:</span>
                        <span class="text-capitalize">{{ $apartment->beds }}</span>
                    </div>
                    <div>
                        <span class="text-uppercase m-right bold">numero di bagni:</span>
                        <span class="text-capitalize">{{ $apartment->bathrooms}}</span>
                    </div>
                    <div class="d-flex f-end m-top">
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
        </div>
        <div class="row  all-half-pd">
            <div class="col-lg-4 col-md-12 text-box">               
                <span class="text-uppercase">
                descrizione:
                </span>
            </div>
            <div class="col-lg-8 col-md-12 col-md-12">
                <span>
                     {{$apartment->description}}
                </span>
            </div>    
        </div>
        <div class="row all-half-pd">
            <div class="col-lg-4 col-md-12">
                <span class="text-uppercase">
                    Servizi aggiuntivi
                </span>
            </div>

            <div class="col-lg-8 col-md-12">
            @if(count($apartment->services) > 0)
                @foreach($apartment->services as $service)
                    <span class="service-tag">{{ $service->name }}</span>
                @endforeach
            @else
                <span>Non e' stato selezionato nessun servizio aggiuntivo...</span>
            @endif
            </div>
        </div>
        <section class="buy-sponsorship all-half-pd">
            <div class="row">
                <div class="col text-center"> aumenta la visibilità del tuo appartamentoacquistando, acquistando una nostra </div>
            </div>   
            <div class="row">
                <div class="col text-center half-t-b-pd">
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
</div>
@endsection