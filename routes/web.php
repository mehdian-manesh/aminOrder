<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect()->route('orders.index');
});


Route::resource('orders', 'MainOrderController');

Route::post('customers','CustomerController@store')->name('customers.store');

Route::get('aa', function () {
    return "ok";
})->name('aa');