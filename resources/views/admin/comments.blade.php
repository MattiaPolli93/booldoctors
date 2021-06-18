@extends('layouts.app')

@section('title')
    BoolDoctors - Commenti
@endsection

@section('content')
    <div class="container">
        <h1>I tuoi commenti</h1>
        @foreach ($comments as $comment)
        <h6>Valutazione: {{$comment->rate}}</h6>
        @if ($comment->comment != NULL)
        <p>{{$comment->comment}}</p>
        @else
        <p><em>Nessun commento</em></p>
        @endif
        <p>Inviato da: {{$comment->username}}</p>
        <small>Data e orario del commento: {{$comment->added_on}}</small>
        @endforeach
        <p> <a href="{{ route('admin.profile.index') }}">Back to Homepage?</a> </p>
    </div>
@endsection
