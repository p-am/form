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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// FormController
Route::get('/', 'FormController@index')->name('form');
Route::post('/verifyform', 'FormController@verifyForm')->name('verifyForm');

// UserController
Route::post('/verifyuser', 'UserController@verifyUser')->name('user');
Route::get('/user/show/{$id}', 'UserController@show($id)')->name('userShow');
Route::get('/users/list', 'UserController@listUsers')->name('usersList');

// QuestionController
Route::get('/question/create/{$question}', 'QuestionController@create')->name('question');

// AnswerController
Route::get('/answer/create', 'AnswerController@create')->name('answer');

// Language
Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect()->route('form');
});
