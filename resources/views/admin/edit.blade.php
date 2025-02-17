@extends('layouts.app')
@section('title')
    Modifica profilo
@endsection
@section('content')
    <div class="my_container edit-form">
      <form action="{{route('admin.profile.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Info personali --}}
          <div class="info-box d-flex">
              <div class="image-box">
                  @if ($doctor->details->image != null)
                  <img {{-- da modificare in caso di seed --}} src="{{ asset('storage/' . $doctor->details->image) }}" alt="Immagine di {{$doctor->name}} {{$doctor->surname}}">
                  @else
                  <img src="https://i.ibb.co/wQBsxBd/standard-Doctor.png" alt="Immagine del dottore">
                  @endif
                </div>
                <div class="text-box">
                    <h4>{{$doctor->name}} {{$doctor->surname}}</h4>
                </div>
          </div>

          <p class="link_dashboard"><a href="{{ route('show', ['id' => $doctor->id]) }}">Vai al tuo profilo pubblico</a></p>

          <div class="form-group mt-3">
            <label for="image">Immagine</label>
            <input type="file" class="form-control" id='image' name='image'>
          </div>
          <div class="form-group mt-3">
              <label for="address">Indirizzo</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" value="{{$doctor->details->address}}">
          </div>
          <div class="form-group mt-3">
              <label for="phone">Numero di telefono</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Inserisci il tuo numero di telefono" value="{{$doctor->details->phone}}">
          </div>
          <div class="form-group mt-3">
            <label for="bio">Bio</label>
            <div class="bio-text-box">
                <textarea name="bio" id="bio" cols="60" rows="10" style="resize:none" class="form-control">{{$doctor->details->bio}}</textarea>
            </div>
          </div>

          {{-- Specializzazioni --}}
          <div class="mt-4">
              <h3 class="mb-3">Specializzazioni</h3>
              @foreach ($specializations as $spec)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{$spec->id}}" id="{{$spec->specialization}}" name="field[]" {{ $doctor->specializations->contains($spec) ? 'checked' : '' }}>
                  <label class="form-check-label mb-2" for="{{$spec->specialization}}">
                    {{$spec->specialization}}
                  </label>
                </div>
              @endforeach
            </div>

          {{-- Inserisci prestazioni --}}
          <div id="edit">
            <div v-for="num in numService" class="form-group mt-4">
              <h3 class="mb-3">Aggiungi nuova prestazione</h3>
                <label for="service_name">Nome prestazione</label>
                <input type="text" class="form-control mb-3" name="service_name[]" id="service_name" placeholder="Inserisci il nome della prestazione" value="">
                <label for="service_price">Prezzo prestazione</label>
                <input type="number" class="form-control" name="service_price[]" id="service_price" min="0" max="9999.99" step="0.01" placeholder="Inserisci il prezzo della prestazione" value="">
            </div>

            <p>Vuoi aggiungere più prestazioni? <button v-on:click="addService" type="button" class="btn btn-insert mt-2 mb-3">Clicca qui</button></p>
          </div>
          {{-- <div class="form-group mt-4">
            <h3 class="mb-3">Aggiungi nuova prestazione</h3>
              <label for="service_name">Nome prestazione</label>
              <input type="text" class="form-control mb-3" name="service_name[]" id="service_name" placeholder="Inserisci il nome della prestazione" value="">
              <label for="service_price">Prezzo prestazione</label>
              <input type="number" class="form-control" name="service_price[]" id="service_price" min="0" max="9999.99" step="0.01" placeholder="Inserisci il prezzo della prestazione" value="">
          </div> --}}

          <button type="submit" class="btn btn-insert mt-3 mb-3">Salva modifiche</button>
        </form>

        {{-- Cancella prestazioni --}}
        @if (count($services) > 0)
        <h3 class="mt-4">Cancella prestazione</h3>
            <ul class="d-flex delete-services mt-1 mb-4">
                @foreach ($services as $service)
                    <li class='mt-3 mr-5 d-flex'>
                        <p>{{$service['service']}}: <strong>{{$service['price']}}</strong> €</p>
                          <form action="{{route('admin.service.destroy', $service)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger mt-3 mb-2">Cancella</button>
                          </form>
                    </li>
                 @endforeach
            </ul>
          @endif
          <p class="link_dashboard"><a href="{{ route('admin.profile.index') }}">Torna alla Dashboard</a></p>
    </div>
    <script src="{{ asset('js/edit.js') }}" defer></script>
@endsection
