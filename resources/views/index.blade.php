@extends('layouts.app')
@section('content')


<div class="topPage">
  <div class="questionWrapper col-sm-6 ">
    <h2 class="question_title text-primary">質問一覧</h2>
     @foreach ($questions as $question) 
      <div class="question">
        <div class="question_header">
          <h2 class="question_header_title"><a href="{{ url('/questions/show', $question->id) }}">{{ $question->title }}</a></h2>
          <!--<h3 class="question_header_title"><a href="{{ url('/question/show', $question->id) }}" class="text-dark">{{ $question->title }}</a></h3>-->
          <p class=category>カテゴリ（番号）{{$question->cate_id}}</p>
        </div>
        <div>
          <p>回答数{{$question->answers()->count()}}</p>
        </div>
      </div>
     @endforeach
     <a href="{{ url('questions/new')}}" class="btn btn-info">質問する</a>
     <a class="cate_hidden btn btn-info" href="{{ url('cate')}}"></a>
  </div>
  
  <div class="col-sm-2"></div>
  
  <div class="categoryWrapper col-sm-4">
    <h2 class="category_title text-primary">カテゴリー</h2>
    @foreach ($cates as $cate) 
      <div class="cate">
        <div class="cate_title">
          <a href="{{url('/')}}">{{ $cate->cate}}</a>
        </div>
      </div>
    @endforeach
  </div>
  
</div>
@endsection
