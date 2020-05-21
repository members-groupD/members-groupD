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
        $cates = Cate::orderBy('created_at', 'asc')->get();
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
       $answers=Answer::orderBy('created_at', 'asc')->get();
       $alls=User::get();
       foreach($answers as $answer){
         
           //dd($users);
       }
       //dd($answers);
        return view('questions/show', ['question' => $question],['answers' => $answers],['alls' => $alls]);

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
        return view('questions/edit', with(['question' => $question, 'cates'=>$cates]));
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
        
        return redirect('/');
    }
  
    public function destroy($question_id)
    {
        Question::destroy($question_id);
        return redirect('/');
    }    

    //-----------------------------------------------
    //カテゴリー追加
    public function cate_create(Request $request)
    {
        $validator = Validator::make($request->all() , ['cate' => 'required|max:255', ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $cates = new Cate;
        $cates->cate = $request->cate;
        $cates->save();
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
}
