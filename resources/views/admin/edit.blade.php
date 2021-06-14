@extends('layouts.app')

@section('title')
    Modifica
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.profile.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
		    @method('PUT')
            <div class="form-group">
              <label for="image">Immagine</label>
              <input type="file">
            </div>
            <div class="form-group mt-5">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" value="{{$doctor->details->address}}">
            </div>
            <div class="form-group mt-5">
                <label for="phone">Numero di telefono</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Inserisci il tuo numero di telefono" value="{{$doctor->details->phone}}">
            </div>
            <div class="form-group mt-5">
              <label for="bio">Bio</label>
              <textarea name="bio" id="bio" cols="30" rows="10">{{$doctor->details->bio}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
    </div>
@endsection