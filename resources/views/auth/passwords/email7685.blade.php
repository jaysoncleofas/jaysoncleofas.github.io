@extends('layouts.app')

@section('title', 'Request Password link')

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="md-form{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                          <label for="email" class="form-label">E-Mail Address</label>
                          @if ($errors->has('email'))
                              <span class="text-danger">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="md-form">
                          <button type="submit" class="btn btn-primary btn-block">
                              Send Password Reset Link
                          </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
