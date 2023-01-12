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

Route::prefix('/customers')->group(function () {


    Route::get('/', 'App\Http\Controllers\CustomerController@index')->name('customers.index');

    Route::get('/add', 'App\Http\Controllers\CustomerController@add')->name('customers.add');

    Route::post('store', 'App\Http\Controllers\CustomerController@store')->name('customers.store');

    Route::get('/{customer}', 'App\Http\Controllers\CustomerController@show')->name('customers.show');

    Route::get('/{customer}/edit', 'App\Http\Controllers\CustomerController@edit')->name('customers.edit');

    Route::put('/{customer}', 'App\Http\Controllers\CustomerController@update')->name('customers.update');

    Route::delete('/{customer}', 'App\Http\Controllers\CustomerController@delete')->name('customers.delete');

});
