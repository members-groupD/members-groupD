<p>名前:{{$user->name}}</p>
<p>メール:{{$user->email}}</p>

@foreach($questions as $qestion)
    <p>投稿した質問:{{$qestion->title}}</p>
    <a href="{{}}">編集</a>
    <a href="{{}}">削除</a>
@endforeach


@foreach($answers as $answer)
    <p>投稿した回答:</p>
    <a href="{{}}">編集</a>
    <a href="{{}}">削除</a>
@endforeach