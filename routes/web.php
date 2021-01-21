<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UnpaidInvoicesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'only' => 'login',
]);

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', 'invoices');

    Route::get('invoices/unpaid', UnpaidInvoicesController::class)->name('invoices.unpaid');

    Route::get('invoices/{invoice}/print', PrintController::class)->name('invoices.print');

    Route::resource('invoices', InvoiceController::class);

    Route::resource('customers', CustomerController::class);

    Route::resource('companies', CompanyController::class);

    Route::get('statistics', StatisticsController::class)->name('statistics.index');
});
