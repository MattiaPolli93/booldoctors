@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">

            {{-- personal info --}}
            <section id="info">
                <div class="container">
                    <div class="row">
                        {{-- profile image --}}
                        <div class="col">
                            <div class="image_box">
                                <figure>
                                    <img src="{{ asset('storage/' . $user->details->image) }}" alt="Immagine di {{$user->name}}">
                                    <figcaption>
                                        <p><small>La tua immagine di profilo</small></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <a href="{{route('admin.profile.edit', [ 'profile' => $user->id ])}}"><button type="button" class="btn btn-info"><i class="fas fa-pencil-alt"></i>Modifica dettagli</button></a>
                        </div>
                        {{-- personal details --}}
                        <div class="col">
                            <h1>Ciao {{$user->name}} {{$user->surname}}</h1>
                            <h4>{{$user->details->address}}</h4>
                        </div>
                    </div>
                </div>
                
               
                <p>{{$user->details->bio}}</p>

                
                <a href="#"><button type="button" class="btn btn-info">Mostra recensioni</button></a>
                <a href="#"><button type="button" class="btn btn-info">Mostra messaggi</button></a>
                <a href="#"><button type="button" class="btn btn-info">Visualizza statistiche</button></a>
            </section>
            {{-- fine personal info --}}

            {{-- reviews --}}
            <section id="reviews">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            ciao

                        </div>
                    </div>
                </div>
            </section>
            {{-- fine reviews --}}

            {{-- statistics --}}
            <section id="statistics">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            come

                        </div>
                    </div>
                </div>
            </section>
            {{-- fine statistics --}}

            {{-- sponsorships --}}
            <section id="sponsor">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            stai
                        </div>
                    </div>
                </div>
            </section>
            {{-- fine sponsorships --}}

        </div>
    </div>
</div>
@endsection
