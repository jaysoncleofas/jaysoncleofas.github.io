@extends('layouts.app')

@section('title', 'Skills')

@section('content')

  @include('partials._nav-admin')

<br>
<div class="container mt-5">
    <div class="row">
      <div class="col-lg-3">

        <div class="card-body">
          <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addskills" name="button">
            <i class="fa fa-plus"></i> New Skill
          </button>
          <div class="mt-2">

            <small>Skills categories:</small>
            <div class="list-group z-depth-0 pb-3">
              @foreach ($archives as $category)
  							<a href="/skills/?category={{ $category['category'] }}" class="list-group-item justify-content-between">

                  <i class="fa fa-circle skills-cat green-text"></i>
                  {{ $category['category'] }}
                  <span class="badge badge-primary float-right">{{ $category['total'] }}</span>

                </a>
              @endforeach
              <a href="/skills" class="list-group-item justify-content-between">

                <i class="fa fa-circle skills-cat green-text"></i>
                All
                <span class="badge badge-primary float-right">{{ $all->count() }}</span>

              </a>
              @if (Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif

              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    {{ $error }}
                  @endforeach
                </div>
              @endif
			</div>
          </div>
        </div>
        <!-- Central Modal Medium Info -->
        <div class="modal fade" id="addskills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Add New Skill</p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <form method="post" action="{{ route('skills.store') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="md-form {{ $errors->has('skill') ? 'has-danger' : '' }}">
                          <input type="text" class="form-control" name="skill" value="{{ old('skill') }}" required="">
                          <label for="">Skill</label>
                          @if ($errors->has('skill'))
                            <span class="text-danger">
                              <strong>{{ $errors->first('skill') }}</strong>
                            </span>
                          @endif
                        </div>

                        <div class="md-form {{ $errors->has('category') ? 'has-danger' : '' }}">
                          <input type="text" class="form-control" name="category" value="{{ old('category') }}" required="">
                          <label for="">Category</label>
                          @if ($errors->has('category'))
                            <span class="text-danger">
                              <strong>{{ $errors->first('category') }}</strong>
                            </span>
                          @endif
                        </div>

                        <button type="submit" class="btn btn-primary" name="button">Add</button>

                      </form>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="card">
          <div class="card-block">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="primary-color white-text">
                  <tr>
                    <th>#</th>
                    <th>Skills</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($skills as $skill)
                  <tr>
                      <td scope="row">{{ $skill->id }}</td>
                      <td>{{ $skill->skill }}</td>
                      <td>{{ $skill->category }}</td>
                      <td>{{ $skill->created_at->toFormattedDateString()}}</td>
                      <td>
                        <a href="#" class="teal-text mr-2">
                            <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                        </a>
                        <a href="#" class="red-text">
                            <i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                        </a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
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

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

  </script>

@endsection
