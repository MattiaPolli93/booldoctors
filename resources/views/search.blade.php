@extends('layouts.app')

@section('title')
    Ricerca avanzata
@endsection

@section('content')
<div class="container" id="search">
    <div>
        <select name="spec" id="spec" v-model="spec" v-on:change="filterSpec">
            @foreach ($specializations as $specialization)
                <option :value="{{$specialization->id}}">{{$specialization->specialization}}</option>
            @endforeach
        </select>
    </div>
    <ul>
        <li v-for="doctor in filterDoc" class="mt-3">
            @{{doctor.name}} @{{doctor.surname}}
            <p>@{{doctor.details.address}}</p>
        </li>
    </ul>   
</div>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="{{ asset('js/search.js') }}" defer></script>
@endsection