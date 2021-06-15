@extends('layouts.app')

@section('title')
    Messaggi
@endsection

@section('content')
    <div class="container">
        <h1>I tuoi messaggi</h1>
        @foreach ($messages as $message)
        <h5>Inviato da: {{$message->email}}</h5>
        <p>{{$message->message}}</p>   
        <small>Data e orario dell'invio: {{$message->added_on}}</small>
        @endforeach
        <p> <a href="{{ route('admin.profile.index') }}">Back to Homepage?</a> </p>
    </div>
@endsection

