<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//check invoices route
Route::post('/check-invoice/{student_id}', [InvoiceController::class, 'checkInvoice'])->name('check_invoice');

//generate invoice route
Route::post('/generate_invoice/{student_id}/{amount}', [InvoiceController::class, 'generateInvoice'])->name('generate_invoice');
