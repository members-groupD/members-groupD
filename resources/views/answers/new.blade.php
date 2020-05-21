@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  <form action="{{url('/answer/new',$question->id)}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="listing" class="col-sm-3">質問<label/> <br>
        <!--<h1>---------------------------------------------------------------------------------------------------------<h1>
        -->
        <div class="col-sm-6"> 
         <li>{{$question->title}}</li><br>
         {{$question->content}}<br>
         <!--{{$question->cate_id}}<br>-->
         {{$question['user']->name}}
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-6"> 
         <!--<h1>回答内容</h1>-->
         
           <textarea name="content" cols="50" rows="5" class="form-control"></textarea>
          <button type="submit" class="button">
            <!--<i class="glyphicon">回答</i> -->
            回答を送信
          </button> <br>
          <button type="button" onclick="history.back()" class ="return">戻る</button>
        </div>
       <!-- <p class="blueBtn">回答します</p>
      -->
      </div>
    </form>
</div>
@endsection