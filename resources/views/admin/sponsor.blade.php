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
        <h1 id="title">Riepilogo dei tuoi dati</h1>
        <div class="recap">           
            <div class="user-info">
                <h2>Nome: <span class="main_color">{{$user->name}}</span></h2>
                <h2>Cognome: <span class="main_color">{{$user->surname}}</span></h2>
                <h3>E-mail: <span class="main_color">{{$user->email}}</span></h3>
                <h4>Indirizzo: <span class="main_color">{{$user->details->address}}</span></h4>
                <p class="phone">Tel: <span class="main_color">{{$user->details->phone}}</span></p>
            </div>
            <div class="plan">
                <h3>Hai scelto il piano <span class="text-uppercase plan_name">{{$plan->plan}}</span></h3> 
                <h4>Ti garantirà una sponsorizzazione di {{$plan->period}} ore</h4>
                <h4>Il piano scadrà il {{$currentExpireDate}}</h4>
                <h3 class="mt-5 mb-4">Il totale è: <span class="price">{{$plan->price}} €</span> </h3>
            </div>              
        </div>    
    <form class="pb-4" id="pay_form" method="POST" action="{{route('admin.checkout', $plan->id)}}"  enctype="multipart/form-data"> 
      @csrf
      @method('POST')
      
      <label for="amount" class="d-lg-none">
        <span class="input-label">Amount</span>
            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$plan->price}}">
            </div>
        </label>             
          
        <div id="dropin-container"></div>
        <div class="text-center mt-5">
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