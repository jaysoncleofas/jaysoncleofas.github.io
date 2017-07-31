@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-admin')
<br>
<div class="container mt-3">

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="row">
          <div class="col-md-6">
            <h4 class="h4-responsive mt-1">Edit project</h4>
          </div>
        </div>

        <form action="{{ route('projects.update', $project->id) }}" method="post" data-parsley-validate>
          {{ csrf_field() }} {{ method_field('PATCH') }}
          <div class="card mb-2 mt-1">
            <div class="card-block">
              <div class="md-form {{ $errors->has('title') ? 'has-danger' : '' }}">
                <input type="text" class="form-control" name="title" value="{{ $project->title }}"placeholder="" required="">
                <label for="">Title</label>
                @if ($errors->has('title'))
                  <span class="text-danger">
                    <strong>{{ $errors->first('title') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-block">
              <div class="md-form {{ $errors->has('body') ? 'has-danger' : '' }}">
                <textarea name="body" class="md-textarea" rows="10" cols="100" value="{{ $project->body }}" placeholder="" required="">{{ $project->body }}</textarea>
                <label for="">Body</label>
                @if ($errors->has('body'))
                  <span class="text-danger">
                    <strong>{{ $errors->first('body') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>

          <div class="card mb-2 mt-1">
            <div class="card-block">
              <div class="md-form {{ $errors->has('slug') ? 'has-danger' : '' }}">
                <input type="text" class="form-control" name="slug" value="{{ $project->slug }}"placeholder="" required="">
                <label for="">Slug</label>
                @if ($errors->has('slug'))
                  <span class="text-danger">
                    <strong>{{ $errors->first('slug') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>

          <div class="md-form mt-2 float-right">
            <a href="{{ route('projects.index') }}" class="btn btn-primary">Cancel</a>
          </div>
          <div class="md-form mt-2 float-right">
            <button type="submit" name="button" class="btn btn-success">Save Changes</button>
          </div>
        </form>

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
