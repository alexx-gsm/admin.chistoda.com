<?php

//Route::get('api/price', function () {
//    return response()->json(['hello', 'world']);
//});

/* API */
Route::group(['prefix' => 'api'], function () {
    Route::get('price', 'Api\PriceController@index');
    Route::get('prices/inactive', 'Api\PriceController@getInactive');
});


/*  ADMIN ROUTES */
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\IndexController@index');
    Route::get('price', 'Admin\PriceController@index');
    Route::post('price/save', 'Admin\PriceController@save');
    Route::post('price/enable', 'Admin\PriceController@enable');
    Route::post('price/disable', 'Admin\PriceController@disable');
    Route::post('price/hide', 'Admin\PriceController@hide');

});
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

//---------------------------------------------------
Route::get('/', function () {
    return redirect()->to('/admin/login');
});

Route::get('/register', function () {
    return Redirect::to('/admin/login');
});

Route::get('/admin/register', function () {
    return Redirect::to('/admin/login');
});

Route::get('/password/reset', function () {
    return Redirect::to('/admin/login');
});

Route::get('admin/password/reset', function () {
    return Redirect::to('/admin/login');
});