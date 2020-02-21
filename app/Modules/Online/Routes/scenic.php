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
                  'scenic'=>'App\Modules\Online\Http\Scenic\Controllers',
               ];

//匹配域名
$mapDomain   =[
                  'scenic'=>config('url.sc_url'),
               ];


//判断设备来源
$isMobile = \Agent::isMobile();
if($isMobile) {
    $mapNamespace = array_map(function ($v) {
        return $v . '\Wap';
    }, $mapNamespace);
}

//scenic
Route::domain($mapDomain['scenic'])
      ->name('scenic.')
      ->prefix('/')
      ->namespace($mapNamespace['scenic'])
      ->group(function () {

                Route::get('/{id}','ScenicController@index')->name('index');
                Route::get('show','ScenicController@show')->name('show');
                Route::get('createOrder','ScenicController@createOrder')->name('createOrder');

});
