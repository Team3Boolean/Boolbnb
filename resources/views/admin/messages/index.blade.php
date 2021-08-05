@extends('layouts/layoutAdmin')
@section('content')
<section class="t-b-pd green-bg">

    <div class="container">
        @if($received_messages)
        <div class="table-responsive">
            <table class="table"> 
                <thead>
                    <tr>
                        <th></th>
                        <th class="blue-t bold">ora</th>
                        <th class="blue-t bold">appartamento</th>
                        <th class="blue-t bold">mittente</th>
                        <th class="blue-t bold">richiesta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($received_messages as $message)
                    <tr>
                        <td class="action"><input type="checkbox" /></td>
                        <td class="blue-t">{{$message->received}}</td>
                        <td class="blue-t">{{$message->apartment_title}}</td>
                        <td class="blue-t">{{$message->email}}</td>
                        <td class="blue-t">{{$message->text}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="row">
                <div class="col">
                    <p>non abbiamo ricevuto richieste di contatto per i suoi appartamenti</p>
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    {{--aggiungiamo link a pacchetto sponsorizzazioni--}}
                    <a href="{{ route('admin.apartments.index') }}" class="text-center blue-t"> prova una sponsorizzazione: seleziona un tuo appartamento e fallo apparire in homepage!</a>
                </div>
            </div> 
        @endif
    </div>

</section>
 

@endsection