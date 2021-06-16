@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <section class="my_jumbotron">
        <div class="my_container clame">
            <h1>Prenota la tua visita online!</h1>
            <h3>Cerca tra 200 000 dottori.</h3>
            <a><button class=".reset_btn my_action">Trova il tuo professionista</button></a>
        </div>
    </section>
    <section class="infoShow">
        <div class="my_container">
            <div class="card">
                <div>
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <h3>Il servizio di prenotazione è gratuito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora ad nobis eligendi odio aspernatur? Aspernatur deserunt expedita optio, qui ipsum, impedit laudantium eum ullam tempore, nulla sunt odit tenetur?</p>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <h3>Il servizio di prenotazione è gratuito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora ad nobis eligendi odio aspernatur? Aspernatur deserunt expedita optio, qui ipsum, impedit laudantium eum ullam tempore, nulla sunt odit tenetur?</p>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <h3>Il servizio di prenotazione è gratuito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora ad nobis eligendi odio aspernatur? Aspernatur deserunt expedita optio, qui ipsum, impedit laudantium eum ullam tempore, nulla sunt odit tenetur?</p>
            </div>
        </div>        
    </section>    
    <specs>
        <div class="specializations">
            @foreach ($specializations as $specialization)
                <a href="#">{{$specialization['specialization']}}</a>
            @endforeach
        </div>
    </specs>
    <div>
        @foreach ($sponsored_doctors as $doctor)
            <ul style="list-style: none">
                <li style="font-size: 26px">{{$doctor->name}} {{$doctor->surname}}</li>
            </ul>            
        @endforeach        
    </div> 
@endsection