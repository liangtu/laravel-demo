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


Route::domain('api.laravel.inner.chimelong.com')->group(function () {

    Route::get('api', 'ApiController@index');
});


Route::domain('laravel.inner.chimelong.com')->group(function () {
    Route::get('api/hh', 'ApiController@index');
});
