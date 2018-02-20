@extends('layouts.app')

@section('title', 'Projects')

@section('stylesheets')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
@include('partials._nav-admin')
<div class="container mt-5">
   <div class="row">
      <div class="col-lg-12 mx-auto">
         <div class="card mb-2">
            <div class="card-block">
               <div class="row">
                  <div class="col-sm-6 mt-1">
                     <h4 class="h4-responsive">List of projects</h4>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="{{ route('projects.create') }}" class="btn btn-md btn-primary mb-1">
                        <i class="fa fa-plus"></i>
                        New Project
                     </a>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                        <tr class="primary-color white-text">
                           <th>#</th>
                           <th>Title</th>
                           <th>Image</th>
                           <th>Body</th>
                           <th>Date</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($projects as $project)
                        <tr>
                           <td>{{ $number++ }}</td>
                           <td>
                              <a href="{{ route('projects.edit', $project->id) }}" class="teal-text">
                                 {{ substr($project->title, 0, 20) }}
                                 {{ strlen($project->title) > 20 ? "..." : "" }}
                              </a>
                           </td>
                           <td><img src="{{ asset('images/'.$project->image) }}" alt="" class="img-thumbnail" style="width:100px;"></td>
                           <td><img src="{{ asset($project->image) }}" alt="" class="img-thumbnail" style="width:100px;"></td>
                           <td>{{ substr(strip_tags($project->body), 0, 50) }}{{ strlen($project->body) > 50 ? "..." : "" }}</td>
                           <td>{{ $project->created_at->toFormattedDateString()}}</td>
                           <td>
                              <form class="" action="{{ route('projects.destroy', $project->id) }}" method="post">
                                 {{ csrf_field() }}{{ method_field('DELETE') }}
                                 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
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
                  {{ $projects->links('vendor.pagination.bootstrap-4') }}
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
   // Tooltips Initialization
   $(function () {
      $('[data-toggle="tooltip"]').tooltip()
   })
</script>
@include('partials._notifications')
@endsection
