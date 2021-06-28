@extends('layouts.app')

@section('title')
    BoolDoctors - Home
@endsection

@section('content')
<div id='search'>

    <section class="my_jumbotron">
        <div class="my_container clame">
            <h1>Prenota la tua visita online!</h1>
            <h3>Cerca tra più di 200.000 dottori</h3>
            <a href="{{route('search')}}"><button class=".reset_btn my_action">Trova il tuo professionista</button></a>
        </div>
    </section>
    <section class="infoShow sectionP">
        <div class="my_container">
            <div class="card">
                <div>
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <h3>Il servizio di prenotazione è gratuito</h3>
                <p>Prenotare una visita con BoolDoctors non comporta costi aggiuntivi. <br>
                   Scegli la data che preferisci, inserisci i tuoi dati e conferma.. la visita è prenotata! <br>
                   Ti ricorderemo della tua visita tramite Email e Sms.
                </p>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Contatti diretti con i dottori</h3>
                <p>Parla con uno specialista in qualsiasi momento e luogo attraverso il videoconsulto. <br>
                   Collegati da qualsiasi dispositivo in totale sicurezza. Potrai condividere referti e documenti, ricevere una seconda opinione e discutere delle tue condizioni di salute in tempo reale.</p>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-hand-pointer"></i>
                </div>
                <h3>I migliori professionsti a portata di click</h3>
                <p>I nostri dottori sono selezionati rispondendo a precisi requisiti prima di far parte della nostra famiglia. <br>
                Scegli tra oltre 200 000 dottori e specialisti. Leggi le recensioni di altri pazienti e scegli il dottore che fa al caso tuo.</p>
            </div>
        </div>
    </section>
    <section class="sponsorDoc sectionP ">
        <div class="my_container">

            <h6 class="js-scroll2">Professionisti in <span class="colorName">primo piano</span></h6>
            <div class="js-scroll slide-top anim_size">

            <div class="cardDoctor" v-for="doctor in docLimit">
                <div class="docAvatar d-flex">
                    <div class="image_box">
                        <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id"><img v-if="doctor.details.image != null"{{-- da modificare in caso di seed --}} :src="'storage/' + doctor.details.image" :alt="'Immagine di ' + doctor.name + ' ' + doctor.surname">
                        <img v-else src="https://i.ibb.co/wQBsxBd/standard-Doctor.png" alt="Immagine del dottore"></a>
                    </div>
                </div>
                <div class="docInfo">
                    <div class="name-star d-flex">
                        <h3>@{{doctor.name}} @{{doctor.surname}}</h3>
                        {{-- stelline --}}
                        <span v-if="doctor.RateInfo.averageRate > 0">
                            <i v-for="star in doctor.RateInfo.averageRate" class="fas fa-star"></i><i v-for="star in (5 - doctor.RateInfo.averageRate)" class="far fa-star"></i>
                        </span>
                        {{-- fine stelline --}}
                    </div>
                    <span v-for="doc in doctor.specializations" class="my_tag">@{{doc.field}}</span>
                    <div v-if="true" class="sponsor">
                        <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 128 160" enable-background="new 0 0 128 128" xml:space="preserve" ><g><polygon fill="#fabb0c" points="46,87.7 41.4,76.9 39.3,76.9 28.9,121.9 41.9,115.9 51,127 60.2,87.3 56.2,83.3  "/><polygon fill="#fabb0c" points="87.4,76.9 83.3,87.1 72.3,82.8 67.8,87.3 77,127 86.1,115.9 99.1,121.9 88.7,76.9  "/><path fill="#fabb0c" d="M105.4,42.4l-7.1-7.1L102,26l-8.7-3.5v-9.4h-10l-4-9.2l-8.6,3.7L64,1l-7.1,7.1l-9.3-3.7l-3.5,8.7h-9.4v10   l-9.2,4l3.7,8.6l-6.6,6.6l7.1,7.1L26,58.9l8.7,3.5v9.4h10l4,9.2l8.6-3.7l6.6,6.6l7.1-7.1l9.3,3.7l3.5-8.7h9.4v-10l9.2-4l-3.7-8.6   L105.4,42.4z M64,64.7c-12.3,0-22.3-10-22.3-22.3c0-12.3,10-22.3,22.3-22.3c12.3,0,22.3,10,22.3,22.3C86.3,54.7,76.3,64.7,64,64.7z"/></g></svg>
                    </div>
                    <p>@{{doctor.details.address}}</p>
                    <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">Contatta questo professionista</a>
                </div>
              </div>
          </div>
        </div>
    </section>
  </div>

<!-- <div class="provaa">
<div class="prova1">
<i class="fas fa-user-md"></i>
</div>
<div class="prova2">
    <h3><h3 class="mb-3">Professionisti in <span class="colorName">primo piano</span></h3></h3>
</div>

</div> -->

{{-- <svg width='80' height='80' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><defs><path id='a' d='M0 0h80v80H0z'/></defs><g fill='none' fill-rule='evenodd'><mask id='b' fill='#fff'><use xlink:href='#a'/></mask><use fill='#F6F8F8' xlink:href='#a'/><path fill='#E6EBEB' fill-rule='nonzero' mask='url(#b)' d='M49 65H30l3.189-23H45.81z'/><path d='M51.94 26.322l.064-.907C52.004 18.585 45.92 13 39 13s-13.004 5.586-13.004 12.415l.064.907c-1.452.485-2.328 2.002-1.986 3.499l.576 2.55c.235 1.075 1.047 1.876 2.029 2.193C27.19 41.014 32.444 47 39 47c6.577 0 11.809-5.986 12.321-12.436.982-.317 1.794-1.139 2.029-2.193l.576-2.55a2.995 2.995 0 0 0-1.986-3.5z' fill='#E6EBEB' fill-rule='nonzero' mask='url(#b)'/><path d='M40 61.468c-4.046 0-7.652-.957-10-2.468v21h20V59c-2.348 1.51-5.954 2.468-10 2.468z' fill='#8BE1D6' fill-rule='nonzero' mask='url(#b)'/><path d='M32.456 50C18.76 53.34 5 65.717 5 80h32c-.043-13.17-1.75-23.126-4.544-30zM42 80h32c0-14.71-12.8-27.088-27.417-30-2.788 6.895-4.54 16.66-4.583 30z' fill='#FFF' fill-rule='nonzero' mask='url(#b)'/><path fill='#EEF2F2' fill-rule='nonzero' mask='url(#b)' d='M46 65h13v8H46z'/><path fill='#8BE1D6' fill-rule='nonzero' mask='url(#b)' d='M50 64h5v2h-5z'/></g></svg> --}}



    <section class="SearchLinks sectionP">
        <h6 class="js-scroll2">Le specializzazioni dei nostri <span class="colorName">dottori</span></h6>
        <div class="specializations my_container">
            @foreach ($specializations as $specialization)
            <div class="specialization_container">
                <a href="{{route('search', ['specialization' => $specialization->specialization])}}">{{$specialization['specialization']}}</a>
            </div>
            @endforeach
        </div>
    </section>
     <div class="my_container">
        <hr>
    </div>
    <section class="glassMorph sectionP">
        <div class="my_container">
            <div class="marginB">
                <div class="glass blue">
                    <div class="text">
                        <h3>Sei un dottore o uno specialista sanitario? Entra nella nuova era digitale</h3>
                        <p>
                            Un unico strumento per gestire tutte le prestazioni, le visite e le attività mediche. Da web e da mobile, 24 ore su 24.
                        </p>
                        <a href="{{route('register')}}"><button class="my_action small">Iscriviti</button></a>
                    </div>
                    <div class="glass_img">
                        <svg viewBox="0 0 219 206" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><filter x="-1.4%" y="-1.5%" width="102.7%" height="102.9%" filterUnits="objectBoundingBox" id="b"><feGaussianBlur stdDeviation="1.5" in="SourceAlpha" result="shadowBlurInner1"/><feOffset dy="3" in="shadowBlurInner1" result="shadowOffsetInner1"/><feComposite in="shadowOffsetInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"/><feColorMatrix values="0 0 0 0 0.759001359 0 0 0 0 0.759001359 0 0 0 0 0.759001359 0 0 0 0.5 0" in="shadowInnerInner1"/></filter><path d="M515.386 1741.635h-31.707v-16.725c0-12.081-9.834-21.91-21.921-21.91h-46.516c-12.087 0-21.921 9.829-21.921 21.91v16.725h-31.707c-17.983 0-32.614 14.623-32.614 32.597v102.172c0 17.974 14.63 32.596 32.614 32.596h153.772c17.983 0 32.614-14.622 32.614-32.596v-102.172c0-17.974-14.63-32.597-32.614-32.597zm-109.233-16.725c0-5.01 4.077-9.085 9.09-9.085h46.515c5.012 0 9.09 4.075 9.09 9.085v16.725h-64.695v-16.725zm-64.321 151.493v-102.171c0-8.658 5.6-16.029 13.366-18.698v139.568c-7.767-2.67-13.366-10.04-13.366-18.699zm26.198 19.772V1754.46h140.94v141.715H368.03zm153.772-140.642c7.767 2.67 13.366 10.04 13.366 18.699v102.171c0 8.658-5.6 16.029-13.366 18.698v-139.568zm-70.417 24.737a6.414 6.414 0 016.417 6.412v19.344h19.354a6.414 6.414 0 016.417 6.413v25.757a6.414 6.414 0 01-6.417 6.412h-19.354v19.344a6.414 6.414 0 01-6.417 6.413h-25.77a6.414 6.414 0 01-6.417-6.413v-19.344h-19.354a6.414 6.414 0 01-6.417-6.412v-25.757a6.414 6.414 0 016.417-6.413h19.354v-19.344a6.414 6.414 0 016.417-6.412zm-6.416 12.825h-12.938v19.344a6.414 6.414 0 01-6.416 6.412H406.26v12.932h19.355a6.414 6.414 0 016.416 6.413v19.344h12.938v-19.344a6.414 6.414 0 016.416-6.413h19.355v-12.932h-19.355a6.414 6.414 0 01-6.416-6.412v-19.344z" id="a"/></defs><g transform="translate(-329 -1703)" fill="none" fill-rule="evenodd"><use fill="#FFF" xlink:href="#a"/><use fill="#000" filter="url(#b)" xlink:href="#a"/></g></svg>
                    </div>
                </div>
            </div>

             <div class="marginB glass_blue">
                <div class="glass">
                    <div class="text">
                        <h3> Sei in cerca di un professionista che possa darti delle risposte?</h3>
                        <p>
                            Una piattaforma ad accesso libero che raccoglie professionisti da tutta italia. Da web e da mobile, 24 ore su 24.
                        </p>
                        <a href="{{route('search')}}"><button class="my_action small my_action-blue">Trova il tuo professionista</button></a>
                    </div>
                    <div class="glass_img">
                        <?xml version='1.0' encoding='iso-8859-1'?>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 470 470" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 470 470">
                        <g>
                            <path d="m462.5,22.5h-455c-4.143,0-7.5,3.358-7.5,7.5v410c0,4.142 3.357,7.5 7.5,7.5h455c4.143,0 7.5-3.358 7.5-7.5v-80c0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v72.5h-440v-335h440v232.5c0,4.142 3.357,7.5 7.5,7.5s7.5-3.358 7.5-7.5v-300c0-4.142-3.357-7.5-7.5-7.5zm-447.5,15h277.5v45h-277.5v-45zm292.5,45v-45h147.5v45h-147.5z"/>
                            <path d="m381.5,52c-4.411,0-8,3.589-8,8s3.589,8 8,8 8-3.589 8-8-3.589-8-8-8z"/>
                            <path d="m340.5,52c-4.411,0-8,3.589-8,8s3.589,8 8,8 8-3.589 8-8-3.589-8-8-8z"/>
                            <path d="m422.5,52c-4.411,0-8,3.589-8,8s3.589,8 8,8 8-3.589 8-8-3.589-8-8-8z"/>
                            <path d="m269.745,328.458c0,1.989 0.79,3.897 2.196,5.303l58.543,58.542c1.407,1.407 3.314,2.197 5.304,2.197s3.896-0.79 5.304-2.197l21.213-21.213c2.929-2.929 2.929-7.678 0-10.606l-58.542-58.542c-2.929-2.929-7.677-2.929-10.607,0l-5.303,5.303-10.831-10.831c32.824-38.264 31.15-96.129-5.079-132.358-18.416-18.416-42.9-28.557-68.943-28.557s-50.527,10.142-68.943,28.557c-38.015,38.015-38.015,99.871 0,137.886 18.416,18.416 42.9,28.557 68.943,28.557 23.527,0 45.78-8.279 63.438-23.455l10.807,10.808-5.303,5.303c-1.407,1.407-2.197,3.314-2.197,5.303zm-125.082-37.123c-32.167-32.167-32.167-84.506 0-116.673 15.582-15.582 36.3-24.164 58.336-24.164s42.754,8.582 58.336,24.164c32.167,32.167 32.167,84.506 0,116.673-15.582,15.582-36.3,24.164-58.336,24.164s-42.754-8.582-58.336-24.164zm201.732,74.453l-10.606,10.607-47.937-47.936 5.301-5.301c0.005-0.005 5.306-5.306 5.306-5.306l47.936,47.936z"/>
                            <path d="m250.729,185.27c-12.75-12.749-29.7-19.771-47.73-19.771s-34.98,7.021-47.73,19.771c-26.317,26.318-26.317,69.141 0,95.459 12.75,12.749 29.7,19.771 47.73,19.771s34.98-7.021 47.73-19.771c26.318-26.318 26.318-69.142 0-95.459zm-10.607,84.852c-9.916,9.916-23.1,15.377-37.123,15.377s-27.207-5.461-37.123-15.377c-20.47-20.47-20.47-53.776 0-74.246 9.916-9.916 23.1-15.377 37.123-15.377s27.207,5.461 37.123,15.377c20.47,20.47 20.47,53.776 0,74.246z"/>
                        </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>


    </section>    
</div>

@if (session('message'))
<div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
<script>dayjs().format()</script>
<script src="https://unpkg.com/vue@next" ></script>
<script src="{{ asset('js/search.js') }}" defer></script>
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection
