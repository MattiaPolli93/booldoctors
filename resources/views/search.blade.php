@extends('layouts.app')

@section('title')
    BoolDoctors - Ricerca avanzata
@endsection

@section('content')
<div class="container" id="search">
    <div>
        {{-- <select name="spec" id="spec" v-model="spec" v-on:change="filterSpec">
            <option value="" disabled selected>Filtra per specializzazione</option>
            @foreach ($specializations as $specialization)
                <option :value="{{$specialization->id}}">{{$specialization->specialization}}</option>
            @endforeach
        </select> --}}
        <input type="text" v-model="spec" v-on:keyup="filterText">
    </div>
    <div v-for="doctor in filterDoc" class="cardDoctor">
        <div class="docAvatar">
            <div class="image_box">
                <img v-if="doctor.details.image != 'https://via.placeholder.com/150'"{{-- da modificare in caso di seed --}} :src="'storage/' + doctor.details.image" :alt="'Immagine di ' + doctor.name + ' ' + doctor.surname">
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
<script src="https://unpkg.com/vue@next"></script>
<script src="{{ asset('js/search.js') }}" defer></script>
@endsection
