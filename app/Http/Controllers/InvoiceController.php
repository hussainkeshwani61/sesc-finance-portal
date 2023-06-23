<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() {
        return view('invoice');
    }

    public function generateInvoice() {

    }

    public function findInvoice() {
        
    }

    
    public function checkInvoice($student_id) {
        $invoices = Invoice::where('student_id', $student_id)->get();
        if($invoices){
            return response()->json(['message' => 'Invoices found','invoices' => $invoices], 200);
        }else{
            return response()->json(['message' => 'Sorry!, Invoice does not exits.','invoices' => $invoices], 404);
        }
    }

    public function payInvoice() {

    }
}
