@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-admin')

  @if ($flash = session('message'))
    <div id="flash-message" class="alert alert-success">
      {{ $flash }}
    </div>
  @endif

<div class="container mt-5">
  <div class="card mb-2">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="h4-responsive mt-1 ml-4">List of projects
          <a href="{{ route('projects.index') }}" data-toggle="tooltip" data-placement="top" title="List view">
            <i class="fa fa-list-alt"></i>
          </a>
          <a href="">
            <i class="fa fa-table" data-toggle="tooltip" data-placement="top" title="Table view"></i>
          </a>
        </h4>
      </div>
      <div class="col-md-6 text-sm-right">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
          <i class="fa fa-plus"></i> New Project
        </a>
      </div>
    </div>
  </div>

    <div class="row">

      <div class="col-lg-12 mx-auto">
        <div class="card">
          <div class="card-block">



            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="primary-color white-text">
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>By</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $project)
                  <tr>
                      <td>{{ $project->id }}</td>
                      <td>{{ $project->title }}</td>
                      <td>{{ substr($project->body, 0, 50) }}{{ strlen($project->body) > 50 ? "..." : "" }}</td>
                      <td>{{ $project->user->name }}</td>
                      <td>{{ $project->created_at->toFormattedDateString()}}</td>
                      <td>
                        <a href="#" class="teal-text mr-2"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="red-text"><i class="fa fa-times"></i></a>
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

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

@endsection
