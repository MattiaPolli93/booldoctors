@extends('layouts.app')

@section('title')
    Ricerca avanzata
@endsection

@section('content')
<div class="container" id="search">    
    <ul>
        <li v-for="doctor in doctors">
            @{{doctor.name}} @{{doctor.surname}}
        </li>
    </ul>   
</div>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="{{ asset('js/search.js') }}" defer></script>
@endsection