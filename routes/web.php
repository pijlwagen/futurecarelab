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

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix' => '/vragen'], function () {
        Route::post('/nieuw', 'QuestionsController@store')->name('question.store');
        Route::get('/{id}', 'QuestionsController@view')->name('question.view');
    });
    Route::group(['prefix' => '/antwoorden'], function () {
        Route::post('/nieuw/{question}', 'AnswerController@store')->name('answer.store');
    });
});

Auth::routes();
