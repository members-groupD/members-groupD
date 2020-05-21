@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト作成フォーム -->
  <form action="{{ url('cate/create')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      
      <label for="question" class="col-sm-3 control-label">カテゴリー：</label> 
      <div class="col-sm-6"> 
        <input type="text" name="cate" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="col-sm-12"></div>
    </div>
    
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-default">
        カテゴリ追加 </button> 
      </div>
    </div>
  </form>
  <a class="btn btn-danger" href="/catesdelete">削除する</a>
</div> 
@endsection