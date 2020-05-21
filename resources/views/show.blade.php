@extends('layouts.app')
@section('content')
<div class="user-info">
<p>名前:{{$user->name}}</p>
<p>メールアドレス:{{$user->email}}</p>
</div>
<div class="questions-area">
    <h2>投稿した質問</h2>
</div>
@if(empty($questions))
    <p>存在しません</p>
@else
    @foreach($questions as $question)
        <div class="title">
            <p>投稿タイトル:{{$question->title}}</p>
        </div>
        <div class="button">
        <form action="{{ url('/questions', $question->id) }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                編集
            </button> 
        </form>
        <form action= "{{ url('/questionsdelete', $question->id) }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                削除
            </button> 
        </form>
        </div>
    @endforeach
@endif


<div class="answers-area">
    <h2>投稿した回答</h2>
</div>
@if(empty($answers))
    <p>存在しません</p>
@else
    @foreach($answers as $answer)
        <div class="title">
            <p>回答内容:{{$answer->content}}</p>
        </div>
        <div class="button">
        <form action="{{ url("/answers/{$answer->question_id}/edit") }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                編集
            </button> 
        </form>
        <form action="{{ url('/answersdelete', $answer->id) }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                削除
            </button> 
        </form>
        </div>
    @endforeach
@endif
@endsection