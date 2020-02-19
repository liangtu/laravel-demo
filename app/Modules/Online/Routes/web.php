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
//匹配命名空间
$mapNamespace= [
                  'hotel'=>'App\Modules\Online\Http\Hotel\Controllers',
                  'scenic'=>'App\Modules\Online\Http\Scenic\Controllers',
               ];

//匹配域名
$mapDomain   =[
                  'hotel' =>config('url.hotel_url'),
                  'scenic'=>config('url.hotel_url'),
               ];


//判断设备来源
$isMobile = \Agent::isMobile();
if($isMobile) {
    $mapNamespace = array_map(function ($v) {
        return $v . '\Wap';
    }, $mapNamespace);
}


//hotel
Route::domain($mapDomain['hotel'])
      ->name('hotel.')
      ->prefix('hotel')
      ->namespace($mapNamespace['hotel'])
      ->group(function () {

                Route::get('index','HotelController@index')->name('index');
                Route::get('show','HotelController@show')->name('show');
                Route::get('createOrder','HotelController@createOrder')->name('createOrder');
});

//scenic
Route::domain($mapDomain['scenic'])
      ->name('scenic.')
      ->prefix('scenic')
      ->namespace($mapNamespace['scenic'])
      ->group(function () {

                Route::get('index','ScenicController@index')->name('index');
                Route::get('show','ScenicController@show')->name('show');
                Route::get('createOrder','ScenicController@createOrder')->name('createOrder');

});
