@extends('layouts.app')
@section('content')
<div class="bodybox">
    <!--質問部分-->
    <div class="questionbox">
        <div class="question">
            <ul>
                <li>{{ $question->title }}</li>
                @switch($question->cate_id)
                @case(1)
                <li class="phptag tags">PHP</li>
                @break
                @case(2)
                <li class="laraveltag tags">laravel</li>
                @break
                @default
               <li class="csstag tags">css</li>
                @endswitch
            </ul>
            <p>{{ $question->content }}</p>
        </div>
        <div class="questioner">
            <p>質問者</p>
            <p>{{$question['user']->name}}</p>
            <p>{{$question->updated_at}}</p>
        </div>
    </div>
    <!--回答部分-->
    <div class="answers">
        <p>みんなの回答</p>
        @for($i=0;$i<count($answers);$i++)
        @if($question->id===$answers[$i]['question_id'])
        <div class="answerbox">
            <p>{{$answers[$i]->title}}</p>
         
        </div>
        @endif
        @endfor 
    </div>
    <div>
        <p class="blueBtn"><a href="/questions/{{$question->id}}/answer">回答します</a></p>
    </div>
</div>
@endsection