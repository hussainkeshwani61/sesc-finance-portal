<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

//dashboard page
Route::get('/', [InvoiceController::class, 'index'])->name('dashboard');
Route::post('/find-invoice', [InvoiceController::class, 'findInvoice'])->name('findInvoice');
Route::post('/pay-invoice', [InvoiceController::class, 'payInvoice'])->name('payInvoice');

