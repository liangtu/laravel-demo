<?php




http://laravel.inner.chimelong.com:30405/hotel/show?id=4



Route::domain(config('url.hotel_url'))->prefix('hotel')->group(function () {
        Route::name('hotel.')->group(function () {
            Route::get('index','HotelController@index')->name('index');
            Route::get('show','HotelController@show')->name('show');
            Route::get('createOrder','HotelController@createOrder')->name('createOrder');
        });

    });

