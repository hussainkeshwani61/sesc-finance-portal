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

    public function findInvoice(Request $request) {
        $request->validate([
            'invoice_ref' => 'required'
        ]);
         $invoice = Invoice::where('invoice_ref', $request->invoice_ref)->first();
        if($invoice){
            return redirect()->route('invoice', compact('dashboard'));
        }else{
            return redirect()->back()->with('error', 'Sorry!, Invoice does not exits.');
        } 
    }

    public function payInvoice(Request $request) {

    }
    
    public function checkInvoice($student_id) {
        $invoices = Invoice::where('student_id', $student_id)->get();
        if($invoices){
            return response()->json(['message' => 'Invoices found','invoices' => $invoices], 200);
        }else{
            return response()->json(['message' => 'Sorry!, Invoice does not exits.','invoices' => $invoices], 404);
        }
    }

    
}
