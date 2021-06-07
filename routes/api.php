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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('auth/login', '\App\Http\Controllers\AuthController@login');
Route::post('auth/register', '\App\Http\Controllers\AuthController@register');
Route::get('auth/check', '\App\Http\Controllers\Auth\LoginController@authCheck');
Route::get('properties/getAllProperties', '\App\Http\Controllers\PropertiesController@apiGetAllProperties');
Route::post('properties/store', '\App\Http\Controllers\PropertiesController@apiStore');

Route::get('/users/{id}', '\App\Http\Controllers\UsersController@apiGetById');
Route::put('/users/update/{id}', '\App\Http\Controllers\UsersController@apiEdit');
