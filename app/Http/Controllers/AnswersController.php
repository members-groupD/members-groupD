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
  public function new($question_id){
     $question = Question::find($question_id);
      $questions = Question::findOrFail($question_id);
      $userId=$questions->user_id;
      $questions['user']=User::findOrFail($userId);
      return view('answers/new',['question'=>$question],['questions'=>$questions]);
  }
  public function create($question_id, Request $request){
    
       return redirect('/');
  }
  public function edit($question_id){
      //eval(\Psy\Sh());
      $question = Question::find($question_id);
      $questions = Question::findOrFail($question_id);
      $userId=$questions->user_id;
      $questions['user']=User::findOrFail($userId);
      //$answer = Answer::findOrFail($question_id);
     // $userId=$answer->user_id;
      //$answer['user']=User::findOrFail($userId);
      return view('answers/edit',['question'=>$question],['questions'=>$questions]);
  }
  public function end($question_id, Request $request){
    
       return redirect('/');
  }
  
  public function destroy($answer_id)
  {
      Question::destroy($answer_id);
      return redirect('/');
  }
}
