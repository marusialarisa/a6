<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::middleware('auth:api')->group(function () {
    Route::get('user', 'API\UserController@details');
    Route::get('user', 'API\PropertyController@details');
    Route::resource('properties', 'API\PropertyController');
});

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');


Route::post('create', 'API\PropertyController@create');
Route::post('show', 'API\PropertyController@show');