@extends('layouts.app')

@section('title')
    Messaggi
@endsection

@section('content')
    <div class="container">
        <h1>I tuoi commenti</h1>
        @foreach ($comments as $comment)
        <p>{{$comment->comment}}</p>    
        @endforeach
        <p> <a href="{{ route('admin.profile.index') }}">Back to Homepage?</a> </p>
    </div>
@endsection