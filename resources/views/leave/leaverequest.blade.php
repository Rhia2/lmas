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
      <i class="fas fa-table"></i>All Leave requests 
      <a href="{{route('addLeaveReq')}}" class="float-right btn btn-sm btn-success">Request for Leave</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SN</th>
              <th>Leave type</th>
              <th>Start date</th>
              <th>End date</th>
              <th>Resumption date</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leaveReqs as $key => $leaveReq)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$leaveReq->leave->name}}</td>
              <td>{{$leaveReq->start_date}}</td>
              <th>{{$leaveReq->end_date}}</th>
              <th>{{$leaveReq->resumption_date}}</th>
              <th>
                  @if($leaveReq->status == '0')
                  Pending
                  @elseif($leaveReq->status == '1')
                  Rejected
                  @else
                  Approved
                  @endif
                </th>
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

    <div class="modal fade" id="rejModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
