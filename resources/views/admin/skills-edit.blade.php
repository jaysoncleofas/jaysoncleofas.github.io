@extends('layouts.app')

@section('title', 'Skills')

@section('stylesheets')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')

<br>
<div class="container mt-5">
   <div class="row">
      <div class="col-lg-6 mx-auto">
         <div class="card my-2">
            <div class="card-block">
               <div class="form-header red">
                  EDIT FORM
               </div>
               <form class="" action="{{ route('skills.update', $skill->id) }}" enctype="multipart/form-data" method="post" data-parsley-validate>
                  {{ csrf_field() }}{{ method_field('PATCH') }}
                  <div class="md-form {{ $errors->has('skill') ? 'has-danger' : '' }}">
                     <input type="text" name="skill" class="form-control" value="{{ $skill->skill }}" required>
                     <label for="">Skill</label>
                     @if ($errors->has('skill'))
                     <span class="text-danger">
                        <strong>{{ $errors->first('skill') }}</strong>
                     </span>
                     @endif
                  </div>
                  <p>Image:</p>
                  <div class="md-form {{ $errors->has('image') ? 'has-danger' : '' }}">
                     <input type="file" name="image" value="{{ $skill->image }}" class="form-control">
                     @if ($errors->has('image'))
                     <span class="text-danger">
                        <strong>{{ $errors->first('image') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="float-right">
                     <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
                     <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addskills" name="button">
                        <i class="fa fa-edit"></i>
                        Update Skill</button>
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
   $(function () {
      $('[data-toggle="tooltip"]').tooltip()
   });
</script>
@include('partials._notifications')
@endsection
