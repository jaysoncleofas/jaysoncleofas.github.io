@extends('layouts.app')
@section('stylesheets')
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
<style>
   .g-recaptcha div {
      margin-left: auto;
      margin-right: auto;
   }
   @media (max-width: 740px) {
      .full-height,
      .full-height body,
      .full-height header,
      .full-height header .view {
         height: 700px;
      }
   }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

@include('partials._nav')
<main>
   @include('index.hero')
   @include('index.about')
   @include('index.skills')
   @include('index.projects')
   @include('index.contact')
   @include('partials._footer')
   <!-- Scrollspy -->
   <div class="dotted-scrollspy hidden-sm-down">
      <ul class="nav smooth-scroll d-flex flex-column">
         <li class="nav-item">
            <a class="nav-link" href="#home">
               <span></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#about">
               <span></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#skills">
               <span></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#projects">
               <span></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#contact">
               <span></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#footer">
               <span></span>
            </a>
         </li>
      </ul>
   </div>
</main>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
   new WOW().init();

   $('body').scrollspy({target: '.dotted-scrollspy'});

   $(".smooth-scroll").on("click", "a", function (e) {
      e.preventDefault();
      var t = $(this).attr("href"),
         n = $(this).attr("data-offset")
            ? $(this).attr("data-offset")
            : 0;
      $("body,html").animate({
         scrollTop: $(t).offset().top - n
      }, 700)
   });

   $('form').parsley();

   $(function () {
      $('#form').submit(function (event) {
         var verified = grecaptcha.getResponse();
         if (verified.length === 0) {
            event.preventDefault();
         }
      });
   });

   $('.carousel').carousel({interval: false});
</script>
@endsection
