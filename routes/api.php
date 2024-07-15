<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

