@extends('layouts.app')
@section('content')
<p>詳細画vv面</p>
<div class="topPage">
  <div class="listWrapper">
    <div class="question">
        <div class="question_header">
            <h2 class="question_header_title font-weight-bold">{{ $question->title }}</h2>
            <h3>{{ $question->content }}</h3>
            <p>
            @switch($question->cate_id)
            @case(1)
            PHP
            @break
            @case(2)
            HTML
            @break
            
            @default
            CSS
            @endswitch
            </p>
        </div>
        <div class="questioner">
            <p>質問者</p>
            <p>{{$question['user']->name}}</p>
        </div>
    </di>
    <div class="answerlist">
     @for($i=0;$i<count($answers);$i++)
     @if($question->id===$answers[$i]['answer_id'])
      <div class="answerbox">
          <p>{{$answers[$i]->title}}</p>
          @for($m=0;$m<count($users);$m++)
           @if($answers[$i]['user_id']===$users[$m]['id'])
           <p>{{$users[$m]->name}}</p>
           @endif
          @endfor
      </div>
      @endif
     @endfor
    </div>
    <div>
        <p><a href="/questions/{{$question->id}}/answer">回答します</a></p>
    </div>
  </div>
</div>
@endsection