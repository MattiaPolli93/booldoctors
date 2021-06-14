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
@extends('layouts.app')
@section('title')
    Modifica profilo
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

          <h3>Modifica prestazione</h3>
          {{-- @foreach ($details as $detail)
          <div class="form-group mt-5">
              <label for="detail_name">Nome prestazione</label>
              <input type="text" class="form-control" name="detail_name" id="detail_name" placeholder="Inserisci il nome della prestazione" value="">
              <label for="detail_price">Prezzo prestazione</label>
              <input type="text" class="form-control" name="detail_price" id="detail_price" placeholder="Inserisci il prezzo della prestazione" value="">
          </div>
          @endforeach --}}
          
          <div class="form-group mt-5">
            <h3>Aggiungi nuova prestazione</h3>
              <label for="service_name">Nome prestazione</label>
              <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Inserisci il nome della prestazione" value="">
              <label for="service_price">Prezzo prestazione</label>
              <input type="number" class="form-control" name="service_price" id="service_price" min="0" max="9999.99" step="0.01" placeholder="Inserisci il prezzo della prestazione" value="">
          </div>

          <div class="mt-3">
              <h3>Specializzazioni</h3>
              @foreach ($specializations as $spec)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{$spec->id}}" id="{{$spec->specialization}}" name="field[]" {{ $doctor->specializations->contains($spec) ? 'checked' : '' }}>
                  <label class="form-check-label" for="{{$spec->specialization}}">
                    {{$spec->specialization}}
                  </label>
                </div>
              @endforeach
            </div>

          <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
        <p> <a href="{{ route('admin.profile.index') }}">Back to Homepage?</a> </p>
    </div>
@endsection
