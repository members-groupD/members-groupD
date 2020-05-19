@extends('layouts.app')

<p>名前:{{$user->name}}</p>
<p>メール:{{$user->email}}</p>

@foreach($questions as $qestion)
    <p>投稿した質問:{{$qestion->title}}</p>
    <form action="" method="POST">
    {{csrf_field()}}
        <button type="submit" class="btn btn-default">
            編集
        </button> 
    </form>
    <form action="" method="POST">
    {{csrf_field()}}
        <button type="submit" class="btn btn-default">
            削除
        </button> 
    </form>
@endforeach

@foreach($answers as $answer)
    <p>投稿した回答:{{$answer->content}}</p>
    <form action="" method="POST">
    {{csrf_field()}}
        <button type="submit" class="btn btn-default">
            編集
        </button> 
    </form>
    <form action="" method="POST">
    {{csrf_field()}}
        <button type="submit" class="btn btn-default">
            削除
        </button> 
    </form>
@endforeach