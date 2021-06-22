@extends('layouts.app')

@section('title')
    Sponsorizzazione
@endsection


@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="my_container pb-4">
    <h1 id="title">Hai scelto il piano <span class="text-uppercase">{{$plan->plan}}</span></h1>
    <form class="pb-4" id="pay_form" method="POST" action=""  enctype="multipart/form-data"> 
      @csrf
      @method('POST')
      <h3 class="mt-5 mb-4">Il prezzo da pagare è {{$plan->price}} €</h3>
      <label for="amount" class="d-lg-none">
        <span class="input-label">Amount</span>
            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$plan->price}}">
            </div>
        </label>             
          
        <div id="dropin-container"></div>
        <div class="text-center">
            <input  type="submit" value="Paga Adesso" class="btn btn-insert">
            <input type="hidden" id="nonce" name="payment_method_nonce"/>
        </div> 
    </form>
    <p class="link_dashboard"><a href="{{ route('admin.profile.index') }}">Torna alla Dashboard</a></p>
</div> 

<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>

<script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.js"></script>

 
 
 
<script>    
    var form = document.querySelector('#pay_form');
    var token = "{{ $token }}"
    braintree.dropin.create({
    authorization: token,
    selector: '#dropin-container',
    locale: 'it_IT'
    }, function (err, instance) {
    form.addEventListener('submit',function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        })
    }); 
</script> 
@endsection