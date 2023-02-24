<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your api!
|
*/

Route::post('register', [\App\Http\Controllers\api\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('users/{id}', [\App\Http\Controllers\api\UserController::class, 'show']);
    Route::put('users/{id}', [\App\Http\Controllers\api\UserController::class, 'update']);

    Route::get('youtube/{user_id}', [\App\Http\Controllers\api\YoutubeController::class, 'show']);
    Route::post('youtube', [\App\Http\Controllers\api\YoutubeController::class, 'store']);
    Route::delete('youtube/{id}', [\App\Http\Controllers\api\YoutubeController::class, 'destroy']);

    Route::post('songs', [\App\Http\Controllers\api\SongController::class, 'store']);
    Route::delete('songs/{id}/{user_id}', [\App\Http\Controllers\api\SongController::class, 'destroy']);

    Route::get('user/{user_id}/songs', [\App\Http\Controllers\api\SongsByUserController::class, 'index']);

    Route::get('posts', [\App\Http\Controllers\api\PostController::class, 'index']);
    Route::get('posts/{id}', [\App\Http\Controllers\api\PostController::class, 'show']);
    Route::post('posts', [\App\Http\Controllers\api\PostController::class, 'store']);
    Route::put('posts/{id}', [\App\Http\Controllers\api\PostController::class, 'update']);
    Route::delete('posts/{id}', [\App\Http\Controllers\api\PostController::class, 'destroy']);

    Route::get('user/{user_id}/posts', [\App\Http\Controllers\api\PostsByUserController::class, 'show']);

    Route::post('logout', [\App\Http\Controllers\api\AuthController::class, 'logout']);
});
