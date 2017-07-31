@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-admin')


<div class="container mt-5">
  <div class="card mb-2">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="h4-responsive mt-1 ml-4">List of projects
        </h4>
      </div>
      <div class="col-md-6 text-sm-right">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
          <i class="fa fa-plus"></i> New Project
        </a>
      </div>
    </div>
  </div>

    {{-- @if (Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div> --}}
    {{-- @endif --}}
    @if ($flash = session('message'))
      <div id="flash-messages" class="alert alert-success">
        {{ $flash }}
      </div>
    @endif

    <div class="row">

      {{-- @foreach ($projects as $project)
      <div class="col-md-6 mb-2">
        <div class="card hoverable">

            <div class="card-block">
              <a href="{{ route('projects.edit', $project->id) }}"><strong>{{ $project->title }}</strong></a>
              <p>{{ substr($project->body, 0, 100) }}{{ strlen($project->body) > 100 ? "..." : "" }}</p>
              <img src="../img/dashboard.png" class="z-depth-2" width="220">
              <br>
              <p>Updated on {{ date('M j, Y', strtotime($project->updated_at)) }}</p>
            </div>

        </div>
      </div>
      @endforeach --}}

      <div class="col-lg-12 mx-auto">
        <div class="card mb-2">
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
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $project)
                  <tr>
                      <td>{{ $number++ }}</td>
                      <td>{{ substr($project->title, 0, 20) }} {{ strlen($project->title) > 20 ? "..." : "" }}</td>
                      <td>{{ substr($project->body, 0, 50) }}{{ strlen($project->body) > 50 ? "..." : "" }}</td>
                      <td>{{ $project->user->name }}</td>
                      <td>{{ $project->created_at->toFormattedDateString()}}</td>
                      <td>
                          <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary teal-text" data-toggle="tooltip" data-placement="top" title="Edit">
                              <i class="fa fa-pencil"></i>
                          </a>
                      </td>
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

          </div>
        </div>
              <div class="card">
                 <div class="card-block">
                    {!! $projects->links() !!}
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
