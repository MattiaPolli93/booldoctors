@extends('layouts.app')

@section('title')
    Sponsorizzazione
@endsection

@section('content')
    {{-- <div class="my_container"> --}}
        {{-- <form id="payment-form" action="/route/on/your/server" method="post">
            <!-- Putting the empty container you plan to pass to
              `braintree.dropin.create` inside a form will make layout and flow
              easier to manage -->
            <div id="dropin-container">
                <h1>Seleziona il piano per la tua sponsorizzazione</h1>
                <div class="form-group mt-3">
                    @foreach ($plans as $plan)                    
                      <h2>Il piano {{$plan->plan}} ha una durata di {{$plan->period}} ore</h2>                     
                        <input class="form-check-input" type="checkbox" value="{{$plan->id}}" id="{{$plan->price}}" name="plans[]">
                        <label class="form-check-label" for="{{$plan->plan}}">
                            {{$plan->price}} €
                        </label> 
                    @endforeach                    
                </div>            
            </div>
            <input type="submit" />
            <input type="hidden" id="nonce" name="payment_method_nonce"/>
        </form> --}}
   {{--      <div class="my_container">
        <div id="dropin-container">
            <h1>Ha nesciri i soddi</h1>            
        </div>
        <button id="submit-button">Purchase</button>
        </div>
   <script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>

   <script>
       
     var submitButton = document.querySelector('#submit-button');
     // Step two: create a dropin instance using that container (or a string
    //   that functions as a query selector such as `#dropin-container`)
    braintree.dropin.create({
      container: document.getElementById('dropin-container'),
      // ...plus remaining configuration
    }, (error, dropinInstance) => {
      // Use `dropinInstance` here
      // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
    });

     braintree.dropin.create({
       authorization: 'CLIENT_AUTHORIZATION',
       selector: '#dropin-container'
     }, function (err, dropinInstance) {
       if (err) {
         // Handle any errors that might've occurred when creating Drop-in
         console.error(err);
         return;
       }
       submitButton.addEventListener('click', function () {
         dropinInstance.requestPaymentMethod(function (err, payload) {
           if (err) {
             // Handle errors in requesting payment method
           }

           // Send payload.nonce to your server
         });
       });
     });
   </script>    --}}     
@endsection