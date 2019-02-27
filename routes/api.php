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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:api')->get('/expanse', function (Request $request) {
//     return $request->expanse();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->product();
});


Route::get('total', 'API\ProductController@getTotal');


Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResources(['user'=>'API\UserController']);
    Route::apiResources(['product'=>'API\ProductController']);
    
});
Route::get('profile','API\UserController@profile');
Route::put('profile','API\UserController@updateProfile');
Route::put('profile','API\ProductController@updateProfile');
Route::get('findUser','API\UserController@search');



Route::get('profile','API\ProductController@profile');
Route::put('profile','API\ProductController@updateProfile');
Route::get('findUser','API\ProductController@search');


