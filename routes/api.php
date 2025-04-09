<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function () {
   Route::post('/register', 'register');
   Route::post('/login', 'login');
   Route::post('/logout', 'logout')->middleware('auth:sanctum');
   Route::post('/users', 'index')->middleware('auth:sanctum');
});


Route::resource('posts', PostController::class)->middleware('auth:sanctum');
