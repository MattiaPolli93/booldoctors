@extends('layouts.app')

@section('title')
    
@endsection

@section('content')
    <h1>{{$user->name}}</h1>
    <h4>{{$user->details->address}}</h4>
    <p>{{$user->details->bio}}</p>
    <div>
        <img src="{{ asset('storage/' . $user->details->image) }}" alt="Immagine" style="height: 200px">
    </div>
    <a href="{{route('admin.profile.edit', [ 'profile' => $user->id ])}}"><button type="button" class="btn btn-info"><i class="fas fa-pencil-alt"></i>Modifica dettagli</button></a>
    <a href="{{route('admin.comments')}}"><button type="button" class="btn btn-info">Mostra recensioni</button></a>
    <a href="{{route('admin.messages')}}"><button type="button" class="btn btn-info">Mostra messaggi</button></a>
    <a href="#"><button type="button" class="btn btn-info">Visualizza statistiche</button></a>
    
@endsection
