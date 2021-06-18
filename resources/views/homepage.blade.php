@extends('layouts.app')

@section('title')
    BoolDoctors - Home
@endsection

@section('content')
<div id='search'>

    <section class="my_jumbotron">
        <div class="my_container clame">
            <h1>Prenota la tua visita online!</h1>
            <h3>Cerca tra 200 000 dottori.</h3>
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora ad nobis eligendi odio aspernatur? Aspernatur deserunt expedita optio, qui ipsum, impedit laudantium eum ullam tempore, nulla sunt odit tenetur?</p>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Contatti diretti con i dottori</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora ad nobis eligendi odio aspernatur? Aspernatur deserunt expedita optio, qui ipsum, impedit laudantium eum ullam tempore, nulla sunt odit tenetur?</p>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-hand-pointer"></i>
                </div>
                <h3>I migliori professionsti a portata di click</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora ad nobis eligendi odio aspernatur? Aspernatur deserunt expedita optio, qui ipsum, impedit laudantium eum ullam tempore, nulla sunt odit tenetur?</p>
            </div>
        </div>
    </section>
    <div class="my_container">
        <hr>
    </div>
    <section class="sponsorDoc sectionP">
        <div class="my_container">
            <div class="doctorLogo">
                <i class="fas fa-user-md"></i>
            </div>
            <h2>Professionisti in <span class="colorName">primo piano</span></h2>
            <div class="cardDoctor" v-for="doctor in docLimit">
                <div class="docAvatar">
                  <img v-if="doctor.details.image != 'https://via.placeholder.com/150'"{{-- da modificare in caso di seed --}} :src="'storage/' + doctor.details.image" :alt="'Immagine di ' + doctor.name + ' ' + doctor.surname">
                  <img v-else src="https://i.ibb.co/wQBsxBd/standard-Doctor.png" alt="Immagine del dottore">
                </div>
                <div class="docInfo">
                    <h3>@{{doctor.name}}</h3>
                    <span v-for="doc in doctor.specializations" class="my_tag">@{{doc.field}}</span>
                    <p>@{{doctor.details.address}}</p>
                    <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">Contatta questo professionista</a>
                </div>
            </div>
        </div>
    </section>


<!-- <svg width='80' height='80' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><defs><path id='a' d='M0 0h80v80H0z'/></defs><g fill='none' fill-rule='evenodd'><mask id='b' fill='#fff'><use xlink:href='#a'/></mask><use fill='#F6F8F8' xlink:href='#a'/><path fill='#E6EBEB' fill-rule='nonzero' mask='url(#b)' d='M49 65H30l3.189-23H45.81z'/><path d='M51.94 26.322l.064-.907C52.004 18.585 45.92 13 39 13s-13.004 5.586-13.004 12.415l.064.907c-1.452.485-2.328 2.002-1.986 3.499l.576 2.55c.235 1.075 1.047 1.876 2.029 2.193C27.19 41.014 32.444 47 39 47c6.577 0 11.809-5.986 12.321-12.436.982-.317 1.794-1.139 2.029-2.193l.576-2.55a2.995 2.995 0 0 0-1.986-3.5z' fill='#E6EBEB' fill-rule='nonzero' mask='url(#b)'/><path d='M40 61.468c-4.046 0-7.652-.957-10-2.468v21h20V59c-2.348 1.51-5.954 2.468-10 2.468z' fill='#8BE1D6' fill-rule='nonzero' mask='url(#b)'/><path d='M32.456 50C18.76 53.34 5 65.717 5 80h32c-.043-13.17-1.75-23.126-4.544-30zM42 80h32c0-14.71-12.8-27.088-27.417-30-2.788 6.895-4.54 16.66-4.583 30z' fill='#FFF' fill-rule='nonzero' mask='url(#b)'/><path fill='#EEF2F2' fill-rule='nonzero' mask='url(#b)' d='M46 65h13v8H46z'/><path fill='#8BE1D6' fill-rule='nonzero' mask='url(#b)' d='M50 64h5v2h-5z'/></g></svg> -->


    </div>



    <div class="my_container">
        <hr>
    </div>
    <section class="SearchLinks sectionP">
        <h2>Le Specializazioni dei nostri <span class="colorName">Dottori</span></h2>
        <div class="specializations my_container">
            @foreach ($specializations as $specialization)
            <div class="specialization_container">
                <a href="{{route('search', ['specialization' => $specialization->specialization])}}">{{$specialization['specialization']}}</a>
            </div>
            @endforeach
        </div>
    </section>
    {{-- <section class="specialization">
        <h1>Le Specializazioni dei nostri dottori</h1>
        @foreach ($sponsored_doctors as $doctor)
                <li style="font-size: 26px">{{$doctor->name}} {{$doctor->surname}}</li>
        @endforeach
    </section> --}}
</div>
<script src="https://unpkg.com/vue@next" ></script>
<script src="{{ asset('js/search.js') }}" defer></script>
@endsection
