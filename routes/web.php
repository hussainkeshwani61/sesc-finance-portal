<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

//dashboard page
Route::view('/', 'index')->name('index');
Route::post('/find-invoice', [InvoiceController::class, 'findInvoice'])->name('findInvoice');
Route::post('/pay-invoice', [InvoiceController::class, 'payInvoice'])->name('payInvoice');

