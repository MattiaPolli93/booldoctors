@extends('layouts.app')

@section('title')
    BoolDoctors - Dashboard
@endsection

@section('content')
    {{-- personal info --}}
    <section id="info">
        <div class="my_container info d-flex">
            {{-- profile image --}}
            <div class="image_box d-flex flex-column align-items-center">
                <figure class="text-center">
                    @if ($details->image != 'https://via.placeholder.com/150')
                    <img {{-- da modificare in caso di seed --}} src="{{ asset('storage/' . $details->image) }}" alt="Immagine di {{$user->name}} {{$user->surname}}">
                    @else
                    <img src="https://i.ibb.co/wQBsxBd/standard-Doctor.png" alt="Immagine del dottore">
                    @endif
                    <figcaption>
                        <p><small>La tua immagine di profilo</small></p>
                    </figcaption>
                </figure>
                <div class="info-buttons d-flex justify-content-around">
                    <a href="{{route('admin.profile.edit', [ 'profile' => $user->id ])}}"><button type="button" class="btn btn-insert"><i class="fas fa-pencil-alt"></i> Modifica dettagli</button></a>
                    <a href="#"><button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Elimina profilo</button></a>
                </div>
            </div>

            {{-- personal details --}}
            <div class="details d-flex">
                <div class="details-title d-flex">
                    <h1>Buongiorno, <br> <span class="name">{{$user->name}} {{$user->surname}}</span></h1>
                    <h4><strong>Indirizzo <br> </strong> {{$user->details->address}}</h4>
                </div>
                <div class="bio d-flex">
                    <p><strong>Bio <br> </strong> {{$user->details->bio}}</p>
                </div>
            </div>
        </div>
        <div class="btn-box text-center">                
            <a href="{{route('admin.messages')}}"><button type="button" class="btn btn-insert ">Mostra messaggi</button></a>
        </div>
    </section>
    {{-- fine personal info --}}

    {{-- reviews --}}
    <section id="reviews">
        <div class="my_container d-flex align-items-center">
            <div class="reviews d-flex justify-content-center">
                <a href="{{route('admin.comments')}}"><button type="button" class="btn btn-insert">Mostra recensioni</button></a>
            </div>
            <div class="reviews-image">
                <img src="https://www.interno16holidayhome.com/wp-content/uploads/2019/01/reviews.png" alt="Recensioni">
            </div>
        </div>
    </section>
    {{-- fine reviews --}}

    {{-- statistics --}}
    <section id="statistics">
        <div class="my_container d-flex align-items-center">
            <div class="statistics d-flex justify-content-center">
                <a href="{{route('admin.statistics')}}"><button type="button" class="btn btn-insert">Visualizza le tue statistiche</button></a>
            </div>
            <div class="statistics-image">
                <img src="https://images.vexels.com/media/users/3/143065/isolated/preview/c6cbc8cf5ca3856bca8d5f28c0471fca-bar-graph-cart-by-vexels.png" alt="Grafico">
            </div>
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
                {{-- VERSIONE CARD --}}
                <div class="my_container">
                    {{-- Scegli sponsor --}}
                    <div class="choose-sponsor pt-3 text-center">
                        <h1>Ottieni una Sponsorizzazione!</h1>
                    </div>
                    
                    {{-- Sponsor disponibili --}}
                    <div class="sponsors d-flex">
                        {{-- 2.99 --}}
                        <div class="card_wrapcard price first">
                            <ul>
                                <li class="price">
                                    <div class="pricenumber">
                                        <div class="euro">
                                            <i class="fas fa-euro-sign"></i>
                                        </div>
                                        <span>2.99</span>
                                    </div>
                                    <div class="decimal">
                                        <span class="cent">99</span>
                                        <span class="month">monthly</span>
                                    </div>
                                </li>
                                <li><span>44 Projects</span></li>
                                <li><span>44 Storage</span></li>
                                <li><span>44</span></li>
                            </ul>
                            <a href="{{route('admin.sponsor', ['id' => 1])}}"><button class="btn btn-insert">Ottieni sponsorizzazione</button></a>
                        </div>

                        {{-- 5.99 --}}
                        <div class="card_wrapcard price second">
                            <ul>
                                <li class="price">
                                    <div class="pricenumber">
                                        <div class="euro">
                                            <i class="fas fa-euro-sign"></i>
                                        </div>
                                        <span>5.99</span>
                                    </div>
                                    <div class="decimal">
                                        <span class="cent">99</span>
                                        <span class="month">monthly</span>
                                    </div>
                                </li>
                                <li><span>44 Projects</span></li>
                                <li><span>44 Storage</span></li>
                                <li><span>44</span></li>
                            </ul>
                            <a href="{{route('admin.sponsor', ['id' => 2])}}"><button class="btn btn-insert">Ottieni sponsorizzazione</button></a>
                        </div>

                        {{-- 9.99 --}}
                        <div class="card_wrapcard price third">
                            <ul>
                                <li class="price">
                                    <div class="pricenumber">
                                        <div class="euro">
                                            <i class="fas fa-euro-sign"></i>
                                        </div>
                                        <span>9.99</span>
                                    </div>
                                    <div class="decimal">
                                        <span class="cent">99</span>
                                        <span class="month">monthly</span>
                                    </div>
                                </li>
                                <li><span>44 Projects</span></li>
                                <li><span>44 Storage</span></li>
                                <li><span>44</span></li>
                            </ul>
                            <a href="{{route('admin.sponsor', ['id' => 3])}}"><button class="btn btn-insert">Ottieni sponsorizzazione</button></a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    {{-- fine sponsorships --}}
@endsection
