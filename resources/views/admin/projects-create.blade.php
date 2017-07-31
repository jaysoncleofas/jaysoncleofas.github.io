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
            <h4 class="h4-responsive mt-1">Create new project</h4>
          </div>
          <div class="col-md-6">
            <div class="text-md-right">
              <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>

        <form action="{{ route('projects.store') }}" method="post" data-parsley-validate>
          {{ csrf_field() }}
          <div class="card mb-2 mt-1">
            <div class="card-block">
              <div class="md-form {{ $errors->has('title') ? 'has-danger' : '' }}">
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required="">
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
                <textarea name="body" name="body" class="md-textarea" rows="8" cols="80" value="{{ old('body') }}" required=""></textarea>
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
               <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" required="">
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
            <button type="submit" name="button" class="btn btn-primary">Save</button>
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
