@extends('layouts.app')

@section('title')
    BoolDoctors - Profilo
@endsection

@section('content')
<div class="container profile">

    {{-- dettagli principali --}}
    <div class="details">
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
        </div>
    </div>
    {{-- fine dettagli principali --}}

    {{-- menu dottore --}}
    <div class="menu">
        <ul>
            <li><a href="#bio">Bio</a></li>
            <li><a href="#services">Servizi</a></li>
            <li><a href="#review">Recensioni</a></li>
            <li><a href="#contacts">Contatti</a></li>
            <li><a href="#contact_me">Manda un messaggio al medico</a></li>
        </ul>
    </div>
    <hr>
    
    {{-- bio --}}
    <section id="bio">
        <h3>Bio</h3>
        <p>{{$doctor->details->bio}}</p>
    </section>

    <hr>

    {{-- servizi --}}
    <section id="services">
        <h3>Servizi</h3>
        <div class="service_cont">
            @foreach ($doctor->services as $service)
            <div class="service">
                <span>{{$service['service']}} </span>
                <i class="fas fa-circle"></i>
                <span class="euro"><span >€</span> {{$service['price']}}</span>
            </div>
            @endforeach
        </div>
    </section>

    <hr>
    {{-- recensioni --}}
    <section id="review">
        <h3>Recensioni</h3>
        <div class="review_cont">
        @foreach ($doctor->comments as $comment)
            <div class="review_box">
                <div class="top">
                    <div class="username">{{$comment['username']}}</div>
                    <div class="rate">
                    @for ($i = 0; $i < $comment['rate']; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                    </div>
                </div>
                <p class="date"><small>{{$comment['added_on']}}</small></p>
                @if ($comment['comment'])
                <div>{{$comment['comment']}}</div>
                @else
                <p><em>Nessun commento</em></p>
                @endif
           </div>
        @endforeach
        </div>

        <h3>Inserisci una recensione</h3>
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
                <label class="form-check-label" for="rate_1">
                    <i class="fas fa-star"></i>
                </label>
                <input class="form-check-input ml-2 mt-1" type="radio" name="rate" id="rate_1" value="1">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_2">
                    @for ($i = 0; $i < 2; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </label>
                <input class="form-check-input ml-2 mt-1" type="radio" name="rate" id="rate_2" value="2">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_3">
                    @for ($i = 0; $i < 3; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </label>
                <input class="form-check-input ml-2 mt-1" type="radio" name="rate" id="rate_3" value="3">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_4">
                    @for ($i = 0; $i < 4; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </label>
                <input class="form-check-input ml-2 mt-1" type="radio" name="rate" id="rate_4" value="4">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_5">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </label>
                <input class="form-check-input ml-2 mt-1" type="radio" name="rate" id="rate_5" value="5">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-insert">Inserisci</button>
            </div>
        </form>
    </section> 

    <hr>
    {{-- contatti --}}
    <section id="contacts">
        <h3>Contatti</h3>
        <p>Indirizzo: {{$doctor->details->address}}</p>
        <p>Telefono: {{$doctor->details->phone}}</p>
    </section>

    <hr>
    {{-- contattami --}}
    <section id="contact_me">
        <h3>Manda un messaggio al medico</h3>
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
                <button type="submit" class="btn btn-insert">Inserisci</button>
            </div>
        </form>
    </section>
    
</div>
@endsection
