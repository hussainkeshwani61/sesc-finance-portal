
@extends('layouts.master')

@section('title')
     Finance Portal
@endsection

@section('content')    
<div class="card">
    <div class="card-body">
        @include('layouts.flashmessage')
        <h3 class="text-muted">Enter Referance number </h3>
        <form action="{{ route('findInvoice') }}" method="POST">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="invoice_ref" placeholder="Enter Refrence number">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
          </form>

    </div>
</div> 
@endsection