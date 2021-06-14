<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booldoctors</title>
</head>
<body>
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