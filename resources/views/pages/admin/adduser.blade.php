@extends('layouts.app2')
@section('pageTitle','Admin | DMS - Primatech')
@section('tabTitle','ADMIN')
@section('content')
@include('inc.messages')
<div class="container">
    {{-- <div class="row">
        <div class='col-md'>
            <a href='{{ url('/admin') }}' class='btn btn-primary '>&#8656 Go Back</a>
        </div>        
    </div> --}}
    <div class='row'>
        <div class='col-md'>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Add New User') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ url('/users') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                
                                                @if ($errors->has('username'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
            
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                            <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>
                
                                            <div class="col-md-6">
                                                {{-- <input id="admin" type="text" class="form-control{{ $errors->has('admin') ? ' is-invalid' : '' }}" name="admin" value="{{ old('admin') }}" required> --}}
                                                <select id="admin" class="form-control{{ $errors->has('admin') ? ' is-invalid' : '' }}" name="admin" value="{{ old('admin') }}" required>
                                                    <option value="0">NO</option>
                                                    <option value="1">YES</option>
                                                </select>
                                                @if ($errors->has('admin'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('admin') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                            <a href='{{ url('/userslist') }}' class='btn btn-primary '><i class="fas fa-arrow-left"></i> Go Back</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection