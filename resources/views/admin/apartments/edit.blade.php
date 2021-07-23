@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
    <h1>admin/apartments/$id/edit</h1>
    <a href="{{ route('admin.apartments.index') }}">Torna alla Homepage</a>
    <h2>Modifica il tuo appartamento</h2>

    <form action="{{ route('admin.apartments.store') }}" method="post">
        @csrf

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{ old('title', $apartment->title) }}">

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('title', $apartment->description) }}">

        <label for="mq">mq</label>
        <input type="number" name="mq" id="mq" value="{{ old('title', $apartment->mq) }}">

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ old('title', $apartment->address) }}">

        <label for="gps_lng">Longitudine</label>
        <input type="text" name="gps_lng" id="gps_lng" value="{{ old('title', $apartment->gps_lng) }}">

        <label for="gps_lat">Latitudine</label>
        <input type="text" name="gps_lat" id="gps_lat" value="{{ old('title', $apartment->gps_lat) }}">

        <input type="submit" value="Send">
    
    
    
    
    </form>


  {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Creazione nuovo post</h1>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="20" y1="12" x2="4" y2="12"></line><polyline points="10 18 4 12 10 6"></polyline></svg> Tutti i posts
                </a>
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
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Titolo</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Contenuto</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" placeholder="Inizia a scrivere qualcosa..." required>{{ old('content') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- categoria del post --}}
                {{-- <div class="form-group">
                    <label>Categoria</label>
                    <select name="category_id"
                            class="form-control  @error('category_id') is-invalid @enderror" >
                        <option value="">-- seleziona categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', '') ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Crea post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection