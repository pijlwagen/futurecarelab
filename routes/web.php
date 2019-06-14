<?php

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/mijn-vragen', 'QuestionsController@myQuestions')->name('question.mine');
    Route::group(['prefix' => '/vragen'], function () {
        Route::get('/', 'QuestionsController@index')->middleware('auth')->name('question');
        Route::post('/nieuw', 'QuestionsController@store')->name('question.store');
        Route::post('/sluiten/{id}', 'QuestionsController@close')->middleware('auth')->name('question.close');
        Route::post('/verwijderen', 'QuestionsController@delete')->middleware('auth.admin')->name('question.delete');
        Route::get('/{id}', 'QuestionsController@view')->name('question.view');
    });
    Route::group(['prefix' => '/antwoorden'], function () {
        Route::post('/nieuw/{question}', 'AnswerController@store')->middleware('auth')->name('answer.store');
        Route::post('/verwijderen', 'AnswerController@delete')->middleware('auth.admin')->name('answer.delete');
    });
});

Auth::routes();
