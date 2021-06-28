@extends('layouts.app')

@section('title')
    BoolDoctors - Commenti
@endsection

@section('content')
    <div class="container">
      <h1 id="title">Le tue recensioni</h1>
      @if (count($comments) == 0)
          <h2 id="empty_page">Nessuna recensione ricevuta</h2>
      @endif
      <div class="comments">
        @foreach ($comments as $comment)
        <div class="comment">
          <h5>Valutazione: {{$comment->rate}}/5</h5>
          @if ($comment->comment != NULL)
          <p class="comment_text">{{$comment->comment}}</p>
          @else
          <p class="comment_text"><em>Nessun commento inserito</em></p>
          @endif
          <p><small>Inviato da: {{$comment->username}}</small></p>
          <p><small>Data e orario del commento: {{$comment->added_on}}</small></p>
        </div>
        @endforeach
      </div>
      <p class="link_dashboard"> <a href="{{ route('admin.profile.index') }}">Torna alla Dashboard</a> </p>
  </div>
@endsection
