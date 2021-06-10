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
        <p>{{$doctor->details->address}}</p>
    </div>
    
</body>
</html>