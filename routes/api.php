<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

    

Route::post('login',[UserAuthController::class, 'login']);
    
Route::middleware('auth:sanctum')->group(function() {

    Route::get('/diningtable', [App\Http\Controllers\DiningTableController::class, 'index']);

    Route::get('/dishes', [App\Http\Controllers\DiningTableController::class, 'get_dishes']);

    Route::get('/drinks', [App\Http\Controllers\DiningTableController::class, 'get_drinks']);

    Route::get('/users', [App\Http\Controllers\DiningTableController::class, 'get_users']);

    Route::post('/seats_store', [App\Http\Controllers\DiningTableController::class, 'store']);

    Route::post('logout',[UserAuthController::class, 'logout']);
});
