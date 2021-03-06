<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// -----------------------------questions----------------------------------------------

//質問新規画面
Route::get('/questions/new','QuestionsController@new');
Route::post('/questions/create', 'QuestionsController@create');

//編集
Route::get('/questions/{question_id}','QuestionsController@edit');
Route::post('/questions/edit','QuestionsController@update');

//質問一覧画面
Route::get('/','QuestionsController@index');


//質問削除機能
Route::get('/questionsdelete/{question_id}', 'QuestionsController@destroy');

// -----------------------------answers----------------------------------------------
Route::get('/questions/{question_id}/answer','AnswersController@new');
// Route::post('/questions/{question_id}/answer/new','AnswersController@create')->name('answer.create');
Route::post('/answer/new/{id}','AnswersController@create')->name('answer.create');

Route::get('/answers/{question_id}/edit/{answer_id}','AnswersController@edit')->name('answer.edit');

Route::post('/answers/update','AnswersController@update');

Route::get('/questions/show/{id}','QuestionsController@show');
// -----------------------------answers----------------------------------------------
// Route::post('/questions/{question_id}/answer/new','AnswersController@create')->name('answer.create');
// Route::get('/answers/{question_id}/edit','AnswersController@edit');

// Route::post('/answers/{question_id}/edit/new','AnswersController@end')->name('answer.edit');

//質問削除機能
Route::get('/answersdelete/{answer_id}', 'AnswersController@destroy');

// -----------------------------answers----------------------------------------------
//user詳細ページへ
Route::get('/show','UsersController@show');

Route::get('/list/{id}','CatesController@show');