<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/user/register', 'Api\AuthController@register')->name('user.register');
Route::post('/user/login', 'Api\AuthController@login')->name('user.login');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:airlock')->get('/user', function (Request $request) {
    return $request->user();
});