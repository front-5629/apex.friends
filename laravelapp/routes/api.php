<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;

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

// Route::prefix('auth')->group(function() {
//     Route::post('/login', [LoginController::class, 'login']);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::resource('/people', 'App\Http\Controllers\PersonController');
Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/clubs', 'App\Http\Controllers\ClubController');
Route::resource('/getUser', 'App\Http\Controllers\LoginController@getUser');

// ログイン機能実装までCO
// Route::post('/login', 'App\Http\Controllers\LoginController@login');
// Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
// Route::post('/register', 'App\Http\Controllers\RegisterController@register');
