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
    <div class="row">

      <div class="col-sm-3">
        <h3>Account</h3>
      </div>
      <div class="col-sm-4">
        <p>Email Addess</p>
        <p>{{ Auth::user()->email }}</p>
        <p>Profession</p>
        <p>{{ Auth::user()->profession }}</p>
      </div>
      <div class="col-sm-4">
        <p>Address</p>
        <p>{{ Auth::user()->address }}</p>
        <p>Phone number</p>
        <p>{{ Auth::user()->phone }}</p>
      </div>
      <div class="col-sm-1">
        <a href="{{ route('settings.edit', Auth::user()->id) }}">Edit</a>
      </div>

    </div>
    <hr>
    <div class="row">

      <div class="col-sm-3">
        <h3>Security</h3>
      </div>
      <div class="col-sm-4">
        <p>Password</p>
        <a href="#">Change Password...</a>
      </div>

    </div>

  </div>

@endsection
