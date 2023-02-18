@extends('layouts.app')

@section("title", "Customize Your Company Labels.")

@section("action-btn")
@can('role-create')
<!-- <a class="btn btn-outline-primary btn-sm" href=""> Create New Role</a> -->
@endcan
@endsection

@section('content')
<div class="column">
  <div class="card col-md-6 p-3 my-3 mx-2" style="width: 48%;">
    <form method="POST" action="">
      {!! csrf_field() !!}
      @method("PATCH")
      <!-- <div class="h4 primary text-muted">Customize your labels here.</div> -->
      <div class="column col-md-12">
        <div class="col-md-12">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Level 1</label>
            <input type="text" value="{{ auth()->user()->business_name }}" class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">For example Branch</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div style="text-align: center; font-size: 2rem; color: black;">
        &#x2190;&#x2193;&#x2192;
        </div>
        <div class="col-md-12">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">For example Group</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
      <!-- <div class="row col-md-12">
        <div class="col-md-6">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">For example Agent</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group input-group-outline my-3">
            <label class="form-label">For example Manager</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div> -->
      <button class="btn btn-primary col-md-3" type="submit">Done</button>
    </form>
  </div>
</div>

@endsection