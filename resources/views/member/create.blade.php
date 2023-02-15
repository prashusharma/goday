@extends('layouts.app')

@section("title", "Create Member")

@section("action-btn")
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('users.showMember',$id) }}">Back</a>
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

<form class="" action="{{ route('users.store') }}" method="POST">
    @csrf
  <div class="row">
    <input type="hidden" name="group_id" value="{{ $id }}">
    <input type="hidden" name="password" value="12345">
    <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">A/c Holder's Name</label>
        <input type="text" name="name" class="form-control" autocomplete="off">
      </div>
    </div>
    
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <!-- <label class="form-label">Branch Opening date</label> -->
        <input type="date" name="sanction_date" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Availble Fund</label>
        <input type="number" name="opening_fund" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">principle Amount</label>
        <input type="number" name="principle" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Interest Added</label>
        <input type="number" name="interest" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Interest Amount</label>
        <input type="number" name="interest_amount" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Loan Amount</label>
        <input type="number" name="loan_amount" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Loan type</label>
        <input type="text" name="type_of_installment" class="form-control" autocomplete="off">
      </div>
    </div>
    
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Number Of Installment</label>
        <input type="number" name="number_of_installment" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Installment Amount</label>
        <input type="number" name="installment_amount" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Start date Installment</label>
        <input type="date" name="start_date_of_installment" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">End date of Installment</label>
        <input type="date" name="end_date_of_installment" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 

  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Fine % on due Amount</label>
        <input type="number" name="percentage_fine_on_due" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Extra Charges</label>
        <input type="number" name="extra_charges" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Sanctioned Amount</label>
        <input type="number" name="final_sanctioned_amount" class="form-control" autocomplete="off">
      </div>
    </div>
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