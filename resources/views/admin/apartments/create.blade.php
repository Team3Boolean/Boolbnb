@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
@section('content')
<div class="container">

  {{-- <h1>admin/apartments/create</h1> --}}

  <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
  <div class="title-label blue-label">
    <h3>Aggiungi il tuo appartamento</h3>
  </div>
  <div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
  <form  class="white-bg" action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="form-group d-flex-col">
      <label for="img_cover">carica una foto</label>
      <input class="input-basic" type="file" name="img_cover" accept=".jpg,.png,.svg,.jpeg">
    </div>
    <div class="form-group d-flex-col">
      <label for="title">da un nome al tuo appartamento</label>
      <input class="input-basic" type="text" name="title" id="title">
    </div>
    <div class="form-group d-flex-col">
      <label for="description">racconta il tuo appartamento ai tuoi visitatori</label>
      <textarea class="input-basic" type="text" name="description" id="description"  rows="10" placeholder="L'appartamento si trova a pochi passi da..">
      </textarea>
    </div>
    <div class="form-group d-flex-col">
      <label for="mq">mq</label>
      <input class="input-basic" type="number" name="mq" id="mq">
    </div>
    <div class="form-group d-flex-col">
      <label for="address">Indirizzo</label>
      <input type="text" id="address" name="address" placeholder="es. via Roma 1, Milano MI" class="input-basic"/>
    </div>


    <div class="form-group d-flex-col">
      <label for="rooms">numero di camere</label>
      <input class="input-basic" type="number" name="rooms" id="rooms">
    </div>
    <div class="form-group d-flex-col">
      <label for="beds">numero posti letto</label>
      <input class="input-basic" type="number" name="beds" id="beds">
    </div>
    <div class="form-group d-flex-col">
      <label for="bathrooms">numero di bagni</label>
      <input class="input-basic" type="number" name="bathrooms" id="bathrooms">
    </div>
    <div class="form-group d-flex-col">
      <label for="price">tariffa richiesta a notte</label>
      <input class="input-basic" type="number" name="price" id="price" placeholder="la tariffa minima è 25€ a notte">
    </div>
    <div class="form-group d-flex-col">
      <label>servizi aggiuntivi:</label>


        <div class="form-group">


          @foreach($services as $service) 

          <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
                {{ $service->name }} 
            </label>
          </div> 

          @endforeach

        </div>
    </div>
    <div class="d-flex f-end">
      <input class="btn-primary" type="submit" value="Send"> 
    </div>        
  </form>
</div>

@endsection