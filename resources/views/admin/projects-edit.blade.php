@extends('layouts.app')

@section('title', 'Projects')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
   tinymce.init({
      selector: 'textarea',
      plugins: "link",
      toolbar: [
         'undo redo | styleselect | bold italic | fontsizeselect | fontselect | link', 'alignleft aligncenter alignright'
      ],
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      font_formats: 'Source Sans Pro=Source Sans Pro, Arial=arial,helvetica,sans-serif;Times New Roman=timesnewroman;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n;Verdana=verdana, geneva, sans-serif;',
      height: 300
   });
</script>
@endsection

@section('content')

<br>
<div class="container mt-3">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="h4-responsive mt-1">Edit project</h4>
      </div>
   </div>
   <form action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" method="post" data-parsley-validate>
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="row">
         <div class="col-sm-7">
            <div class="card mb-2 mt-1">
               <div class="card-block">
                  <div class="md-form {{ $errors->has('title') ? 'has-danger' : '' }}">
                     <input type="text" class="form-control" name="title" value="{{ $project->title }}" placeholder="" required="">
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
                  <div class="md-form {{ $errors->has('body') ? 'has-danger' : '' }}">
                     <textarea name="body" class="md-textarea" rows="10" cols="100" value="{{ $project->body }}" placeholder="" required="">{{ $project->body }}</textarea>
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
                  <img src="{{ asset('images/' . $project->image) }}" alt="" class="img-thumbnail img-fluid" style="">
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
               <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
            </div>
            <div class="md-form mt-2 float-right">
               <button type="submit" name="button" class="btn btn-primary">Save Changes</button>
            </div>
         </div>
      </div>
   </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>
<script src="{{asset('js/select2.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
   $('form').parsley();

   $('.multiple-select').select2();

   $('.multiple-select').select2().val({!!$project->skills()->allRelatedIds()!!}).trigger('change');
</script>
@endsection
