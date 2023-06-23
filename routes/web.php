<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

//dashboard page
Route::get('/', [InvoiceController::class, 'index'])->name('dashboard');
