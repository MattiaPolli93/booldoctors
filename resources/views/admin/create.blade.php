@extends('layouts.app')

@section('title')
    Registrati
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="file">
            </div>
            <div class="form-group mt-5">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo">
            </div>
            <div class="form-group mt-5">
                <label for="phone">Numero di telefono</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Inserisci il tuo indirizzo">
            </div>
            <div class="form-group mt-5">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
    </div>
@endsection