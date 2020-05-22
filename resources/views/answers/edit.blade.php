@extends('layouts.app')
@section('content')
<div class="panel-body" id="answer_edit">
  <!-- バリデーションエラーの場合に表示 --> 
  <form action="{{ url('/answers/update')}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="listing" class="col-sm-3 control-label"></label> 
        <div class="col-sm-6"> 
         <li class="answer_title">
         タイトル：{{$question->title}}<br>
         </li>
         <br>
         内容：{{$question->content}}<br>
         質問者：{{$questions['user']->name}}
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-6"> 
         <h1>回答内容</h1>

         <textarea name= "content" class="form-control">{{$answer->content}}</textarea>
        <input type="hidden" name="answer_id" value="{{ old('answer_id', $answer->id) }}">


         </form>
          <p class="answer_button"><button type="submit" class="button q-button">更新する
          </button></p>
             
          <p class="answer_button"><button type="button" onclick="history.back()" class="return back-button">戻る</button></p>

        </div>
      </div>
    </form>
</div>
@endsection