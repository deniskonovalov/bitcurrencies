<?php


Route::get('/', ['as' => 'home', 'uses' => function () {
    return view('welcome');
}]);

Route::get('/currency', 'CurrencyController@index');
//Route::post('/currency', 'CurrencyController@store');
