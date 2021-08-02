@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')
<section class="single-aprtm">
    
    
    <div class="container">
        <span class="border-title">
                    <h2>{{ $apartment->title }}</h2>
        </span>

        <div class="row">
            <div class="col-7 all-pd">
                <div class="cover-box">
                    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : ('publi/images/no_cover.png') }}" alt="img_cover" style="width:300px;height:300px;">
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
            <div class="col text-right text-box">
                <div class="d-flex-col">
                    <span class="text-uppercase">
                    descrizione del tuo appartamento:
                    </span>
                    <span>
                     {{$apartment->description}}
                    </span>
                </div>
            </div>
        </div>
        <div class="row r-l-pd end-link">
            <div class="d-flex-col">
                <span class="text-uppercase">
                    Servizi aggiuntivi
                </span>
                <div>
                    @if(count($apartment->services) > 0)
                    @foreach($apartment->services as $service)
                        <span class="service-tag">{{ $service->name }}</span>
                    @endforeach
                @else
                    <span>Non e' stato selezionato nessun servizio aggiuntivo...</span>
                @endif
                </div>
            </div>
        </div>
        <div class="row all-pd">
            <div class="col">
                <span class="btn-cirle blue">
                    <a href="{{ route('admin.apartments.index') }}"><i class="fas fa-arrow-left"></i></a>
                </span>            
            </div>
            <div class="col">
                <form  class="delete-form text-center" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}" method="post">
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