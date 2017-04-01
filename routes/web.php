<?php

//Route::get('/admin', 'Admin\IndexController@index');

Route::get('/', function () {
    return redirect()->to('/admin/login');
});
//Route::get('/register', function () {
//    return Redirect::to('/admin/login');
//});
//
//Route::get('/password/reset', function () {
//    return Redirect::to('/admin/login');
//});
//
//
///* API */
//Route::group(['prefix' => 'api'], function () {
//    Route::get('price', 'Api\PriceController@index');
//});
//
//
/*  ADMIN ROUTES */
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\IndexController@index');
    Route::get('price', 'Admin\PriceController@index');
    Route::post('price/save', 'Admin\PriceController@save');

});
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

//Auth::routes();