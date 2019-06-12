@extends('layouts.app')

@section('content')
<style>
    #listResults .checkbox label::before {
        background-color: white;
        border: solid 1px grey;
        border-radius: 0px !important;
    }
    #listResults .checkbox input[type="checkbox"]:checked + label::after{
        background-color:green;
    }

    .custom-checkbox label{
        font-size:16px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Staff') }} 
                    <a href="{{route('staff')}}" class="btn btn-sm btn-primary">All staff</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('staff/add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staff_grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

                            <div class="col-md-6">
                                <select name="staff_grade" id="staff_grade" class="form-control" required>
                                    <option value="">Select Grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}-level {{$grade->level}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="line_manager" class="col-md-4 col-form-label text-md-right">{{ __('Line Manager') }}</label>

                            <div class="col-md-6">
                                <select name="line_manager" id="line_manager" class="form-control" required>
                                    <option value="">Select Line Manager</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->firstname}}-level {{$user->lastname}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Attach Role') }}</label>

                            <div class="col-md-6" id="listResults">
                                                     
                                <div class="row text-muted">
                                    @foreach($roles as $role)
                                        <div class="custom-control custom-radio custom-control-inline mx-3 role">
                                            <input type="radio" class="custom-control-input {{ $errors->has('role') ? ' is-invalid' : '' }}" id="customCheck1_{{ $role->id }}" value="{{$role->id}}" name="role">
                                            <label class="custom-control-label" for="customCheck1_{{ $role->id }}">{{$role->name}}</label>
                                            @if ($errors->has('role'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    @endforeach
                        
                                </div> 
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
        </div>
    </div>
</div>
@endsection
