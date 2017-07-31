@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-5">
                <div class="card-block">
                  <div class="form-header bg-primary">Register</div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="md-form{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                          <label for="name" class="form-label">Name</label>
                          @if ($errors->has('name'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                          <label for="email" class="form-label">E-Mail Address</label>
                          @if ($errors->has('email'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form{{ $errors->has('password') ? ' has-danger' : '' }}">
                          <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>
                          <label for="password" class="form-label">Password</label>
                          @if ($errors->has('password'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          <label for="password-confirm" class="form-label">Confirm Password</label>
                        </div>

                        <div class="md-form text-sm-center">
                          <button type="submit" class="btn btn-primary btn-block">
                              Register
                          </button>
                          <a href="{{ route('login') }}" class="btn btn-link">Already have an Account?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
