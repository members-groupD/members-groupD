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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// -----------------------------questions----------------------------------------------
Route::get('/questions/show/{id}','QuestionsController@show');

// -----------------------------answers----------------------------------------------
Route::get('/questions/{question_id}/answer','AnswersController@new');
Route::post('/questions/{question_id}/answer','AnswersController@create')->name('answer.create');
Route::get('/answers/{question_id}/edit','AnswersController@edit');