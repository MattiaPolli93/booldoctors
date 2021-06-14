<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Document</title>
    </head>
    <body>
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
    </body>
</html>
