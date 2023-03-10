@extends('layouts.app')

@section("title", "Show Role")

@section("action-btn") 
    <a class="btn btn-outline-primary" href="{{ route('roles.index') }}">Back</a>
@endsection



@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success text-danger">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection