@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  <form action="{{ route('answer.create', ['question_id'=>$question_id])}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="listing" class="col-sm-3 control-label">質問</label> 
        <div class="col-sm-6"> 
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-6"> 
       <body>
         <h1>回答内容</h1>
         <form action = “index.php” method = “get”>
       <!--   <input type = “text” name =“comment/“><br/>-->
         <input type = “submit” value =こちらに回答してください>
         </form>
         </body>
          <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-saved"></i> 回答
          </button> 
          <button type="button" onclick="history.back()">戻る</button>
        </div>
      </div>
    </form>
</div>
@endsection