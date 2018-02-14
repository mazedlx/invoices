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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/invoices/unpaid', 'UnpaidInvoicesController')->name('invoices.unpaid');
    Route::resource('/invoices', 'InvoicesController');
    Route::get('/invoices/{invoice}/print', 'PrintController@index')->name('invoices.print');

    Route::resource('/customers', 'CustomersController');

    Route::resource('/companies', 'CompaniesController');

    Route::get('/statistics', 'StatisticsController@index')->name('statistics.index');
});

Auth::routes();
