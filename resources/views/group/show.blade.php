@extends('layouts.app')

@section("title", "Group Management")

@section("body-class", "g-sidenav-show bg-gray-200")


@section("action-btn")
<a class="btn btn-outline-warning btn-sm rounded-0" href="{{ route('group.create') }}?branch_id={{ $id }}">Create Group</a>
@endsection

@section('content')  
<div class="px-2 table-responsive">
  @php
    $i = 1;
  @endphp
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Group Name</th>
        <th>Email</th>
        <th>Area</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $group)
      <tr class="align-middle">
        <td class="text-center fw-bold">
            {{ $i++ }}
        </td>
        <td>
            {{ $group->group_name }}
        </td>
        <td>
          {{ $group->group_email }}
        </td>
        <td>
          {{ $group->area }}
        </td>
        <td class="d-flex justify-content-between align-items-center px-2">
          <a class="text-warning me-2" href="{{ url('/group/'.$group->id.'/edit') }}" onclick="return confirm('Are you sure you want to edit this group?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </a>
          <span class="text-danger">
          <form action="{{ url('/group/'.$group->id) }}" method="POST" title="Delete group" accept-charset="UTF-8" style="display: inline;">
            {{ method_field('Delete') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to delete this group?')">Delete</button>
          </form>
          </span>
          <span class="text-danger">
            <a class="btn btn-primary" href="{{ route('users.showMember', $group->id) }}">See All</a>
          </span>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {!! $data->render() !!}
</div>
@endsection
