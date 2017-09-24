@extends('layouts.app')

@section('title', 'Home')

@section('stylesheets')
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/fh-3.1.2/r-2.1.1/sc-1.4.2/datatables.min.css"/> -->
@endsection


@section('content')

  @include('partials._nav-admin')

<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
          <div class="card mt-2 mb-2">
            <div class="card-up">
              <i class="fa fa-comments indigo"></i>
              <div class="card-data">
                <p>Message</p>
                  <h3>{{ $messages->total() }}</h3>
              </div>
            </div>
            <div class="card-block">
              <hr>
              <a href="{{ route('messages.index') }}" class="btn btn-link btn-block">Show all</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mt-2 mb-2">
            <div class="card-up">
              <i class="fa fa-tasks orange"></i>
              <div class="card-data">
                <p>Skills</p>
                <h3>{{ $skill->count() }}</h3>
              </div>
            </div>
            <div class="card-block">
              <hr>
              <a href="{{ route('skills.index') }}" class="btn btn-link btn-block">Update</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mt-2 mb-2">
            <div class="card-up">
              <i class="fa fa-folder-open purple"></i>
              <div class="card-data">
                <p>Projects</p>
                <h3>{{ $projects->count() }}</h3>
              </div>
            </div>
            <div class="card-block">
              <hr>
              <a href="{{ route('projects.index') }}" class="btn btn-link btn-block">Update</a>
            </div>
          </div>
       </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="list-group mb-5">
          <a href="#" class="list-group-item active">Recent messages</a>
          @foreach ($messages as $message)
          <a href="{{ route('messages.show', $message->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">

            <div class="d-flex w-100 justify-content-between">
              <h5 class="">
                <strong>{{ ucfirst($message->name) }}</strong>
              </h5>
              <small class="text-muted">{{ $message->created_at->diffforHumans() }}</small>
            </div>
            <p class="teal-text">
               {{ substr($message->message, 0, 64) }}{{ strlen($message->message) > 25 ? "..." : "" }}
             </p>
          </a>
          @endforeach
          <div class="mt-1 mx-3">
            <div class="float-right">
              {{ $messages->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


@section('scripts')
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/fh-3.1.2/r-2.1.1/sc-1.4.2/datatables.min.js"></script>

  <script type="text/javascript">
  $(function() {
        $('#messages-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: 'http://localhost:8000/home/datatables',
            columns: [

            {data: 'firstname', name: 'firstname'},
            // {data: 'message', name: 'message'},
            // {data: 'updated_at', name: 'updated_at'}
        ]
        });
    });
  </script> -->
@endsection
