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
Route::post('orders/p1', 'MainOrderController@store_p1')->name('orders.store_p1');
Route::get('orders/store/cancel', 'MainOrderController@store_cancel')->name('orders.store_cancel');

Route::resource('customers', 'CustomerController')->only(
    ["store"]
);

Route::resource('instagram', 'InstagramOrderController')->only(
    ["store"]
);

Route::resource('telegram', 'TelegramOrderController')->only(
    ["store"]
);

Route::get('aa', function () {
    return "ok";
})->name('aa');