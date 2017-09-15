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

Route::get('/invoices', 'InvoicesController@index')->name('invoices.index');
Route::get('/invoices/create', 'InvoicesController@create')->name('invoices.create');
Route::get('/invoices/{invoice}/edit', 'InvoicesController@edit')->name('invoices.edit');
Route::get('/invoices/{invoice}', 'InvoicesController@show')->name('invoices.show');
Route::patch('/invoices/{invoice}', 'InvoicesController@update')->name('invoices.update');
Route::post('/invoices', 'InvoicesController@store')->name('invoices.store');

Route::post('/lines', 'LinesController@store')->name('lines.store');

Route::get('/invoices/{invoice}/print', 'PrintController@index')->name('invoices.print');
