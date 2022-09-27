<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware('auth')->group(function () {
  Route::resource('user', App\Http\Controllers\UserController::class);
  Route::resource('product', App\Http\Controllers\ProductController::class);
  Route::resource('menu', App\Http\Controllers\MenuController::class);
  Route::resource('menu.product', App\Http\Controllers\MenuProductController::class)
    ->only(['store', 'destroy']);
  Route::resource('establishment', App\Http\Controllers\EstablishmentController::class)
    ->only(['show', 'edit', 'update']);
});
Route::get('/cardapio/{menu}', 'App\Http\Controllers\MenuController@showPublic')->name('menu.public.show');
