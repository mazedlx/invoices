<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', 'invoices');
    Route::get('invoices/unpaid', 'UnpaidInvoicesController')->name('invoices.unpaid');
    Route::resource('invoices', 'InvoicesController');
    Route::get('invoices/{invoice}/print', 'PrintController@index')->name('invoices.print');

    Route::resource('customers', 'CustomersController');

    Route::resource('companies', 'CompaniesController');

    Route::get('statistics', 'StatisticsController@index')->name('statistics.index');
});
