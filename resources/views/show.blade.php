@extends('layouts.app')

@section('title')
    Profilo
@endsection

@section('content')
<div class="container">

    {{-- dettagli principali --}}
    <div class="doctor">
        <div class="col_left">
            <div class="image_box">
                <img src="{{$doctor->details->image ? $doctor->details->image : 'https://i.ibb.co/wQBsxBd/standard-Doctor.png'}}" alt="{{$doctor->name}} {{$doctor->surname}}">
            </div>
        </div>
        <div class="col_right">
            <h1>{{$doctor->name}} {{$doctor->surname}}</h1>
            <div class="specializations">
                @foreach ($doctor->specializations as $specialization)
                    <span class="my_tag">{{$specialization['specialization']}}</span>
                @endforeach
            </div>
            <h3>Contatti</h3>
            <p>Indirizzo: {{$doctor->details->address}}</p>
            <p>Telefono: {{$doctor->details->phone}}</p>
        </div>
    </div>
    {{-- fine dettagli principali --}}
    <h3>Bio</h3>
    <p>{{$doctor->details->bio}}</p>

    <h3>Servizi</h3>
    <div class="services">
        @foreach ($doctor->services as $service)
        <div class="service_box">
            <span>{{$service['service']}} </span>
            <span class="right">{{$service['price']}} €</span>
        </div>
        @endforeach
    </div> 
    <div>
        <h2>Recensioni</h2>
        @foreach ($doctor->comments as $comment)
            <ul>
                <li>
                    <h4>{{$comment['username']}}</h4>                        
                    <p>Voto: {{$comment['rate']}}</p>
                    @if ($comment['comment'])
                    <p>{{$comment['comment']}}</p>
                    @else
                    <p><em>Nessun commento</em></p>
                    @endif
                    <small>{{$comment['added_on']}}</small>
                </li>
            </ul>                
        @endforeach
    </div> 

    <h2>Manda un messaggio al medico</h2>
    <form action="{{route('doctor.store-message', ['id' => $doctor->id])}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Inserisci la tua mail">
        </div>
        <div class="form-group">
            <label for="message">Messaggio</label>
            <textarea class="form-control"  name="message" id="message" cols="30" rows="4" placeholder="Inserisci il tuo messaggio"></textarea>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </div>
    </form>

    <h2>Inserisci una recensione</h2>
    <form action="{{route('doctor.store-comment', ['id' => $doctor->id])}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="username">Nome</label>
            <input type="username" class="form-control" id="username" name="username" placeholder="Inserisci il tuo username">
        </div>
        <div class="form-group">
            <label for="comment">Recensione</label>
            <textarea class="form-control"  name="comment" id="comment" cols="30" rows="4" placeholder="Inserisci la tua recensione"></textarea>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="rate_1">1</label>
            <input class="form-check-input" type="radio" name="rate" id="rate_1" value="1">
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="rate_2">2</label>
            <input class="form-check-input" type="radio" name="rate" id="rate_2" value="2">
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="rate_3">3</label>
            <input class="form-check-input" type="radio" name="rate" id="rate_3" value="3">
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="rate_4">4</label>
            <input class="form-check-input" type="radio" name="rate" id="rate_4" value="4">
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="rate_5">5</label>
            <input class="form-check-input" type="radio" name="rate" id="rate_5" value="5">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </div>
    </form>
</div>
@endsection

