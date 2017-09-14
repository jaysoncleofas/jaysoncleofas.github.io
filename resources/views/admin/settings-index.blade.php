@extends('layouts.app')

@section('title', 'Settings')

@section('stylesheets')
   <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
  <script>tinymce.init({ selector:'textarea', plugins:'link', height:150 });</script>
@endsection

@section('content')

  @include('partials._nav-admin')

  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
          <div class="card my-2">
            <div class="card-up">
              <div class="card-header info-color text-center">
                <h4 class="white-text">Update Profile Picture</h4>
              </div>
            </div>
            <div class="card-block text-center">
              <img src="../img/ok.jpg" alt="My photo" class="img-fluid z-depth-2 wow slideInLeft my-2 mx-auto" style="height:160px;">

              <button class="btn btn-primary waves-effect waves-light" type="button" name="button">Upload new photo</button>
              <br>
              <button class="btn btn-danger waves-effect waves-light" type="button" name="button">DELETE</button>
            </div>
          </div>

          <div class="list-group">
            <a href="#" id class="list-group-item d-flex justify-content-between align-items-center active" data-toggle="modal" data-target="#change_password">
              Change Password
              <i class="fa fa-chevron-right"></i>
            </a>
          </div>
          <!-- Central Modal Medium Info -->
          <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-notify modal-info" role="document">
                <form class="" action="{{ route('settings.update', $user->id) }}" method="post" data-parsley-validate>
                  {{ csrf_field() }}{{ method_field('PATCH') }}
                  <div class="modal-content">
                      <div class="modal-header">
                          <p class="heading lead">Change Password</p>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" class="white-text">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="text-center">
                            <div class="md-form form-sm {{ $errors->has('password') ? 'has-danger' : '' }}">
                              <input type="text" name="password" value="" class="form-control">
                              <label for="">Current Password</label>
                              @if ($errors->has('password'))
                                <span class="text-danger">
                                  <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                            </div>
                            <div class="md-form form-sm {{ $errors->has('new_password') ? 'has-danger' : '' }}">
                              <input id="password" type="text" name="new_password" value="" class="form-control">
                              <label for="">New Password</label>
                              @if ($errors->has('new_password'))
                                <span class="text-danger">
                                  <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                            </div>
                            <div class="md-form form-sm">
                              <input id="password-confirm" type="text" name="password_confirmation" value="" class="form-control">
                              <label for="">Confirm Password</label>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card mt-2 mb-2">
            <div class="card-up">
              <i class="fa fa-users indigo"></i>
              <div class="data">
                <h5>User Profile</h5>
              </div>
            </div>
            <div class="card-block">
              @if (Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif
              @if (Session::has('error'))
                <div class="alert alert-danger">
                  {{ Session::get('error') }}
                </div>
              @endif
              <form class="" action="{{ route('settings.update', $user->id) }}" method="post" data-parsley-validate>
                {{ csrf_field() }}{{ method_field('PATCH') }}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="md-form {{ $errors->has('name') ? 'has-danger' : '' }}">
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                      <label for="">Name</label>
                      @if ($errors->has('name'))
                          <span class="text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="md-form {{ $errors->has('email') ? 'has-danger' : '' }}">
                      <input type="text" name="email" value="{{ $user->email }}" class="form-control" required>
                      <label for="">Email</label>
                      @if ($errors->has('email'))
                        <span class="text-danger">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="text-muted text-left">About Me</h4>
                    <div class="md-form mt-2">
                      <textarea name="about" value="{{ $user->about }}" class="md-textarea">{{ $user->about }}</textarea>
                      <label for=""></label>
                    </div>
                  </div>
                  <div class="col-sm-6 ml-auto">
                    <button class="btn btn-success btn-block" type="submit" name="button">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection

@section('scripts')

  <script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $('form').parsley();
  </script>

@endsection



<!-- <div class="row">
  <div class="col-sm-6">
    <h1>{{ ucwords(Auth::user()->name) }}</h1>
    <p>Your Email Address is <strong>{{ Auth::user()->email }}</strong> </p>
  </div>

</div>
<hr>
<div class="row">

  <div class="col-sm-3">
    <h3>Account</h3>
  </div>
  <div class="col-sm-4">
    <p>Email Addess</p>
    <p>{{ Auth::user()->email }}</p>
  </div>
  <div class="col-sm-4">
  </div>
  <div class="col-sm-1">
    <a href="{{ route('settings.edit', $user->id) }}">Edit</a>
  </div>

</div>
<hr>
<div class="row">

  <div class="col-sm-3">
    <h3>Security</h3>
  </div>
  <div class="col-sm-4">
    <p>Password</p>
    <a href="#">Change Password...</a>
  </div>

</div> -->
