<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use APP\Cate;
use Auth;
use Validator;

class QuestionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // 
    public function show($id){
        dd('詳細画面');
        return view('/');;
    }
    
    public function new(){
        $cate = Cate::all();
        return view('questions/create');
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
        $question->title = $request->title;
        $question->content = $request->content;
        $question->cate_id = $request->cate_id;
        $question->user_id = Auth::user()->id;
        $question->save();
        
        return redirect('/');
    }
    
    public function edit($question_id){
        $question = Question::find($question_id);
        $cate = Cate::all();
        return view('questions/edit',with(['question' => $question, 'cate'=>$cate]));
    }
    
    public function update(Request $request){
        $validator = Validator::make($request->all() , ['question_title' => 'required', 'content' => 'required']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        
        $question = Question::find($question_id);
        $question->title = $request->title;
        $question->content = $request->content;
        $question->cate_id = $request->cate_id;
        $question->save();
        
        return redirect('/');
    }
}
