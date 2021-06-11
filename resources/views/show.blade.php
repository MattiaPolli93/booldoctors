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
        <div>
            <h2>Recensioni</h2>
            @foreach ($doctor->comments as $comment)
                <p>{{$comment['comment']}}</p>
            @endforeach
        </div> 

        <h2>Manda un messaggio al medico</h2>
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

        <h2>Inserisci una recensione</h2>
        <form action="{{route('doctor.store-comment', ['id' => $doctor->id])}}" method="post">
			@csrf
			@method('POST')
			<div class="form-group">
				<label for="username">Username</label>
				<input type="username" class="form-control" id="username" name="username" placeholder="Inserisci il tuo username">
			</div>
			<div class="form-group">
				<label for="comment">Recensione</label>
				<textarea class="form-control"  name="comment" id="comment" cols="30" rows="4" placeholder="Inserisci la tua recensione"></textarea>
			</div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_1">1</label>
                <input class="form-check-input" type="radio" name="rate" id="rate_1" value="1">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_2">2</label>
                <input class="form-check-input" type="radio" name="rate" id="rate_2" value="2">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_3">3</label>
                <input class="form-check-input" type="radio" name="rate" id="rate_3" value="3">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_4">4</label>
                <input class="form-check-input" type="radio" name="rate" id="rate_4" value="4">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="rate_5">5</label>
                <input class="form-check-input" type="radio" name="rate" id="rate_5" value="5">
            </div>

			<div class="mt-3">
				<button type="submit" class="btn btn-primary">Inserisci</button>
			</div>
		</form>
    </body>
</html>