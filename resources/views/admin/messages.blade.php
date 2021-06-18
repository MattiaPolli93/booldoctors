@extends('layouts.app')

@section('title')
    Messaggi
@endsection

@section('content')
    <div class="my_container">
        <div class="messages">
            <h1><em>I tuoi messaggi</em></h1>
            @foreach ($messages as $message)
            <h5>Inviato da: {{$message->email}}</h5>
            <p>{{$message->message}}</p>   
            <small>Data e orario dell'invio: {{$message->added_on}}</small>
            @endforeach
            <p><a href="{{ route('admin.profile.index') }}">Torna alla Dashboard</a></p>
        </div>
    </div>
@endsection

