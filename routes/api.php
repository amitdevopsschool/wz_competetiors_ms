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
Route::group(['prefix'=>'v1/j','middleware' => 'auth', 'middleware' => 'client_credentials'], function(){

    Route::post('/store', [App\Http\Controllers\CompetetiorsController::class, 'storedata']);
    Route::get('/emails/{id}', [App\Http\Controllers\CompetetiorsController::class, 'index']);
    // Route::get('/allcompetetiors/{id}', [App\Http\Controllers\CompetetiorsController::class, 'index']);
    Route::post('/update', [App\Http\Controllers\CompetetiorsController::class, 'update']);
    Route::get('/edits/{id}', [App\Http\Controllers\CompetetiorsController::class, 'edit']);
    Route::get('/delete/{id}', [App\Http\Controllers\CompetetiorsController::class, 'destroy']);
});
