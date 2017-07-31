@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-admin')

<div class="container mt-5">

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h3><i class="fa fa-user btn btn-primary"></i> <strong>{{ $message->firstname }} {{ $message->lastname }}</strong></h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <p class="float-right"></p>
      </div>
      <div class="col-lg-8">
        <div class="row">
          <div class="col-sm-6">
            <p>Email Address: <strong>{{ $message->email}}</strong></p>
            <p>Phone: <strong>{{ $message->phone_number }}</strong></p>
          </div>
          <div class="col-sm-6">
            <p class="float-md-right">{{ $message->created_at->toDayDateTimeString() }} {{ $message->created_at->diffforHumans() }}</p>
            <p class="float-md-right"></p>
          </div>
        </div>
        <div class="card mb-2">
          <div class="card-block">
            <strong>Message:</strong>
            <p class="mt-1">"{{ $message->message }}"</p>
          </div>
        </div>
        <a href="{{ URL::previous() }}" class="btn btn-unique">Back</a>
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
