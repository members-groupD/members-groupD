@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  <form action="{{url('/answer/new',$question->id)}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="listing" class="col-sm-3 control-label">質問</label> 
        <div class="col-sm-6"> 
         {{$question->title}}<br>
         {{$question->content}}<br>
         {{$question->cate_id}}<br>
         {{$question['user']->name}}
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-6"> 
         <h1>回答内容</h1>
           <textarea name="content" cols="50" rows="5" class="form-control"></textarea>
          <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-saved"></i> 回答
          </button> 
          <button type="button" onclick="history.back()">戻る</button>
        </div>
      </div>
    </form>
</div>
@endsection