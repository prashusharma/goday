@extends('layouts.app')

@section("title", "Create Member")

@section("action-btn")
<a class="btn btn-outline-warning rounded-0 btn-sm" href="{{ route('users.showMember',$id) }}">Back</a>
@endsection

@section("css")
<style>
  .multiselect {
    width: 100%;
    border: 1px solid #d2d6da !important;
    border-radius: 0.375rem ip !important;
    border-top-left-radius: 0.375rem !important;
    border-bottom-left-radius: 0.375rem !important;
    padding: 0.5rem 0.75rem !important;
    line-height: 1.3 !important;
  }

  .selectBox {
    position: relative;
  }

  .selectBox select {
    width: 100%;
  }

  .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    border: 2px solid white;
  }

  #checkboxes {
    display: none;
    margin-top: 0.5rem;
  }

  #checkboxes label {
    display: block;
  }

  #one,
  #two,
  #three {
    margin-right: 1rem;
  }
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
@if(session()->has('message'))
    <div class="alert alert-success text-dark">
        {{ session()->get('message') }}
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
        <label class="form-label">A/C holder name</label>
        <input type="text" name="name" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <select name="loan_type" id="loan_type" class="form-control" required>
          <option value="not_selected" class="text-muted" selected>Click to select Loan type</option>
          <option value="flat_interest">Flat Interest</option>
          <option value="reducing_interest">Reducing Interest</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="m-0 mx-2 d-flex" style="align-items: center;">Loan Sanction date</label>
        <input type="date" name="sanction_date" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Availble Fund (₹)</label>
        <input type="number" name="opening_fund" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">principle Amount (₹)</label>
        <input type="number" name="principle" id="principle" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Interest Per Anum (%)</label>
        <input type="number" name="interest" id="interest" onchange="setInterest()" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Interest Amount (₹)</label>
        <input type="number" name="interest_amount" id="interest_amount" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Loan Amount (₹)</label>
        <input type="number" name="loan_amount" id="loan_amount" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Number Of Installment</label>
        <input type="number" name="number_of_installment" onchange="setInstallment()" id="number_of_installment" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Installment Amount</label>
        <input type="number" name="installment_amount" id="installment_amount" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="m-0 mx-2 d-flex" style="align-items: center;">Start date Installment</label>
        <input type="date" name="start_date_of_installment" id="start_date_of_installment" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="m-0 mx-2 d-flex" style="align-items: center;">End date of Installment</label>
        <input type="date" name="end_date_of_installment" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <select name="percentage_fine_on_due" id="percentage_fine_on_due" class="form-control" required>
          <option value="not_selected" class="text-muted" selected>Select % Fine on due amount</option>
          <option value="0">0 % Fine on due amount</option>
          <option value="0.5">0.5 % Fine on due amount</option>
          <option value="1">1 % Fine on due amount</option>
          <option value="1.5">1.5 % Fine on due amount</option>
          <option value="2">2 % Fine on due amount</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <input type="hidden" name="extra_charge" id="extra_charge">
      <div class="input-group input-group-outline my-3">
        <div class="multiselect text-muted">
          <div class="selectBox" onclick="showCheckboxes()">
            <select class="text-muted">
              <option class="text-muted">Extra charges (₹)</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div id="checkboxes">
            <label for="one" class="text-dark d-flex justify-content-between">
              Registration Charges (₹) <input type="text" id="one" onchange="setExtraCharge()" /></label>
            <label for="two" class="text-dark d-flex justify-content-between">
              File Charges (₹) <input type="text" id="two" onchange="setExtraCharge()" /></label>
            <label for="three" class="text-dark d-flex justify-content-between">
              Insurance (₹) <input type="text" id="three" onchange="setExtraCharge()" /></label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Sanctioned Amount</label>
        <input type="number" name="final_sanctioned_amount" id="final_sanctioned_amount" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <select name="installment_type" id="installment_type" class="form-control" required>
          <option value="not_selected" class="text-muted" selected>Select Installment type</option>
          <option value="daily">Daily</option>
          <option value="weekly">Weekly</option>
          <option value="monthly">Monthly</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="input-group input-group-outline my-3">
      <button class="btn btn-outline-danger rounded-0 w-100" type="submit">Submit</button>
    </div>
  </div>

</form>
@endsection

@section("js")
<script>
  var expanded = false;

  function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
      checkboxes.style.display = "block";
      expanded = true;
    } else {
      checkboxes.style.display = "none";
      expanded = false;
    }
  }
  function setInterest(){
    var i = document.getElementById('interest').value;
    var p = document.getElementById('principle').value;
    document.getElementById('interest_amount').value=Math.round(i*p/100);
    document.getElementById('loan_amount').value= parseInt(p)+Math.round(i*p/100);
  }
  function setInstallment(){
    var ni = document.getElementById('number_of_installment').value;
    var la = document.getElementById('loan_amount').value;
    var ia = Math.round(parseInt(la)/parseInt(ni));
    console.log(typeof(ia));
    document.getElementById('installment_amount').value = ia;
  }
  function setExtraCharge(){
    var one = parseInt(document.getElementById('one').value === '' ? 0 : document.getElementById('one').value);
    var two = parseInt(document.getElementById('two').value === '' ? 0 : document.getElementById('two').value);
    var three = parseInt(document.getElementById('three').value === '' ? 0 : document.getElementById('three').value);
    document.getElementById('extra_charge').value = one+two+three;
    setSanctionedAmount();
  }
  function setSanctionedAmount(){
    var p = document.getElementById('principle').value;
    var ec = document.getElementById('extra_charge').value;
    // console.log(p-ec);
    document.getElementById('final_sanctioned_amount').value = p-ec;

  }

</script>
@endsection