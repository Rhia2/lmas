@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
@if ($errors)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors }}</strong>
    </span>
@endif
  <div class="card card-primary mb-3">
    <div class="card-header">New Leave Request
    <a href="{{URL::previous()}}" class="float-right btn btn-sm btn-warning">Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('storeLeaveReq') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Leave type') }}</label>

                <div class="col-md-6">
                    <select name="leave_id" id="name" class="form-control" required>
                        <option value="">Select Leave type</option>
                        @foreach($leaves as $leave)
                        <option value="{{$leave->id}}">{{$leave->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control" name="end_date" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resumption_date" class="col-md-4 col-form-label text-md-right">{{ __('Resumption Date') }}</label>

                            <div class="col-md-6">
                                <input id="resumption_date" type="date" class="form-control" name="resumption_date" required autofocus>
                            </div>
                        </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Request') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection
