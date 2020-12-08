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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/people', 'App\Http\Controllers\PersonController');
Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/clubs', 'App\Http\Controllers\ClubController');

Route::post('/login', 'LoginController@Login');
Route::post('/logout', 'LoginController@Logout');

