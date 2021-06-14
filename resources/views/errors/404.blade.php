@extends('layouts.app')

@section('title')
Error - 404
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <img style="width: 70%" src="{{asset('https://freefrontend.com/assets/img/html-css-404-page-templates/HTML-404-Page-with-SVG.png')}}" alt="Error 404">
        </div>
        <div class="col-sm-12 d-flex justify-content-center align-items-center">
            <div class="error-text text-center">
                <h2>Mmm... page was not found!</h2>
                <p> <a href="{{ url('/') }}">Back to Homepage?</a> </p>
            </div>
        </div>
    </div>
</div>
@endsection