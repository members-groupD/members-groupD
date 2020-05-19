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
       // dd('詳細');
       $questions = Question::orderBy('created_at', 'asc')->get();
       $answers=Answer::orderBy('created_at', 'asc')->get();
        return view('questions/show', ['questions' => $questions],['answers' => $answers]);
    }
}
