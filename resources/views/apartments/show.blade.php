@extends('layouts/app')
{{-- @section('pageTitle', 'Home Page') --}}
@section('content')
   <h1>{{ $apartment->title }}</h1>
    <img src="{{ $apartment->img_cover }}" alt="casa">
    <br>
    <a href="{{ route('home.index') }}">Torna alla Homepage</a>
@endsection