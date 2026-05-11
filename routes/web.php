<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.dash.index');
});

//Customer Route

Route::get('/customer/', 'CustomerController@create')->name('customer.create');
Route::post('/customer/add', 'CustomerController@store')->name('customer.store');
Route::get('/customer/list', 'CustomerController@index')->name('customer.index');
Route::delete('/customer/delete/{id}', 'CustomerController@destroy')->name('customer.delete');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::put('/customer/update/{id}', 'CustomerController@update')->name('customer.update');
Route::get('/customer/details/{id}', 'CustomerController@show')->name('customer.show');

//Categories Route

Route::get('/room/categories', 'CategorieController@create')->name('categorie.create');
Route::post('/room/categories/add', 'CategorieController@store')->name('categorie.store');
Route::get('/room/categories/list', 'CategorieController@index')->name('categorie.index');
Route::get('/room/categorie/edit/{id}', 'CategorieController@edit')->name('categorie.edit');
Route::put('/room/categorie/update/{id}', 'CategorieController@update')->name('categorie.update');
Route::delete('/room/categories/delete/{id}', 'CategorieController@destroy')->name('categorie.delete');

//Room Route

Route::get('/room/create', 'RoomController@create')->name('room.create');
Route::post('/room/add', 'RoomController@store')->name('room.store');
Route::get('/room/list', 'RoomController@index')->name('room.index');
Route::delete('/room/delete/{id}', 'RoomController@destroy')->name('room.delete');
Route::get('/room/edit/{id}', 'RoomController@edit')->name('room.edit');
Route::put('/room/update/{id}', 'RoomController@update')->name('room.update');
Route::get('/room/details/{id}', 'RoomController@show')->name('room.show');

//Booking Route

Route::get('booking/list', 'BookingController@index')->name('booking.index');
Route::get('booking/create/{customer?}', 'BookingController@create')->name('booking.create');
Route::post('booking/store', 'BookingController@store')->name('booking.store');
Route::get('booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
Route::get('booking/details/{id}', 'BookingController@show')->name('booking.show');
Route::put('booking/update/{id}', 'BookingController@update')->name('booking.update');
Route::delete('booking/delete/{id}', 'BookingController@destroy')->name('booking.delete');

//Payment Route

Route::get('/payment/list', 'PaymentController@index')->name('payment.index');
Route::get('payment/create', 'PaymentController@create')->name('payment.create');
Route::post('payment/add', 'PaymentController@store')->name('payment.store');