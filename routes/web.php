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
Route::post('/customer/search', 'CustomerController@search')->name('customer.search');
Route::get('/customer/details/pdf/{id}', 'CustomerController@createDetailPdf')->name('customerDetail.pdf');
Route::get('/customer/list/pdf/', 'CustomerController@createListPdf')->name('customerList.pdf');
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
Route::get('booking/create/', 'BookingController@create')->name('booking.create');
Route::post('booking/store', 'BookingController@store')->name('booking.store');
Route::get('booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
Route::get('booking/details/{id}', 'BookingController@show')->name('booking.show');
Route::put('booking/update/{id}', 'BookingController@update')->name('booking.update');
Route::delete('booking/delete/{id}', 'BookingController@destroy')->name('booking.delete');
Route::get('/search-customers', 'BookingController@searchCustomers')->name('bookings.search.customers');


//Payment Route

Route::get('/payment/list', 'PaymentController@index')->name('payment.index');
Route::get('payment/create/', 'PaymentController@create')->name('payment.create');
Route::post('payment/add/', 'PaymentController@store')->name('payment.store');
Route::get('payment/details/{id}', 'PaymentController@show')->name('payment.show');
Route::get('payment/edit{id}', 'PaymentController@edit')->name('payment.edit');
Route::put('payment/update/{id}', 'PaymentController@update')->name('payment.update');
Route::delete('payment/delete/{id}', 'PaymentController@destroy')->name('payment.destroy');

//Employee Route

Route::get('/employees/list', 'EmployeeController@index')->name('employees.index');
Route::get('/employees/create/', 'EmployeeController@create')->name('employees.create');
Route::post('/employees/add/', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/details/{id}', 'EmployeeController@show')->name('employees.show');
Route::get('/employees/edit{id}', 'EmployeeController@edit')->name('employees.edit');
Route::put('/employees/update/{id}', 'EmployeeController@update')->name('employees.update');
Route::delete('/employees/delete/{id}', 'EmployeeController@destroy')->name('employees.destroy');

//Typespace Route

Route::get('/typespace/list', 'TypespaceController@index')->name('typespace.index');
Route::get('/typespace/create/', 'TypespaceController@create')->name('typespace.create');
Route::post('/typespace/add', 'TypespaceController@store')->name('typespace.store');
Route::get('/typespace/edit/{id}', 'TypespaceController@edit')->name('typespace.edit');
Route::put('/typespace/update/{id}', 'TypespaceController@update')->name('typespace.update');
Route::delete('/typespace/delete/{id}', 'TypespaceController@destroy')->name('typespace.destroy');

//Space Route

Route::get('/space/list', 'SpaceController@index')->name('space.index');



