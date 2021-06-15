@extends('layouts.app')

@section('title')
    Messaggi
@endsection

@section('content')
    <div class="container">
        <h1>I tuoi messaggi</h1>
        @foreach ($messages as $message)
        <p>{{$message->message}}</p>    
        @endforeach
        <p> <a href="{{ route('admin.profile.index') }}">Back to Homepage?</a> </p>
    </div>
@endsection

