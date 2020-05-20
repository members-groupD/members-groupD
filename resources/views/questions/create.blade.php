@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト作成フォーム -->
  <form action="{{ url('questions/create')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
    
      <label for="question" class="col-sm-3 control-label">タイトル：</label> 
      <div class="col-sm-6"> 
        <input type="text" name="question_title" class="form-control" value="{{ old('question_title') }}">
      </div>
      <div class="col-sm-12"></div>
      
      <label for="question" class="col-sm-3 control-label">質問内容：</label> 
      <div class="col-sm-6"> 
        <input type="text" name="content" class="form-control" value="{{ old('content') }}">
      </div>
      <div class="col-sm-12"></div>
      
      <label for="question" class="col-sm-3 control-label">カテゴリ：</label> 
      <div class="col-sm-6"> 
        <select name="cate_id" class="form-control custom-select">
            <!--@foreach ($cates as $cate)-->
            <!-- <option value = "{{$cate->id}}">{{$cate->title}}</option>   -->
            <!--@endforeach-->
            <option value = "1">C</option>
            <option value = "2">C++</option>
        </select>
      </div>
      
    </div>
    
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-default">
        質問する！ </button> 
      </div>
    </div>
  </form>
</div> 
@endsection