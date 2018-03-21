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

Route::post('/user', "UserController@register");
Route::get('/user', "UserController@all");
Route::get('/user/{id}', "UserController@find");
Route::delete('/user/{id}', "UserController@destroy");
Route::put('/user/{id}', "UserController@updateview");

Route::post('/item', "ItemController@registerItem");
Route::get('/item', "ItemController@allItem");
Route::get('/item/{id}', "ItemController@findItem");
Route::delete('/item/{id}', "ItemController@destroyItem");
Route::put('/item/{id}', "ItemController@updateviewItem");
