<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      @include('partials._header') @yield('stylesheets')
   </head>
   <body>
      <div id="app">
         @yield('content')
      </div>
      <!-- Scripts -->
      @include('partials._javascripts') @yield('scripts')
   </body>
</html>
