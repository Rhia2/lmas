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
            New Grade 
            <a href="{{URL::previous()}}" class="float-right btn btn-sm btn-warning">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('storeGrade') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                    <div class="col-md-6">
                        <input id="level" type="text" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" required>
                        @if ($errors->has('level'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('level') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>All Grades 
      <a href="{{route('attachLeave')}}" class="float-right btn btn-sm btn-success">Attach Leave</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Level</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach($grades as $key => $grade)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$grade->name}}</td>
              <td>{{$grade->level}}</td>
              <!-- <td><a href="#" data-toggle="modal" data-target="#logoutModal" data-name="{{$grade->name}}" data-leave="$grade->leave_days()">View</a></td> -->
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
