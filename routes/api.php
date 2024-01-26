<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Http\Controllers\User\UserAuthController::class)->group(function (){
    Route::post("create-user","create_user" );
    Route::post("login-user","login_user");
    Route::post("verify-user","verify_user");
    Route::post("forget-user-password","forget_password");
    Route::post("reset-user-password","reset_password");
});

Route::get("crawled-data",[\App\Http\Controllers\Scraper\ContentController::class,'crawl_data']);
