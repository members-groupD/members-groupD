@extends('layouts.app')
@section('content')


<div class="topPage">

  <div class="questionWrapper col-sm-6 ">
    <h2 class="question_title">質問一覧</h2>
     <div class="question-border">
     @foreach ($questions as $question) 
      <div class="question">
        <div class="question_header">
          <h2 class="question_header_title"><a href="{{ url('/questions/show', $question->id) }}">{{ $question->title }}</a></h2>
          <p class=category>カテゴリ（番号）{{$question->cate_id}}</p>
        </div>
        <div>
          <p><i class="glyphicon glyphicon-comment huki"></i> {{$question->answers()->count()}}</p>
        </div>
      </div>
     @endforeach
     </div>
     <p class=btn-posi>
     <a href="{{ url('questions/new')}}" class="btn btn-info q-btn">質問する</a>
     <a class="cate_hidden btn btn-info" href="{{ url('cate')}}"></a>
     </p>
  </div>
  
  <div class="col-sm-2"></div>
  
  <div class="categoryWrapper col-sm-4">
    <h2 class="category_title">カテゴリー</h2>
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
