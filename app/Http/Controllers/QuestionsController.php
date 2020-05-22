<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Cate;
use App\User;
use Auth;
use Validator;

class QuestionsController extends Controller
{

    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()

    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    

    // ===ここまでリストを新規作成する処理の追加（フォームへの遷移）===

    //===ここから質問の一覧表示をするための処理追加===
    public function index()
    {
        // Questionモデルを介してデータベースからデータを取得。whereで取得したデータは配列になっている。
        $questions = Question::orderBy('created_at', 'asc')->get();// 全てのデータが取得できる
        $cates = Cate::orderBy('created_at', 'des')->get();
          foreach($questions as $question){
             $id=$question->cate_id;
            $question['cate']=Cate::findOrFail($id);
        }
        // コントローラからビューへの値の受け渡しをview関数を使って実施
        return view('index', ['questions' => $questions], ['cates' => $cates]);
    }
    
    // ===ここまでリストの一覧表示をするための処理追加===


    // 
     public function show($id){
       // dd('詳細');
       $question = Question::findOrFail($id);
       $userId=$question->user_id;
       $question['user']=User::findOrFail($userId);
       $cateId=$question->cate_id;
       $question['category']=Cate::findOrFail($cateId);
       $question['my']= Auth::user()->id;
       $answers=Answer::where('question_id', $id)->orderBy('created_at', 'asc')->get();
       $alls=User::get();
       foreach($answers as $answer){
           $answerId=$answer->user_id;
           $answer['user']=User::findOrFail($answerId);
       }
        return view('questions/show', ['question' => $question],['answers' => $answers]);

    }
    
    public function new(){
        $cates = Cate::get();
        return view('questions/create',['cates'=>$cates]);
    }
    
    public function create(Request $request){

        $validator = Validator::make($request->all() , ['question_title' => 'required', 'content' => 'required']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        $question = new Question;
        $question->title = $request->question_title;
        $question->content = $request->content;
        $question->cate_id = $request->cate_id;
        $question->user_id = Auth::user()->id;
        $question->save();
        
        
        return redirect('/');
    }
    
    public function edit($question_id){
        $question = Question::find($question_id);
        $cates = Cate::all();
        $cate = Cate::find($question->cate_id);
        return view('questions/edit', with(['question' => $question, 'cates'=>$cates, 'cateone'=>$cate]));
    }
    
    public function update(Request $request){
        $validator = Validator::make($request->all() , ['question_title' => 'required', 'content' => 'required']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        
        $question = Question::find($request->question_id);
        $question->title = $request->question_title;
        $question->content = $request->content;
        $question->cate_id = $request->cate_id;
        $question->save();
        
        return redirect('/show');
    }
  
    public function destroy($question_id)
    {
        Question::destroy($question_id);
        Answer::where('question_id',$question_id)->delete();
        return redirect('/');
    }


}
