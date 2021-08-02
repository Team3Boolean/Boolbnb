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
<div>
		<h3>Ciao <span>{{ Auth::user()->name }}</span>, rendi il tuo annuncio più accattivante e fai in modo che lo vedano più persone!</h3>
		<h4>Scegli il tuo piano di sponsorizzazione per il tuo appartamento <span>{{ $apartment->title }}</span> situato in <span>{{ $apartment->address }}</span></h4>
</div>
@dump($apartment)
{{--
    Step 1  
    Your front-end requests a client token from your server and initializes the client SDK. 
--}}

{{--
    Step 3
    The customer submits payment information, the client SDK communicates that information to Braintree and returns a payment method nonce. 
--}}

{{--
    Step 4
    Your front-end sends the payment method nonce to your server.
 --}}


{{-- Drop-in nella pagina (dalla documentazione) --}}
<div class="container">
     <!-- Step one: add an empty container to your page -->

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
