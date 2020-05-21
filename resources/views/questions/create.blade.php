@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <div class="section">質問投稿</div>
  <form action="{{ url('questions/create')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
    
      <label for="question" class="control-label q-label">タイトル</label> 
      <div class="col-sm-12"></div>
      <div class="input-box"> 
        <input type="text" name="question_title" class="form-control" value="{{ old('question_title') }}">
      </div>
      
      
      <label for="question" class="control-label q-label">カテゴリ</label> 
      <div class="col-sm-12"></div> 
      <div class="input-box"> 
        <select name="cate_id" class="form-control custom-select">
            @foreach ($cates as $cate)
             <option value = "{{$cate->id}}">{{$cate->cate}}</option> 
            @endforeach
        </select>
      </div>
      
      
      <label for="question" class="control-label q-label">質問内容</label>
      <div class="col-sm-12"></div>
      <div class="input-box"> 
        <textarea name="content" class="form-control" rows=15>{{ old('question_title') }}</textarea>
      </div>
    </div>
    
    <div class="form-group text-center"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="q-button">
        質問する</button> 
      </div>
      
      <div class="col-sm-offset-3 col-sm-6">
        <a class="back-button" href="/">　戻る　</a>
      </div>
      
    </div>
    
  </form>
</div> 
@endsection