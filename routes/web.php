<?php

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/mijn-vragen', 'QuestionsController@myQuestions')->name('question.mine');
    Route::group(['prefix' => '/vragen', 'middleware' => ['blockade']], function () {
        Route::get('/', 'QuestionsController@index')->middleware(['auth', 'auth.verified'])->name('question');
        Route::post('/nieuw', 'QuestionsController@store')->name('question.store');
        Route::post('/sluiten/{id}', 'QuestionsController@close')->middleware(['auth', 'auth.verified'])->name('question.close');
        Route::post('/verwijderen', 'QuestionsController@delete')->middleware(['auth', 'auth.verified'])->name('question.delete');
        Route::get('/{id}', 'QuestionsController@view')->name('question.view');
    });
    Route::group(['prefix' => '/antwoorden', 'middleware' => ['auth', 'blockade']], function () {
        Route::post('/nieuw/{question}', 'AnswerController@store')->middleware(['auth', 'auth.verified'])->name('answer.store');
        Route::post('/verwijderen', 'AnswerController@delete')->middleware('auth.admin')->name('answer.delete');
    });
    Route::group(['prefix' => '/beheer', 'middleware' => ['auth', 'auth.admin', 'blockade']], function () {
        Route::get('/gebruikers', 'AdminController@users')->name('admin.user');
        Route::get('/gebruikers/blokkeren/{id}', 'AdminController@block')->name('admin.user.block');
        Route::get('/gebruikers/verifieren/{id}', 'AdminController@verify')->name('admin.user.verify');
        Route::group(['prefix' => '/categorie'], function () {
            Route::get('/', 'CategoryController@index')->name('admin.cat.index');
            Route::get('/nieuw', 'CategoryController@create')->name('admin.cat.create');
            Route::post('/nieuw', 'CategoryController@store')->name('admin.cat.store');
            Route::get('/aanpassen/{id}', 'CategoryController@edit')->name('admin.cat.edit');
            Route::post('/aanpassen/{id}', 'CategoryController@update')->name('admin.cat.update');
            Route::get('/verwijderen/{id}', 'CategoryController@delete')->name('admin.cat.delete');
        });
    });
});

Auth::routes();
