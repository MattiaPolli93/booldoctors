@extends('layouts.app')

@section('title')
    Sponsorizzazione Checkout
@endsection

@section('content')
    <div class="my_container">
        @if ($result->success == true)
        <div class="success text-center">
            <h1> <span class="user">{{$user->name}} {{$user->surname}}</span>  la tua transazione è andata a buon fine</h1>
            <h2>La tua sponsorizzazione sarà estesa per altre {{$plan->period}} ore</h2>
            <p class="text-center">Grazie per la tua scelta, <span class="team">BoolDoctors Team</span></p>
            <p class="link_dashboard text-center"><a href="{{ route('admin.profile.index')}}">Torna alla Dashboard</a></p> 
        </div>
        @elseif($result->success == false)
        <div class="error text-center">
            <h1>Ci dispiace, qualcosa è andato <span class="err">storto</span></h1>
            <h2>La tua transazione è fallita, ti preghiamo di riprovare</h2>
            <p class="text-center"><span class="team">BoolDoctors Team</span></p>
            <p class="link_dashboard text-center"><a href="{{ route('admin.sponsor', $plan->id)}}">Torna alla pagina di Sponsorizzazione</a></p> 
        </div>                      
        @endif              
    </div>
    
@endsection