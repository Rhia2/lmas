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
              <th>Sraff No</th>
              <th>Sraff Name</th>
              <th>Leave type</th>
              <th>Start date</th>
              <th>End date</th>
              <th>Resumption date</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leaveapps as $key => $leaveapp)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$leaveapp->staff->staff_no}}</td>
              <td>{{$leaveapp->staff->user->firstname}} {{$leaveapp->staff->user->firstname}}</td>
              <td>{{$leaveapp->leave->name}}</td>
              <td>{{$leaveapp->start_date}}</td>
              <th>{{$leaveapp->end_date}}</th>
              <th>{{$leaveapp->resumption_date}}</th>
              <th>
                  @if($leaveapp->status == '0')
                  Pending
                  @elseif($leaveapp->status == '1')
                  Rejected
                  @else
                  Approved
                  @endif
                </th>
              <td>
                  <a href="#" data-toggle="modal" data-target="#appModal" data-id="{{$leaveapp->id}}">Approve</a>
                  <a href="#" data-toggle="modal" data-target="#rejModal" data-id="{{$leaveapp->id}}">Reject</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="appModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Approve Request <span id="name"></span>?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Approve</a>
        </div>
      </div>
    </div>

    <div class="modal fade" id="rejModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reject Request <span id="name"></span>?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Reject</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
