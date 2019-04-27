<?php

// User route to register a new date.
Route::get('/', 'DateRegisterController@dateRegisterView')->name('date_register_view');
Route::post('/date-register', 'DateRegisterController@dateRegister')->name('date_register');

// ['register' => false] to disable register route. 
Auth::routes(['register' => false]);

Route::group(['namespace' => 'Panel', 'middleware' => ['auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('doctor/date-register', 'DateRegisterController')->only([
        'index', 'show', 'destroy', 'update'
    ]);;

});

