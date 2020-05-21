<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Cate;
use Auth;
use Validator;

class CatesController extends Controller
{

    public function new()
    {
        return view('cate');
    }
    public function show($id){
        $questions=Question::where('cate_id', $id)->orderBy('created_at', 'asc')->get();
        foreach($questions as $question){
            $question['cate']=Cate::findOrFail($id);
        }
         $cates = Cate::orderBy('created_at', 'asc')->get();
        return view('/list',['questions' => $questions] ,['cates' => $cates]);

    }

}
