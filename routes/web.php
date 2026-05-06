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
    return view('layouts.admin.main');
});

Route::get('/customer/', 'CustomerController@create')->name('customer.create');
Route::post('/customer/create', 'CustomerController@store')->name('customer.store');
Route::get('/customer/list', 'CustomerController@index')->name('customer.index');
Route::delete('/customer/delete/{id}', 'CustomerController@destroy')->name('customer.delete');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');

