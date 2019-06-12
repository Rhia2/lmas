@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
  <div class="card card-primary mb-3">
    <div class="card-header">New Leave
    <a href="{{URL::previous()}}" class="float-right btn btn-sm btn-warning">Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('storeLeave') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required>
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
      <i class="fas fa-table"></i>All Leave 
      
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50%">SN</th>
              <th width="50%">Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leaves as $key => $leave)
            <tr>
              <td width="50%">{{$key+1}}</td>
              <td width="50%">{{$leave->name}} leave</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
