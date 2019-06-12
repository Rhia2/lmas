@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
    <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>All Staffs 
      <a href="{{route('register')}}" class="float-right btn btn-sm btn-success">Add staff</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SN</th>
              <th>Staff Id</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Username</th>
              <th>Email Address</th>
              <th>Grade</th>
              <th>Annual Leave balance</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($staffs as $key => $staff)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$staff->staff_no}}</td>
              <td>{{$staff->user->firstname}}</td>
              <td>{{$staff->user->lastname}}</td>
              <th>{{$staff->user->username}}</th>
              <th>{{$staff->user->username}}</th>
              <th>{{$staff->grade->name}}</th>
              <th>{{$staff->AnnLeaveBal()}}</th>
              <td>
                  <a href="">Edit</a>
                  <a href="#" data-toggle="modal" data-target="#logoutModal" data-name="{{$staff->firstname}}" data-lname="$staff->lastname">Delete</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <span id="name"></span>?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
