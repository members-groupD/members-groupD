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
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    // ===ここからリストを新規作成する処理の追加（フォームへの遷移）===
    public function new()
    {
        return view('questions/create');
        // テンプレート「questions/create.blade.php」を表示します。
    }
    
    // ===ここまでリストを新規作成する処理の追加（フォームへの遷移）===

    //===ここから質問の一覧表示をするための処理追加===
    public function index()
    {
        // Questionモデルを介してデータベースからデータを取得。whereで取得したデータは配列になっている。
        //eval(\Psy\Sh());
        $questions = Question::orderBy('created_at', 'asc')->get();// 全てのデータが取得できる
        
        // コントローラからビューへの値の受け渡しをview関数を使って実施
        return view('index', ['questions' => $questions]);
    }
    
    // ===ここまでリストの一覧表示をするための処理追加===

    public function show($id){
        dd('詳細画面');
        return view('/');;
    }
    
}
