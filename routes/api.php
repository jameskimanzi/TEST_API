<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('admin-login', 'AuthController@admin_login');
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user')->middleware('is_admin');
        Route::get('users', 'AuthController@get_user')->middleware('is_admin');

    });
});

Route::resource('supplier', 'SupplierController');
Route::resource('products', 'ProductController');
Route::resource('supplier-products/{id}', 'SupplierProductController');
Route::resource('orders', 'OrderController');
Route::resource('order-details', 'Order_detailsController');




//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
