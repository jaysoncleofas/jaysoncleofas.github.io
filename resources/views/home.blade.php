@extends('layouts.app')

@section('title', 'Home')

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
                  <h3>{{ $messages->count() }}</h3>
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
              <a href="{{ route('skills') }}" class="btn btn-link btn-block">Update</a>
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
        <div class="card mb-5">
          <div class="card-header white-text bg-primary">
            Recent messages
          </div>
          <div class="card-block">
            <table class="table table-hover">
              <tbody>
                @foreach ($messages as $message)
                  <tr>
                    <td>{{ $message->firstname . ' ' . $message->lastname }}</td>
                    <td><a href="{{ route('messages.show', $message->id) }}">{{ substr($message->message, 0, 25) }}{{ strlen($message->message) > 25 ? "..." : "" }}</a></td>
                    <td><i class="fa fa-clock-o"></i> {{ $message->created_at->diffforHumans() }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
