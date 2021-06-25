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
                    <p><strong>Bio <br> </strong> {{$user->details->bio}}</p>
                </div>
            </div>
        </div>

    </section>
    {{-- fine personal info --}}

    {{-- reviews --}}
    <section id="reviews">
      <p class="js-scroll slide-left reviews-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <strong><a href="{{route('admin.messages')}}">Vai alla pagina<i class="fas fa-arrow-right"></i></a></strong>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        <strong><a href="{{route('admin.comments')}}">Vai alla pagina<i class="fas fa-arrow-right"></i></a></strong>
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
        <p class="js-scroll slide-right reviews-text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <strong><a href="{{route('admin.statistics')}}">Vai alla pagina<i class="fas fa-arrow-right"></i></a></strong>
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
