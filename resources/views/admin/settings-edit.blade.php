@extends('layouts.app')

@section('title', 'Settings')

@section('content')

  @include('partials._nav-admin')

  <div class="container mt-5">

    <div class="row">

      <div class="col-sm-6">
        <h1>{{ Auth::user()->name }}</h1>
        <p>Your Email Address is <strong>{{ Auth::user()->email }}</strong> </p>
      </div>

    </div>
    <hr>
    <form class="" action="{{ route('settings.update', 'Auth::user()->id') }}" method="post">
      {{ csrf_field() }} {{ method_field('PATCH') }}
       <div class="row">
         <div class="col-sm-3">
           <h3>Account</h3>
         </div>

         <div class="col-sm-4">
            <div class="md-form mt-1">
               <input type="text" name="email" value="{{ Auth::user()->email }}">
               <label for="">Email Address</label>
            </div>
         </div>

         <div class="col-sm-4 text-right">
           <button type="submit">Save</button>
         </div>
       </div>
       <hr>

       <div class="row">
          <div class="col-sm-4 offset-md-3">
             <div class="md-form mt-1">
                <input type="text" name="name" value="{{ Auth::user()->name }}">
                <label for="">Name</label>
             </div>
             <div class="md-form">
                <input type="text" name="profession" value="{{ Auth::user()->profession }}">
                <label for="">Title</label>
             </div>
             <div class="md-form">
                <input type="text" name="address" value="{{ Auth::user()->address }}">
                <label for="">Address</label>
             </div>
             <div class="md-form">
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                <label for="">Phone number</label>
             </div>
          </div>
       </div>
    </form>
    <hr>

  </div>

@endsection
