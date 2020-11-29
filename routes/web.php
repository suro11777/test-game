<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']],
    function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/game', 'GameController@index')->name('game');
        Route::get('/start', 'GameController@start')->name('start');
        Route::get('/records', 'RecordController@records')->name('record');
        Route::post('/user-record', 'GameController@updateUserRecord')->name('update.user.record');

    });

                //admin block
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'admin.'],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/questions', 'QuestionController@index')->name('questions.index');
        Route::get('/questions/create', 'QuestionController@create')->name('questions.create');
        Route::post('/questions', 'QuestionController@store')->name('questions.store');
        Route::get('/questions/edit/{id}', 'QuestionController@edit')->name('questions.edit');
        Route::put('/questions/{id}', 'QuestionController@update')->name('questions.update');
        Route::delete('/questions/{id}', 'QuestionController@delete')->name('questions.delete');
    });

