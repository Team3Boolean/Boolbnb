{{-- la view per i pagamenti --}}

@extends('layouts.layoutAdmin')
@section('pageTitle', 'Aggiungi Appartamento')
@section('content')
<div class="container">
		<h3>Ciao <span>{{ Auth::user()->name }}</span>, rendi il tuo annuncio più accattivante e fai in modo che lo vedano più persone!</h3>
		<h4>Scegli il tuo piano di sponsorizzazione per il tuo appartamento <span>{{ $apartment->title }}</span> situato in <span>{{ $apartment->address }}</span></h4>
        <h5>Il tuo appartamento sarà pubblicato in homepage e più visibile</h5>
</div>
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
                <span>2,99 &euro;</span>
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
                <span>5.99 &euro;</span>
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
                <span>9.99 &euro; </span>
                <input class="" type="radio" name="sponsorshipRadios" id="sponsorshipGold" value="9.99">
            </section>
        </div>
    </div>
</div>

{{-- INSERIAMO FORM METOdO POST --}}
<div class="container checkout">
    <form method="post" id="payment-form" action="{{ route('admin.payments.checkout', $apartment) }}">
    @csrf
    @method('post')
        <label for="amount">
            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="" style="display:none">
            <p id="amount_preview">€ 5.99 </p>
        </label>
        

        <input id="client_token" name="client_token" type="hidden" value="{{ $client_token }}"/>
        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <input id="sponsorship" name="sponsorship" type="hidden" value="" />

        {{-- Drop-in nella pagina (dalla documentazione) --}}
        <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
        </div>


        {{-- <button id="submit-button" class="button button--small button--green">Purchase</button> --}}
        <button class="btn btn-success btn-pay" type="submit">
				<span>Purchase</span>
		</button>
    </form>
</div>



<div class="container checkout">

    
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        //document.addEventListener("DOMContentLoaded", function()

            //selezioniamo id form
            var form = document.querySelector('#payment-form');
            //selezioniamo tocken
            var client_token = document.querySelector('#client_token').value;
            //selezioniamo id input radio realtivi a sponsorship
            var opt1 = document.querySelector('#sponsorshipBronze');
            var opt2 = document.querySelector('#sponsorshipSilver');
            var opt3 = document.querySelector('#sponsorshipGold');
            //selezioniamo id input relativo a prezzo e sponsorship
            var amount  = document.querySelector('#amount');
            var sponsorship = document.querySelector('#sponsorship');
            var hiddenNonceInput = document.querySelector('#nonce').value;

            //diamo un valore di default per riempire campi a caricamento pagina
            amount.value = opt2.value;
            amount_preview.innerHTML = '€' + amount.value;
            sponsorship.value = 2;

            //quando user sceglie una sponsorizzazione:
            opt1.onclick = function () {
                amount.value = opt1.value;
                amount_preview.innerHTML = '€' + amount.value;
                sponsorship.value = 1;
            };

            opt2.onclick = function () {
                amount.value = opt2.value;
                amount_preview.innerHTML = '€' + amount.value;
                sponsorship.value = 2;
            };

            opt3.onclick = function () {
                amount.value = opt3.value;
                amount_preview.innerHTML = '€' + amount.value;
                sponsorship.value = 3;
            };


            // var button = document.querySelector('#submit-button');

            braintree.dropin.create({
                authorization: client_token,
                container: '#bt-dropin',
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
            }, function(err, instance) {
                //gestire errori?

                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    localStorage.clear();

                    instance.requestPaymentMethod(function(err, payload) {
                    if(err){
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    hiddenNonceInput.value = payload.nonce;
                    form.submit();
                    });
                })
            });
        });

    </script>
</div>
   

   {{-- button.addEventListener('click', function() {
                event.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                   if(err){
                       console.log('Request Payment Method Error', err);
                       return;
                   }
                   // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            }) --}}



@endsection
