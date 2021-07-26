@extends('layouts/layoutAdmin')
@section('content')
<div class="container">
        @dump($received_messages)
        {{-- TOGLIERE DUMP --}}
    @if($received_messages)
        @foreach($received_messages as $message)
        {{-- !!!!! TOGLIERE !!!!! --}}
        <h1>PROVA PER VEDERE CHE NON STIA STAMPANDO NULLA</h1>

        <div class="row">
            <div class="col">
                    {{$message->email}}
            </div>
            <div class="col">
                    {{$message->text}}
            </div>
            {{-- decidere se fare vie admin.messages.show o div nascosto al click si apre messagio --}}

            {{-- <div class="col">
                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn-outline-primary">mostra messaggio</a>
            </div> --}}



            {{-- <div class="hidden">
                {{$message->text}}
            </div> --}}

        </div>
        @endforeach
    @else
        <div class="row">
            <div class="col">
                <p>non abbiamo ricevuto richieste di contatto per i suoi appartamenti</p>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                {{--aggiungiamo link a pacchetto sponsorizzazioni--}}
                <a href="#" class="text-center"> prova una sponsorizzazione</a>
            </div>
        </div> 
    @endif

 
</div>
@endsection