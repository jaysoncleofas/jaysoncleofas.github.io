@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<div class="container mt-5">
   <div class="row">
      <div class="col-lg-8 mx-auto">
         <h4>
            <i class="fa fa-user btn btn-primary"></i>
            <strong>{{ $message->name }}</strong>
         </h4>
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
               <p>
                  <i class="fa fa-envelope"></i>
                  {{ $message->email}}</p>
               <p>
                  <i class="fa fa-phone"></i>
                  {{ $message->contactNumber }}</p>
            </div>
            <div class="col-sm-6">
               <p class="float-md-right">
                  <i class="fa fa-clock-o"></i>
                  {{ $message->created_at->toDayDateTimeString() }}</p>
               <p class="float-md-right"></p>
            </div>
         </div>
         <div class="card mb-2">
            <div class="card-block">
               <p>
                  <strong>Subject:</strong>
                  <span class="teal-text">{{ $message->subject }}</span>
               </p>
               <p class="mt-1 text-justify">
                  <strong>Message:</strong>
                  "{{ $message->message }}"</p>
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
