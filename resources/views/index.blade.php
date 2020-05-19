@extends('layouts.app')
@section('content')

<div class="topPage">
  <div class="questionWrapper">
     @foreach ($questions as $question) 
      <div class="question">
        <div class="question_header">
          <h2 class="question_header_title"><a href="{{ url('/question/show', $question->id) }}">{{ $question->title }}</a></h2>
        </div>
      </div>
     @endforeach
  </div>
  <a href="{{ url('questions/create')}}" class="btn btn-info">質問する</a>
</div>
@endsection
