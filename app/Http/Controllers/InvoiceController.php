<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    

    public function generateInvoice($student_id, $amount) {
        $invoice = new Invoice;
        $invoice_ref = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        $invoice->invoice_ref = $invoice_ref;
        $invoice->student_id = $student_id;
        $invoice->amount = $amount;
        $invoice->status = "UNPAID";
        $invoice->save();

        return response()->json(['message' => 'Invoice generated successfully','invoice' => $invoice], 201);
    }

    public function findInvoice(Request $request) {
        $request->validate([
            'invoice' => 'invoice_ref'
        ]);
        $invoice_ref = $request->input('invoice_ref');
        $invoice = Invoice::where('invoice_ref', $invoice_ref)->first();
        if($invoice){
            return view('invoice', ['invoice' => $invoice]);
        }else{
            return redirect()->route('index')->with('error' ,'Sorry!, Invoice does not exits.');
        }
    }

    public function payInvoice(Request $request) {
        $invoice_ref = $request->input('invoice_ref');
        $invoice = Invoice::where('invoice_ref', $invoice_ref)->first();
        if($invoice){
            $invoice->status = "PAID";
            $invoice->save();
            return view('invoice', ['invoice' => $invoice]);
        }else{
            return view('index', ['error' => 'Sorry!, Invoice does not exits.']);
        } 
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
