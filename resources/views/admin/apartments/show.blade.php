@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')

<h1>admin/apartments/show</h1>

<div>
    <a href="{{ route('admin.apartments.index') }}">I miei appartamenti</a>
</div>

<div>
    <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Modifica appartamento</a>
</div>

<form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">
        Elimina
    </button>
</form>

   <h2>{{ $apartment->title }}</h2>
 
    <img src="{{ $apartment->img_cover ? asset('storage/' . $apartment->img_cover) : 'https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=785&q=80' }}" alt="img_cover" style="width:300px;height:150px;">

     <div>
        @if(count($apartment->services) > 0)
            @foreach($apartment->services as $service)
                <span class="badge badge-primary">{{ $service->name }}</span>
            @endforeach
        @else
            <em>Non e' stato selezionato nessun servizio aggiuntivo...</em>
        @endif
    </div>

    @foreach($sponsorships as $sponsorship) 

          {{-- <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input name="sponsorships[]" class="form-check-input" type="radio" value="{{ $sponsorship->id }}">
                {{ $sponsorship->name }} 
            </label>
          </div>  --}}

        <div>
              <a href="{{ route('admin.payments.index', ['apartment' => $apartment->id, 'sponsorship'=> $sponsorship->id ]) }}">{{$sponsorship->name}}</a>
        </div>

    @endforeach

    {{-- <a href="{{ route('admin.payments.index', [$apartment->id, $sponsorship->id]) }}">Pagao</a> --}}
         

 @endsection