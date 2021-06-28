@extends('layouts.app')

@section('title')
    BoolDoctors - Ricerca avanzata
@endsection

@section('content')
<div class="my_container nav_container">
    <nav class="bradCrumps">
        <ul>
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <span><i class="fas fa-angle-double-right"></i></span>
            <li><a href="#" class="active">Search</a></li>
        </ul>
    </nav>
    <hr>
</div>
<div class="my_container" id="search">
    <div class="filter-options d-flex">
        <div class="filter_bar">
            <form name="myform" class="mb-3" oninput="range1value.value = range1.valueAsNumber">
                <label for="range1"><span class="filter-text">Filtra per numero di recensioni: </label></span> <br>
                <input type="range" id="range" name="range1" min="0" :max="maxRange" step="1" value="numberOfRates" list="tickmarks" v-model="numberOfRates">
                <output name="range1value" for="range1">0</output>
            </form>

            <div class="select-box">
                <select name="rate" id="rate" v-model="selectRate" v-on:change="prova">
                    <option selected disabled value="">Filtra per voto</option>
                    <option value="0" >0</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                </select>
            </div>
        </div>
        <div class="search_input">
            {{-- <select name="spec" id="spec" v-model="spec" v-on:change="filterSpec">
                <option value="" disabled selected>Filtra per specializzazione</option>
                @foreach ($specializations as $specialization)
                    <option :value="{{$specialization->name}}">{{$specialization->specialization}}</option>
                @endforeach
            </select> --}}
            <input type="text" placeholder="Cerca una specializzazione" v-model="spec" @keyup="filterText">
            <i class="fas fa-search"></i>
        </div>
    </div>

      <div class="loading" v-if="loading">
          <div class="loader">
            <!-- here put a spinner or whatever you want to indicate that a request is in progress -->
          </div>
      </div>
    <div class="doctor_container">
        <h2 v-if="noFindTxt">Nessun dottore corrisponde a questa ricerca</h2>
        <div v-for="doctor in filterSponsoredDocs" class="cardDoctor" v-show="doctor.RateInfo.averageRate >= selectRate && doctor.RateInfo.RateCout >= numberOfRates">
            <div class="docAvatar d-flex">
                <div class="image_box">
                    <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">
                    <img v-if="doctor.details.image != null"{{-- da modificare in caso di seed --}} :src="'storage/' + doctor.details.image" :alt="'Immagine di ' + doctor.name + ' ' + doctor.surname">
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
                <div class="sponsor">
                    <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 128 160" enable-background="new 0 0 128 128" xml:space="preserve" ><g><polygon fill="#fabb0c" points="46,87.7 41.4,76.9 39.3,76.9 28.9,121.9 41.9,115.9 51,127 60.2,87.3 56.2,83.3  "/><polygon fill="#fabb0c" points="87.4,76.9 83.3,87.1 72.3,82.8 67.8,87.3 77,127 86.1,115.9 99.1,121.9 88.7,76.9  "/><path fill="#fabb0c" d="M105.4,42.4l-7.1-7.1L102,26l-8.7-3.5v-9.4h-10l-4-9.2l-8.6,3.7L64,1l-7.1,7.1l-9.3-3.7l-3.5,8.7h-9.4v10   l-9.2,4l3.7,8.6l-6.6,6.6l7.1,7.1L26,58.9l8.7,3.5v9.4h10l4,9.2l8.6-3.7l6.6,6.6l7.1-7.1l9.3,3.7l3.5-8.7h9.4v-10l9.2-4l-3.7-8.6   L105.4,42.4z M64,64.7c-12.3,0-22.3-10-22.3-22.3c0-12.3,10-22.3,22.3-22.3c12.3,0,22.3,10,22.3,22.3C86.3,54.7,76.3,64.7,64,64.7z"/></g></svg>
                </div>
                <p>Indirizzo: @{{doctor.details.address}}</p>
                <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">Contatta questo professionista</a>
            </div>
        </div>
        <hr>
        <div v-for="doctor in filterDoc" class="cardDoctor" v-show="doctor.RateInfo.averageRate >= selectRate && doctor.RateInfo.RateCout >= numberOfRates">
            <div class="docAvatar d-flex">
                <div class="image_box">
                    <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">
                    <img v-if="doctor.details.image != null"{{-- da modificare in caso di seed --}} :src="'storage/' + doctor.details.image" :alt="'Immagine di ' + doctor.name + ' ' + doctor.surname">
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
                <p>Indirizzo: @{{doctor.details.address}}</p>
                <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">Contatta questo professionista</a>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
<script>dayjs().format()</script>
<script src="https://unpkg.com/vue@next"></script>
<script src="{{ asset('js/search.js') }}" defer></script>
@endsection
