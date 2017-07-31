@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-projects')

  <div class="container">
    <section id="projects" class="pt-5 pb-3">
      <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">{{ $project->title }}</h2>

      <!-- First row -->
        <div class="row wow fadeIn" data-wow-delay="1s">

					<div class="col-lg-6 mb-2 mx-auto">
            <img src="../img/dashboard.png" class="img-fluid z-depth-2" style="height:300px;">
            <p class="mt-2">{{ $project->created_at->toDayDateTimeString() }}</p>
            <p>{{ $project->body }}</p>
            <a href="/#projects" class="btn btn-success">Return</a>
					</div>

				</div>
  				<!-- /.First row -->

    </section>
  </div>
@endsection

@section('scripts')

  <script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $('form').parsley();
  </script>

@endsection
