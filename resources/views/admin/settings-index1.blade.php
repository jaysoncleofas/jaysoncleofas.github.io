@extends('layouts.app')

@section('title', 'Settings')

@section('tinymce')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({ selector:'textarea', plugins:'link', height:150 });</script>
@endsection

@section('stylesheets')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')

  @include('partials._nav-admin')

  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
            <!-- update-profile-picture -->
            @include('admin.update-profile-pic')

          <div class="list-group mb-2">
            <a href="{{ route('change-password.index') }}" id class="list-group-item d-flex justify-content-between align-items-center active" data-toggle="" data-target="#change_password">
              Change Password
              <i class="fa fa-chevron-right"></i>
            </a>
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
                      <textarea name="about" value="" class="md-textarea">{{ $user->about }}</textarea>
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

  @include('partials._notifications')

@endsection
