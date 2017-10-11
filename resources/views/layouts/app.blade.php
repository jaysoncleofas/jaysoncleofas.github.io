<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      @include('partials._header')
      @yield('stylesheets')
   </head>
   <body>
      <div id="app">
        @include('partials._nav')
         @yield('content')
      </div>
      <!-- Scripts -->
      @include('partials._javascripts')
      @yield('scripts')
   </body>
</html>
