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
            Attach leave to grade
            <a href="{{URL::previous()}}" class="float-right btn btn-sm btn-warning">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('storeattach') }}">
                @csrf
                <div class="form-group row">
                    <label for="grade_level" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

                    <div class="col-md-6">
                        <select name="grade_id" id="grade_level" class="form-control" required>
                            <option value="">Select grade</option>
                            @foreach($grades as $grade)
                            <option value="{{$grade->id}}">{{$grade->name}}-level {{$grade->level}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="leave" class="col-md-4 col-form-label text-md-right">{{ __('Leave') }}</label>

                    <div class="col-md-6">
                    <select name="leave_id" id="leave" class="form-control" required>
                            <option value="">Select leave</option>
                            @foreach($leaves as $leave)
                            <option value="{{$leave->id}}">{{$leave->name}} leave</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Working Days') }}</label>

                    <div class="col-md-6">
                        <input id="days" type="text" class="form-control" name="days" placeholder="Enter days" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Attach') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
