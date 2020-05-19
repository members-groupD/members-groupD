@extends('layouts.app')
@section('content')
<p>詳細画面</p>
<div class="topPage">
  <div class="listWrapper">

     @foreach ($questions as $question) 

      <div class="question">
        <div class="question_header">
          <h2 class="question_header_title font-weight-bold">{{ $question->title }}</h2>
          <h3>{{ $question->content }}</h3>
        </div>
        <div class="answerlist">
         @for($i=0;$i<count($answers);$i++)
         @if($question->id===$answers[$i]['answer_id'])
          <div class="cardbox">
              <p>{{$answers[$i]->title}}</p>
              <p><a href=""></i></a></p>
          </div>
          @endif
         @endfor
        </div>
     @endforeach
  </div>
</div>
@endsection