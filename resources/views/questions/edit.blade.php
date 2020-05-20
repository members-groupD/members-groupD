@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- 質問編集フォーム -->
  <form action="{{ url('questions/edit')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
    
      <label for="question" class="col-sm-3 control-label">タイトル：</label> 
      <div class="col-sm-6"> 
        <input type="text" name="question_title" class="form-control" value="{{$question->title}}">
      </div>
      <div class="col-sm-12"></div>
      
      <label for="question" class="col-sm-3 control-label">カテゴリ：</label> 
      <div class="col-sm-6"> 
        <select name="cate_id" class="form-control custom-select">
            <!--@foreach ($cates as $cate)-->
            <!--    <option value = "{{$cate->id}}">{{$cate->title}}</option>-->
            <!--@endforeach-->
            <option value = "1">PHP</option>
            <option value = "2">HTML</option>
        </select>
      </div>
      <div class="col-sm-12"></div>
      
      <label for="question" class="col-sm-3 control-label">質問内容：</label> 
      <div class="col-sm-6"> 
        <!--<input type="text" name="content" class="form-control" value="{{$question->content}}">-->
        <textarea name="content" class="form-control" rows=15>{{$question->content}}</textarea>
      </div>
      
    </div>
    
    <input type="hidden" name="question_id" value="{{ old('question_id', $question->id) }}">
    
    <div class="form-group text-center"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-primary">
        編集する </button> 
      </div>
      <div class="col-sm-offset-3 col-sm-6">
        <a class="back btn btn-default" href="/">　戻る　</a>
      </div>
    </div>
    
  </form>
</div> 
@endsection