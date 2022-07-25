<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

//Votes
Route::prefix('vote')->name('vote.')->group(function () {
    Route::get('/', 'VoteController@index')->name('index');
    Route::get('show/{id}', 'VoteController@show')->name('show');
    Route::get('create', 'VoteController@create')->name('create');
    Route::post('store', 'VoteController@store')->name('store');
    Route::get('edit/{id}', 'VoteController@edit')->name('edit');
    Route::post('update', 'VoteController@update')->name('update');
    Route::post('delete/{id}', 'VoteController@destroy')->name('delete');
    Route::get('voting/{id}', 'VoteController@voting')->name('voting');
});
    
//options
Route::prefix('option')->name('option.')->group(function () {
    Route::get('/', 'OptionController@index')->name('index');
    Route::get('show/{id}', 'OptionController@show')->name('show');
    Route::get('create', 'OptionController@create')->name('create');
    Route::post('store', 'OptionController@store')->name('store');
    Route::get('edit/{id}', 'OptionController@edit')->name('edit');
    Route::put('update/{id}', 'OptionController@update')->name('update');
    Route::delete('delete/{id}', 'OptionController@delete')->name('delete');
});

//Answers
Route::prefix('answer')->name('answer.')->group(function () {
    Route::get('/', 'AnswerController@index')->name('index');
    Route::get('show/{id}', 'AnswerController@show')->name('show');
    Route::get('create', 'AnswerController@create')->name('create');
    Route::post('store', 'AnswerController@store')->name('store');
    Route::get('edit', 'AnswerController@edit')->name('edit');
    Route::put('update/{id}', 'AnswerController@update')->name('update');
    Route::delete('delete/{id}', 'AnswerController@delete')->name('delete');
});
