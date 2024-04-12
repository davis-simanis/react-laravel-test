<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documents', 'DocumentController@index');
Route::get('/documents/{id}', 'DocumentController@show');

Route::post('/documents', 'DocumentController@store');
