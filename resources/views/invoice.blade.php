
@extends('layouts.master')

@section('title')
    Invoice Page
@endsection

@section('content')    
<div class="card">
    <div class="card-body">
        @include('layouts.flashmessage')

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Student Profile Details </h3>
            
            </div>
            <div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Refrence Number</label>
                        <input type="text" class="form-control" value="{{ $invoice->invoice_ref }}"  disabled>
                    </div>
                    
                    <div class="form-group">
                        <label>Invoice Date</label>
                        <input type="text" class="form-control" value="{{ $invoice->created_at }}"  disabled>
                    </div>

                    <div class="form-group">
                        <label>Invoice amount</label>
                        <input type="text" class="form-control" value="{{ $invoice->amount }}"  disabled>
                    </div>

                    <div class="form-group">
                        <label>Invoice Status</label>
                        <input type="text" class="form-control" value="{{ $invoice->status }}"  disabled>
                    </div>
                </div>
                <!-- /.card-body -->
    
                <div class="card-footer">
                    <a href="{{ route('index') }}" class="btn btn-primary">Find Invoice</a>
                    @if($invoice->status == 'PAID')
                    <span class="alert alert-success float-right">Paid Successfuly</span>
                    @else
                        <form action="{{ route('payInvoice')}}" method="POST">
                            @csrf
                            <input type="hidden" name="invoice_ref" value="{{ $invoice->invoice_ref }}">
                            <input type="submit" value="Pay" class="btn btn-success float-right">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection