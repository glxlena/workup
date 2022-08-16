<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/helena', function () {
    return view('helena');
});
Route::get('/gerente', 'App\Http\Controllers\MenuController@gerente');
Route::get('/pedidos', 'App\Http\Controllers\RequestsController@pedidos');
Route::get('/produtos', 'App\Http\Controllers\ProductsController@produtos');
Route::get('/funcionarios', 'App\Http\Controllers\EmployeesController@funcionarios');
Route::get('/empresa', 'App\Http\Controllers\EstablishmentController@empresa');
Route::get('/teste', function () {
    return view('teste');
  });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/login', function () {
    //return view('index');
  //});
Route::middleware('auth')->group(function () {
  Route::resource('user', App\Http\Controllers\UserController::class);
});
