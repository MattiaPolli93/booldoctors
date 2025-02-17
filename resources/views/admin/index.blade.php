@extends('layouts.app')

@section('title')
    BoolDoctors - Dashboard
@endsection

@section('content')
    {{-- personal info --}}
    <section id="info">
        <div class="admin nav_container">
            <nav class="bradCrumps">
                <ul>
                    <li><a href="{{ route('homepage') }}">Home</a></li>
                    <span><i class="fas fa-angle-double-right"></i></span>
                    <li><a href="#" class="active">Il Mio Profilo</a></li>
                </ul>
            </nav>
            <hr>
        </div>
        <div class="my_container info d-flex">            
            {{-- profile image --}}
            <div class="image_box d-flex flex-column align-items-center">
                <figure class="text-center">
                    <div class="image text-center">
                        @if ($details->image != null)
                        <img {{-- da modificare in caso di seed --}} src="{{ asset('storage/' . $details->image) }}" alt="Immagine di {{$user->name}} {{$user->surname}}">
                        @else
                        <img src="https://i.ibb.co/wQBsxBd/standard-Doctor.png" alt="Immagine del dottore">
                        @endif
                    </div>
                        <figcaption>
                            <p><small>La tua immagine di profilo</small></p>
                        </figcaption>
                </figure>
                <div class="info-buttons d-flex justify-content-around">
                    <a href="{{route('admin.profile.edit', [ 'profile' => $user->id ])}}"><button type="button" class="btn btn-insert"><i class="fas fa-pencil-alt"></i> Modifica dettagli</button></a>
                    {{-- <a href="#"><button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Elimina profilo</button></a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i> Elimina profilo</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Elimina profilo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei proprio sicuro di voler eliminare il profilo? Questa operazione è irreversibile.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-insert" data-dismiss="modal">Torna indietro</button>
                                    <form action="{{route('admin.profile.destroy', [ 'profile' => $user->id ])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Sono sicuro, elimina il profilo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- personal details --}}
            <div class="details d-flex">
                <div class="details-title d-flex">
                    <h1>Buongiorno, <br> <span class="name">{{$user->name}} {{$user->surname}}</span></h1>
                    <h4><strong>Indirizzo <br> </strong> {{$user->details->address}}</h4>
                </div>
                <div class="bio d-flex">
                    <p><strong>Bio <br></strong>
                        @if ($user->details->bio == '')
                        <span><em>Nessuna bio inserita</em></span>
                        @else
                        <span>{{$user->details->bio}}</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @if ($sponsored == true)            
            <h3 id="date">Sei sponsorizzato! La sponsorizzazione scade il {{$currentExpireDate}}</h3>
        @endif
    </section>
    {{-- fine personal info --}}

    {{-- reviews --}}
    <section id="reviews">
      <p class="js-scroll slide-left reviews-text-left">
        Qui puoi accedere alla pagina dei messaggi e leggere i tuoi messaggi privati inviati dagli utenti che hanno bisogno del tuo aiuto per risolvere i loro problemi di salute. <br>
        Non dimenticarti di loro!!
        <strong><a href="{{route('admin.messages')}}">Vai alla pagina messaggi<i class="fas fa-arrow-right"></i></a></strong>
        Qui puoi leggere tutte le recensioni ricevute dagli utenti in base ai servizi che hai offerto e su come si sono trovati con te.
        <br>
        Non arrabbiarti se qualcuna non ti soddisfa, sappiamo che dai sempre il massimo per i tuoi pazienti!
        <strong><a href="{{route('admin.comments')}}">Vai alla pagina recensioni<i class="fas fa-arrow-right"></i></a></strong>
      </p>

      <section class="right-scroll">
        <div class="js-scroll slide-right">
          <h2>Messaggi &<br>Recensioni</h2>
        </div>
      </section>
    </section>
    {{-- fine reviews --}}

    {{-- statistics --}}
    <section id="statistics">
        <p class="js-scroll slide-right reviews-text-right">
          In questa pagina trovi le tue statistiche, sono calcolate sulla base dei messaggi privati che hai ricevuto e delle recensioni ricevute per i tuoi servizi, sono filtrate per mese e voto.
          <strong><a href="{{route('admin.statistics')}}">Vai alla pagina statistiche<i class="fas fa-arrow-right"></i></a></strong>
        </p>

        <section>
          <div class="js-scroll slide-left">
            <h2>Statistiche</h2>
          </div>
        </section>
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
                        Scegli fra le seguenti offerte e acquista visibilità, il tuo profilo sarà messo in risalto nel motore di ricerca di BoolDoctors!
                    </p>
                </div>
                {{-- VERSIONE CARD --}}

                    {{-- Scegli sponsor --}}
                    <div class="choose-sponsor pt-3 text-center">
                        <h1>Ottieni una Sponsorizzazione!</h1>
                    </div>

                    {{-- Sponsor disponibili --}}
                    <div class="sponsors d-flex">
                        {{-- 2.99 --}}

                        <div class="card card_wrapcard price first">
                            <ul>
                                <li class="price">
                                    <div class="pricenumber">
                                        <div class="euro">
                                            <i class="fas fa-euro-sign"></i>
                                        </div>
                                        <span>2.99</span>
                                    </div>
                                </li>
                                <li><span class="days">1 giorno di sponsorizzazione!</span></li>
                                <li><span>2.99 euro al giorno</span></li>
                                <li><span class="saving">Nessun risparmio</span></li>
                            </ul>
                            <a href="{{route('admin.sponsor', ['id' => 1])}}"><button class="btn btn-insert">Ottieni</button></a>
                            <div class="hovertext_container">
                            <span class="hovertext">Regular</span>
                          </div>
                        </div>

                        {{-- 5.99 --}}
                        <div class="card card_wrapcard price second">
                            <ul>
                                <li class="price">
                                    <div class="pricenumber">
                                        <div class="euro">
                                            <i class="fas fa-euro-sign"></i>
                                        </div>
                                        <span>5.99</span>
                                    </div>
                                </li>
                                <li><span class="days">3 giorni di sponsorizzazione!</span></li>
                                <li><span>2.00 euro al giorno</span></li>
                                <li><span class="saving">Risparmi 2.98 euro rispetto al piano Regular</span></li>
                            </ul>
                            <a href="{{route('admin.sponsor', ['id' => 2])}}"><button class="btn btn-insert">Ottieni</button></a>
                            <div class="hovertext_container">
                            <span class="hovertext">Medium</span>
                          </div>
                        </div>

                        {{-- 9.99 --}}
                        <div class="card card_wrapcard price third">
                            <ul>
                                <li class="price">
                                    <div class="pricenumber">
                                        <div class="euro">
                                            <i class="fas fa-euro-sign"></i>
                                        </div>
                                        <span>9.99</span>
                                    </div>
                                </li>
                                <li><span class="days">6 giorni di sponsorizzazione!</span></li>
                                <li><span>1.66 euro al giorno</span></li>
                                <li><span class="saving">Risparmi 7.95 euro rispetto al piano Regular</span></li>
                            </ul>
                            <a href="{{route('admin.sponsor', ['id' => 3])}}"><button class="btn btn-insert">Ottieni</button></a>
                            <div class="hovertext_container">
                            <span class="hovertext">Premium</span>
                          </div>
                        </div>
                    </div>
            </div>
        </div>
        <hr>
    </section>
    {{-- fine sponsorships --}}    
    @if (session('message'))
    <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection
