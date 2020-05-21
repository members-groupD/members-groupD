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
        <div class="answerlist">
            @foreach($answers as $answer)
            @if($answer['user']->id!==$question['my'])
            <ul class="left">
                <li>{{$answer['user']->name}}</li>
                <li>{{$answer->content}}</li>
            </ul>
            @else
            <ul class="right">
                <li>私</li>
                <li>{{$answer->content}}</li>
            </ul>
            @endif
            @endforeach
        </div>
    </div>
    <div class="btnBar">
        <p class="blueBtn"><a href="/questions/{{$question->id}}/answer">回答します</a></p>
    </div>
</div>
@endsection