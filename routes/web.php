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

//編集
Route::get('/questions/{question_id}','QuestionsController@edit');
Route::post('/questions/edit','QuestionsController@update');

//質問一覧画面
Route::get('/','QuestionsController@index');

//質問新規画面
Route::get('/questions/create', 'QuestionsController@new')->name('new');
//Route::get('/questions/new','QuestionsController@new');
Route::post('/questions/create', 'QuestionsController@create');

Route::get('/questions/show/{id}','QuestionsController@show');
// -----------------------------answers----------------------------------------------