<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Answer;
use APP\Cate;
use Auth;
use Validator;


class AnswersController extends Controller
{
  public function new($question_id){
    dd("回答");
      return view('answers/new',['question_id'=>$question_id]);
  }
  public function create($question_id){
    
      
  }
  public function edit($question_id){
      //eval(\Psy\Sh());
      return view('answers/edit',['question_id'=>$question_id]);
  }
}
