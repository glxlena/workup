<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
  Route::resource('user', App\Http\Controllers\UserController::class);
  Route::resource('product', App\Http\Controllers\ProductController::class);
});
