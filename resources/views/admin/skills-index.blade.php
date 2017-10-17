@extends('layouts.app')

@section('title', 'Skills')

@section('stylesheets')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
@include('partials._nav-admin')
<br>
<div class="container mt-5">
   <div class="row">
      <div class="col-lg-4">
         <div class="card my-2">
            <div class="card-block">
               <div class="form-header red">
                  SKILL FORM
               </div>
               <form class="" action="{{ route('skills.store') }}" enctype="multipart/form-data" method="post" data-parsley-validate>
                  {{ csrf_field() }}
                  <div class="md-form {{ $errors->has('skill') ? 'has-danger' : '' }}">
                     <input type="text" name="skill" class="form-control" value="{{ old('skill') }}" required>
                     <label for="">Skill</label>
                     @if ($errors->has('skill'))
                     <span class="text-danger">
                        <strong>{{ $errors->first('skill') }}</strong>
                     </span>
                     @endif
                  </div>
                  <p>Image:</p>
                  <div class="md-form {{ $errors->has('image') ? 'has-danger' : '' }}">
                     <input type="file" name="image" value="" class="form-control">
                     @if ($errors->has('image'))
                     <span class="text-danger">
                        <strong>{{ $errors->first('image') }}</strong>
                     </span>
                     @endif
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addskills" name="button">
                     <i class="fa fa-plus"></i>
                     New Skill</button>
               </form>
            </div>
         </div>
      </div>
      <div class="col-lg-8">
         <div class="card mb-5">
            <div class="card-block">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead class="primary-color white-text">
                        <tr>
                           <th>#</th>
                           <th>Skills</th>
                           <th>Image</th>
                           <th>Date</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($skill as $skills)
                        <tr>
                           <td scope="row">{{ $number++ }}</td>
                           <td class="teal-text">{{ $skills->skill }}</td>
                           <td><img src="{{ asset($skills->image) }}" alt="" class="img-thumbnail" style="width:100px;"></td>
                           <td>{{ $skills->created_at->toFormattedDateString()}}</td>
                           <td>
                              <form class="" action="{{ route('skills.destroy', $skills->id) }}" method="post">
                                 {{ csrf_field() }}{{ method_field('DELETE') }}
                                 <a href="{{ route('skills.edit', $skills->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                 </a>
                                 <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa fa-times"></i>
                                 </button>
                              </form>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <hr>
               <div class="float-right">
                  {{ $skill->links('vendor.pagination.bootstrap-4') }}
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
   $(function () {
      $('[data-toggle="tooltip"]').tooltip()
   });
</script>

@include('partials._notifications')

@endsection
