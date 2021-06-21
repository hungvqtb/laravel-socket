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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::get('/contact/{id}', 'Api\ContactController@index');
Route::get('/conversation/{id}', 'Api\ContactController@getMessageFor');
Route::post('/conversation/send', 'Api\ContactController@sendMessage');
Route::get('/user/{id}', 'Api\ContactController@show');

