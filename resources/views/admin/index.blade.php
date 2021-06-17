@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    {{-- personal info --}}
    <section id="info">
        <div class="my_container">
            {{-- profile image --}}
            <div class="image_box">
                <figure>
                    <img src="{{ asset('storage/' . $user->details->image) }}" alt="Immagine di {{$user->name}}">
                    <figcaption>
                        <p><small>La tua immagine di profilo</small></p>
                    </figcaption>
                </figure>
            </div>
            <a href="{{route('admin.profile.edit', [ 'profile' => $user->id ])}}"><button type="button" class="btn btn-info"><i class="fas fa-pencil-alt"></i>Modifica dettagli</button></a>
            {{-- personal details --}}
            <div class="col">
                <h1>Ciao {{$user->name}} {{$user->surname}}</h1>
                <h4>{{$user->details->address}}</h4>
            </div>
            <p>{{$user->details->bio}}</p>
            <a href="{{route('admin.messages')}}"><button type="button" class="btn btn-info">Mostra messaggi</button></a>
        </div>
    </section>
    {{-- fine personal info --}}

    {{-- reviews --}}
    <section id="reviews">
        <div class="my_container">
            <a href="{{route('admin.comments')}}"><button type="button" class="btn btn-info">Mostra recensioni</button></a>
        </div>
    </section>
    {{-- fine reviews --}}

    {{-- statistics --}}
    <section id="statistics">
        <div class="my_container">
            <a href="#"><button type="button" class="btn btn-info">Visualizza le tue statistiche</button></a>
        </div>                       
        </section>
        {{-- fine statistics --}}

    {{-- sponsorships --}}
    <section id="sponsor">
        <div class="my_container">
            <div class="text-center h-100 d-flex flex-column justify-content-between">
                <div class="text">
                    <h2>
                        Vuoi aggiungere una sponsorizzazione al tuo profilo?
                    </h2>
                    <p>
                        Scegli fra le seguenti offerte e acquista visibilità, il tuo profilo sarà messo in risalto nella homepage di BoolDoctors!           
                    </p>
                </div>
                <a href="#"><button class="btn btn-info"><em>Ottieni sponsorizzazione</em></button></a>
            </div>
        </div>
    </section>
    {{-- fine sponsorships --}}
@endsection
