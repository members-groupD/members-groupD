<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Answer;
use App\Cate;
use Auth;
use Validator;
use App\User;

class AnswersController extends Controller
{
  // public function new($question_id){

  //   dd("回答");
  //     return view('answers/new',['question_id'=>$question_id]);
  // }
  
  public function __construct()

  {
      // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
      $this->middleware('auth');
  }
  public function new($question_id){
    $question = Question::find($question_id);
    $userId=$question->user_id;
    $question['user']=User::findOrFail($userId);
      // return view('answers/new',['question'=>$question],['questions'=>$questions]);
    return view('answers/new',['question'=>$question]);
  }
  public function create($id,Request $request){
    $validator = Validator::make($request->all() , ['content' => 'required|max:255', ]);
    if ($validator->fails())
    {
        return redirect()->back()->withErrors($validator->errors())->withInput();
    }
    $answers = new Answer;
    $answers->user_id = Auth::user()->id;
    $answers->question_id=$id;
    $answers->content=$request->content;
    $answers->save();
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
  public function edit($question_id,$answer_id){
      //eval(\Psy\Sh());
      $question = Question::find($question_id);
      $questions = Question::findOrFail($question_id);
      $userId=$questions->user_id;
      $questions['user']=User::findOrFail($userId);
      $answer = Answer::find($answer_id);
      //$userId=$answer->user_id;
      //$answer['user']=User::findOrFail($userId);
      return view('answers/edit',['question'=>$question,'questions'=>$questions,'answer'=>$answer]);
  }
  
  public function update(Request $request)
  {
    
      $validator = Validator::make($request->all() , ['content' => 'required|max:255', ]);

      if ($validator->fails())
      {
         return redirect()->back()->withErrors($validator->errors())->withInput();
      }
      
      
      $answer = Answer::find($request->answer_id);
      $answer->content = $request->content;
      $answer->save();
        
      return redirect('/');
  }
  
  public function end($question_id, Request $request){
    
       return redirect('/');
  }
  
  public function destroy($answer_id)
  {
      Answer::destroy($answer_id);
      return redirect('/show');
  }
}