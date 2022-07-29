<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DeletedController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', 'CustomersController')->except('show')->middleware('auth');
Route::resource('orders', OrdersController::class);
Route::resource('deleted', DeletedController::class);
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
