<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Auth;

use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function show()
    {
        //ユーザー情報
        $user = Auth::user();
        
        //質問情報
        $questions = Question::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        
        //回答情報
        $answers = Answer::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        
        return view('show', ['user' => $user, 'questions' => $questions, 'answers' => $answers]);
    }
}