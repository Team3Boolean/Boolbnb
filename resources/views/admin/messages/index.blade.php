@extends('layouts/layoutAdmin')
@section('content')
<div class="container">
    @if($messages)
        @foreach($messages as $messages)
        <div class="row">
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">
                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn-outline-primary">mostra messaggio</a>
            </div>
        </div>
        @endforeach
    @else
    <div class="row">
        <div class="col">
            <p>non abbiamo ricevuto richieste di contatto per i suoi appartamenti</p>
        </div>
    </div>
    @endif    
</div>
@endsection