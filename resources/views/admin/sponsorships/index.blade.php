@extends('layouts.layoutAdmin')
@section('pageTitle', 'Dettagli Appartamento')
@section('content')

<div class="container">

<h3>{{ Auth::user()->name }}</h3>
<p>metti in prima pagina il tuo appartamento {{ $apartment->title }}</p>
<p>scegli una sponsorizzazione:</p>
{{-- sponsorizzazione 1 --}}
<div class="row">
 <div class="form-check">
            <input class="form-check-input " checked type="radio"  name="promotion" id="1" value="bronze">
            <label class="form-check-label" for="promotion">
                Pacchetto Bronzo - 24 ore - 2.99 Euro
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input " type="radio"  name="promotion" id="2" value="silver">
            <label class="form-check-label" for="promotion">
                Pacchetto silver - 72 ore - 4.99 Euro
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input " type="radio"  name="promotion" id="3" value="gold">
            <label class="form-check-label" for="promotion">
                Pacchetto Gold - 144 ore - 9.99 Euro
            </label>
        </div>
  </div>
  {{-- qua pagamento effettivo funzione make() di paymentController 
  sto utilizzando documentazione TomTom https://braintree.github.io/braintree-web-drop-in/docs/current/module-braintree-web-drop-in.html --}}
  <button id="submit-button" class="button button--small button--green">Purchase</button>
  <div id="dropin-container"></div>
</div>




<script>
var button = document.querySelector('#submit-button');
var flat = "{{ Auth::user()->id }}";
//prendo dati da check-box sopra
var radioButtons = document.getElementsByClassName('promotion');
var value;
//qua entriamo in documentazione BrainTree
braintree.dropin.create({
  //crea token di autorizzazione in automatico
  authorization: 'tprv3vsb38cpwphw',
  selector: '#dropin-container',
  translations: {
                payWithCard: 'Pagamento con Carta di Credito/Debito'
                , cardNumberLabel: 'Numero Carta'
                , expirationDateLabel: 'Data Di Scadenza'
                , cvvLabel: 'CVV'
                , expirationDatePlaceholder: 'MM/YY'
                , fieldEmptyForNumber: 'Iserire il numero della carta.'
                , fieldInvalidForNumber: 'Il numero della carta non è valido.'
                , fieldEmptyForExpirationDate: 'Inserire la data di scadenza della carta.'
                , hostedFieldsFieldsInvalidError: 'I dati inseriti non sono validi'
            }
  }, function (err, instance) {
  button.addEventListener('click', function () {
    //andiamo ad aggiungere evento a pagamento - schiacciamo bottone 
      for (let j = 0; j < radioButtons.length; j++) {
                    if (radioButtons[j].checked) {
                        value = radioButtons[j].value;
                    }
      }
      instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
      $.get('http://127.0.0.1:8000/payment/make', {
                            payload,
                            value,
                            flat
                        }, 
                        function(response) {
                          //riprende risposta da controller
                            if (response.success) {
                                alert('Pagamento avvenuto con sucesso!');
                            } else {
                                alert('Transazione fallita.');
                            }
                            location.reload();
                        }, 'json');
    });
  });
});
</script>
<script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.js"></script>
@endsection