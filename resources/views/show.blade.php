@extends('layouts.app')
@section('content')

<p>名前:{{$user->name}}</p>
<p>メールアドレス:{{$user->email}}</p>

<p>投稿した質問</p>

@if(empty($questions))
    <p>存在しません</p>
@else
    @foreach($questions as $question)
        <p>投稿タイトル:{{$question->title}}</p>
        <form action="{{ url("/questions/{$question->id}") }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                編集
            </button> 
        </form>
        <form action= "{{ url("/questionsdelete/{$question->id}") }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                削除
            </button> 
        </form>
    @endforeach
@endif

<p>投稿した回答</p>

@if(empty($answers))
    <p>存在しません</p>
@else
    @foreach($answers as $answer)
        <p>回答内容:{{$answer->content}}</p>
        <form action="{{ url("/answers/{$answer->question_id}/edit/{$answer->id}") }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                編集
            </button> 
        </form>
        <form action="{{ url("/questionsdelete/{$answer->id}") }}" method="GET">
        {{csrf_field()}}
            <button type="submit" class="btn btn-default">
                削除
            </button> 
        </form>
    @endforeach
@endif
@endsection
