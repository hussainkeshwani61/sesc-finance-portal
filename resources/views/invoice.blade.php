
@extends('layouts.master')

@section('title')
     Finance Portal
@endsection

@section('content')    
<div class="card">
    <div class="card-body">
        @include('layouts.flashmessage')
        <h3 class="text-muted">Enter Referance number </h3>
        <form action="" method="POST">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="ref_number" placeholder="Enter Refrence number">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
          </form>
    </div>
</div> 
@endsection