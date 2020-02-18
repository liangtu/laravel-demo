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

Route::domain(config('url.hotel_url'))->prefix('hotel')->group(function () {
    Route::name('hotel.')->group(function () {
        Route::get('index','HotelController@index')->name('index');
        Route::get('show','HotelController@show')->name('show');
        Route::get('createOrder','HotelController@createOrder')->name('createOrder');
    });

});

