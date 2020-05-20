<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use APP\Cate;
use Auth;
use Validator;

class CatesController extends Controller
{
    public function new()
    {
        return view('cate');
    }
}
