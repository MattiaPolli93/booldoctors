<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Show Doctor</title>
    </head>
    <body>
        <div class="doctor">
            <h1>{{$doctor->name}} {{$doctor->surname}}</h1>
            <img src="{{$doctor->details->image}}" alt="{{$doctor->name}} {{$doctor->surname}}">    
            <h3>Indirizzo</h3>
            <p>{{$doctor->details->address}}</p>
            <h3>Telefono</h3>
            <p>{{$doctor->details->phone}}</p> 
            <h3>Bio</h3>
            <p>{{$doctor->details->bio}}</p>       
        </div>
        <div class="services">
            <h2>Servizi</h2>
            @foreach ($doctor->services as $service)
                <p>{{$service['service']}} {{$service['price']}} €</p>
            @endforeach
        </div> 
        <div class="specializations">
            <h2>Specializazioni</h2>
            @foreach ($doctor->specializations as $specialization)
                <p>{{$specialization['specialization']}}</p>
            @endforeach
        </div> 

        <form action="{{route('doctor.store-message', ['id' => $doctor->id])}}" method="post">
			@csrf
			@method('POST')
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Inserisci la tua mail">
			</div>
			<div class="form-group">
				<label for="message">Messaggio</label>
				<textarea class="form-control"  name="message" id="message" cols="30" rows="4" placeholder="Inserisci il tuo messaggio"></textarea>
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary">Inserisci</button>
			</div>
		</form>
    </body>
</html>