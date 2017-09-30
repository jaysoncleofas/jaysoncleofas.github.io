@extends('layouts.app')

@section('title', 'Projects')

@section('stylesheets')
   <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
   <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
   <script>
        tinymce.init({
          selector:'textarea',
          toolbar:'fontsizeselect',
          fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
          height:300
        });
   </script>
@endsection

@section('content')

  @include('partials._nav-admin')
<br>
<div class="container mt-3">
   <div class="row">
    <div class="col-sm-12">
      <h4 class="h4-responsive mt-1">Create new project</h4>
      <div class="text-md-right">
      </div>
    </div>

   </div>
    <div class="row">
      <div class="col-sm-7">
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
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
          <div class="card mb-2">
            <div class="card-block">
              <p>Body:</p>
              <div class="md-form {{ $errors->has('body') ? 'has-danger' : '' }}">
                <textarea name="body" name="body" class="md-textarea" value="{{ old('body') }}"></textarea>
                @if ($errors->has('body'))
                  <span class="text-danger">
                    <strong>{{ $errors->first('body') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>
      </div>
      <div class="col-sm-5">
         <div class="card mt-1">
            <div class="card-block">
               <p>Image:</p>
              <div class="md-form {{ $errors->has('featured_image') ? 'has-danger' : '' }}">
                 <input type="file" name="featured_image" value="" class="form-control">
                 @if ($errors->has('featured_image'))
                   <span class="text-danger">
                     <strong>{{ $errors->first('featured_image') }}</strong>
                   </span>
                 @endif
              </div>

              <p>Tags:</p>
              <div class="md-form">
                    <select class="multiple-select form-control" multiple="multiple" name="skills[]" required>
                       @foreach ($skills as $skill)
                           <option value="{{ $skill->id }}">{{ $skill->skill }}</option>
                       @endforeach
                   </select>

              </div>
            </div>
         </div>

         <div class="md-form mt-2 float-right">
           <button type="submit" name="button" class="btn btn-primary">Save</button>
           <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
         </div>
      </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

  <script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>
  <script src="{{asset('js/select2.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $('form').parsley();

    $('.multiple-select').select2();
  </script>

@endsection
