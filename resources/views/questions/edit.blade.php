@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <div class="section">質問編集</div>
  <form action="{{ url('questions/edit')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
    
      <label for="question" class="control-label q-label">タイトル</label> 
      <div class="col-sm-12"></div>
      <div class="input-box">
        <input type="text" name="question_title" class="form-control" value="{{$question->title}}">
      </div>
      
      <label for="question" class="control-label q-label">カテゴリ</label> 
      <div class="col-sm-12"> </div>
      <div class="input-box">
        <select name="cate_id" class="form-control custom-select">
            @foreach ($cates as $cate)
                <option 
                <?php
                if($cateone->id == $cate->id) {echo("selected");}
                ?> value = "{{$cate->id}}">{{$cate->cate}}</option>
            @endforeach
        </select>
      </div>
      
      <label for="question" class="control-label q-label">質問内容</label> 
      <div class="col-sm-12"></div>
      <div class="input-box">
        <textarea name="content" class="form-control" rows=15>{{$question->content}}</textarea>
      </div>
    </div>
    
    <input type="hidden" name="question_id" value="{{ old('question_id', $question->id) }}">
    
    <div class="form-group text-center"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="q-button">
        編集する </button> 
      </div>
      <div class="col-sm-offset-3 col-sm-6">
        <a class="back-button" href="/show">　戻る　</a>
      </div>
    </div>
    
  </form>
</div> 
@endsection