@extends('layouts.app')

@section('title')
    
@endsection

@section('content')
    <h1>{{$user->name}}</h1>
    <h4>{{$user->details->address}}</h4>
    <p>{{$user->details->bio}}</p>
@endsection
