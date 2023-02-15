@extends('layouts.app')

@section("title", "Show User")

@section("action-btn")
  <a class="btn btn-outline-warning"  href="{{ route('users.index') }}">Back</a>
@endsection


@section('content')
    
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success text-danger">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection