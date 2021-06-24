@extends('layouts.app')

@section('title')
    BoolDoctors - Ricerca avanzata
@endsection

@section('content')
<div class="container" id="search">
    <div class="fiter_bar">
        <select name="rate" id="rate" v-model="selectRate" v-on:change="prova">
            <option selected disabled value="">Filtra per voto</option>
            <option value="0" >0</option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
        </select>
        
        <form name="myform" oninput="range1value.value = range1.valueAsNumber">
            <label for="range1">Filtra per numero di recensioni</label>
            <input type="range" id="range" name="range1" min="0" :max="maxRange" step="1" value="numberOfRates" list="tickmarks" v-model="numberOfRates">
            <output name="range1value" for="range1" >0</output>
        </form>
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


      <div class="loading" v-if="loading">
          <div class="loader">
            <!-- here put a spinner or whatever you want to indicate that a request is in progress -->
          </div>
      </div>
    <div class="doctor_container">
        <h2 v-if="noFindTxt">Nessun dottore corrisponde a questa ricerca</h2>
        <div v-for="doctor in filterDoc" class="cardDoctor" v-show="doctor.RateInfo.averageRate >= selectRate && doctor.RateInfo.RateCout > numberOfRates">
            <div class="docAvatar">
                <div class="image_box">
                    <img v-if="doctor.details.image != null"{{-- da modificare in caso di seed --}} :src="'storage/' + doctor.details.image" :alt="'Immagine di ' + doctor.name + ' ' + doctor.surname">
                    <img v-else src="https://i.ibb.co/wQBsxBd/standard-Doctor.png" alt="Immagine del dottore">
                </div>
            </div>
            <div class="docInfo">
                <h3>@{{doctor.name}} @{{doctor.surname}}</h3>
                <span v-for="doc in doctor.specializations" class="my_tag">@{{doc.field}}</span>
                <p>Indirizzo: @{{doctor.details.address}}</p>
                <a :href="'http://127.0.0.1:8000/doctor/' + doctor.id">Contatta questo professionista</a>
            </div>
        </div>  
    </div>
</div>
<script src="https://unpkg.com/vue@next"></script>
<script src="{{ asset('js/search.js') }}" defer></script>
@endsection
