@extends('layouts.app')

@section("title", "Create Branch")

@section("action-btn")
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('branch.index') }}">Back</a>
@endsection

@section("css")
<style> 
</style>
@endsection

@section('content')  

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<form class="" action="{{ route('branch.store') }}" method="POST">
    @csrf
  <div class="row">
    
    <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Name</label>
        <input type="text" name="branch_name" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Code</label>
        <input type="text" name="branch_code" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <!-- <label class="form-label">Branch Opening date</label> -->
        <input type="date" name="opening_date" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Opening Fund</label>
        <input type="number" name="opening_fund" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Email</label>
        <input type="email" name="email" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Contact Number</label>
        <input type="number" name="contact_number" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch State</label>
        <input type="text" name="state" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch City</label>
        <input type="text" name="city" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Area</label>
        <input type="text" name="area" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Pincode</label>
        <input type="number" name="pincode" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 

  <div class="row">
    
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3">
            <button class="btn btn-outline-danger rounded-0 w-100" type="submit">Submit</button>
        </div>
    </div>
  </div> 
</form>
@endsection

@section("js")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/Gruntfile.min.js"></script> -->
<script>
    $("#dropdown").select2({
        width: 'resolve',
        theme: "classic",
        placeholder: "Select role",
        allowClear: true
    });
</script>
@endsection