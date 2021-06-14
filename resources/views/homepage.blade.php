<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Booldoctors</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="specializations">
                    @foreach ($specializations as $specialization)
                        <a href="#">{{$specialization['specialization']}}</a>
                    @endforeach
                </div>
            </nav>
        </header>
        <main>
            <div>
                @foreach ($sponsored_doctors as $doctor)
                    <ul style="list-style: none">
                        <li style="font-size: 26px">{{$doctor->name}} {{$doctor->surname}}</li>
                    </ul>            
                @endforeach        
            </div> 
        </main>    
    </body>
</html>