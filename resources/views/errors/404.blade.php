@extends('layouts.app')

@section('title')
Error - 404
@endsection

@section('content')
<div class="my_container" id="error">
    <div class="row">
        <div class="col-sm-12">
           <div class="image_box text-center">
               <img src="{{asset('https://twominuteparenting.com/wp-content/uploads/2014/09/Confused-Doctor.jpg')}}" alt="Error 404">
               {{-- <img style="width: 70%" src="{{asset('https://freefrontend.com/assets/img/html-css-404-page-templates/HTML-404-Page-with-SVG.png')}}" alt="Error 404"> --}}
            </div>
        </div> 
        <div class="col-sm-12 d-flex justify-content-center align-items-center">
            <div class="error-text text-center">
                <h2>Mmm... pagina non trovata!</h2>
                <p class="mt-3 mb-4"><a href="{{url('/')}}">Torna alla Homepage</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
