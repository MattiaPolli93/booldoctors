@extends('layouts.app')
@section('content')    
    <specs>
        <div class="specializations">
            @foreach ($specializations as $specialization)
                <a href="#">{{$specialization['specialization']}}</a>
            @endforeach
        </div>
    </specs>

    <div>
        @foreach ($sponsored_doctors as $doctor)
            <ul style="list-style: none">
                <li style="font-size: 26px">{{$doctor->name}} {{$doctor->surname}}</li>
            </ul>            
        @endforeach        
    </div> 
@endsection