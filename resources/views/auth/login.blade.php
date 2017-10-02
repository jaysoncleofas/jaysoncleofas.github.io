@extends('layouts.app')

@section('title', '| Login')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-5 mx-auto">
         <div class="card mt-5">
            <div class="card-block">
               <div class="form-header bg-primary">Login</div>
               <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}" data-parsley-validate>
                  {{ csrf_field() }}
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
                     <input id="password" type="password" class="form-control" name="password" required>
                     <label for="password" class="form-label">Password</label>
                     @if ($errors->has('password'))
                     <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="md-form mb-5">
                     <div class="checkbox">
                        <label>
                           <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                           Remember Me
                        </label>
                     </div>
                  </div>
                  <div class="md-form text-center">
                     <button type="submit" class="btn btn-primary btn-block">
                        Signin
                     </button>
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                     </a>
                     <a class="btn btn-link" href="{{ route('register') }}">
                        Register
                     </a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
<script type="text/javascript">
   $('form').parsley();
</script>
@endsection
