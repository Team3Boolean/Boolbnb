{{-- la view per i pagamenti --}}

@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>

    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.31.1/js/dropin.js"></script>

</head>
@section('content')
<div class="container">
		<h3>Ciao <span>{{ Auth::user()->name }}</span>, rendi il tuo annuncio più accattivante e fai in modo che lo vedano più persone!</h3>
		<h4>Scegli il tuo piano di sponsorizzazione per il tuo appartamento <span>{{ $apartment->title }}</span> situato in <span>{{ $apartment->address }}</span></h4>
        <h5>Il tuo appartamento sarà pubblicato in homepage e più visibile</h5>
</div>
@dump($client_token)
@dump($gateway)
{{-- // seleziona una sponsorizzazione con relativo prezzo :
id=sponsorship+SponsorchipName // --}}
<div class="payment-action container">
    <div class="container">
        <div class="payment-card">
            <section class="payment-card-header ">
                <h5>bronze</h5>
            </section>
            <section class="payment-card-main">
                <span class="bold">
                    24 ore di sponsorizzazione
                </span>
                <span>2,99 €</span>
                <input class="" type="radio" name="sponsorshipRadios" id="sponsorshipBronze" value="2.99">
            </section>	
        </div>
        
        <div class="payment-card">
            <section class="payment-card-header m">
                <h5>silver</h5>
            </section>
            <section class="payment-card-main">
                <span class="bold">
                    72 ore di sponsorizzazione
                </span>
                <span>5.99 €</span>
                <input class="" type="radio" name="sponsorshipRadios" id="sponsorshipSilver" value="5.99" checked>
            </section>		
        </div>
        
        <div class="payment-card">
            <section class="payment-card-header">
                <h5>gold</h5>
            </section>
            <section class="payment-card-main">
                <span class="bold">
                    144 ore di sponsorizzazione
                </span>
                <span>9.99 €</span>
                <input class="" type="radio" name="sponsorshipRadios" id="sponsorshipGold" value="9.99">
            </section>
        </div>
    </div>
</div>

{{-- INSERIAMO FORM METONO POST --}}



<div class="container checkout">

    {{-- Drop-in nella pagina (dalla documentazione) --}}
    <div id="dropin-container"></div> 
    <button id="submit-button" class="button button--small button--green">Purchase</button>

    <script type="text/javascript">
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b'
            , selector: '#dropin-container'
        }, function(err, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    // Submit payload.nonce to your server
                });
            })
        });

    </script>
</div>
   



@endsection
