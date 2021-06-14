<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Profilo</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">      
        <form action="{{route('user.profile.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
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
    
</body>
</html>