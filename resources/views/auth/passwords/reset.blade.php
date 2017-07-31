@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-5">
                <div class="card-block">
                  <div class="form-header bg-primary">Reset Password</div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="md-form{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                          <label for="email" class=" form-label">E-Mail Address</label>
                          @if ($errors->has('email'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form{{ $errors->has('password') ? ' has-danger' : '' }}">
                          <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>
                          <label for="password" class=" form-label">Password</label>
                          @if ($errors->has('password'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          <label for="password-confirm" class="form-label">Confirm Password</label>
                          @if ($errors->has('password_confirmation'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form">
                          <button type="submit" class="btn btn-primary btn-block">
                              Reset Password
                          </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
