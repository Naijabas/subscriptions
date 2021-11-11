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


Route::resource('websites', App\Http\Controllers\API\WebsiteAPIController::class);


Route::resource('posts', App\Http\Controllers\API\PostAPIController::class);


Route::resource('users', App\Http\Controllers\API\UserAPIController::class);


Route::resource('subscriptions', App\Http\Controllers\API\SubscriptionAPIController::class);
