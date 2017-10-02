<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}
   @yield('title')</title>
<!-- Styles -->
<link href="{{ asset('MDB/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('MDB/css/mdb.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- font-awesome --}}
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

@yield('stylesheet')
