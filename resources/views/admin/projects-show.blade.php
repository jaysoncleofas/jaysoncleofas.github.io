@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-projects')

  <div class="container">
    <section id="projects" class="pt-5 pb-3">

      <!-- First row -->
        <div class="row wow fadeIn mt-3" data-wow-delay="1s">

				<div class="col-lg-8 mb-2 mx-auto">
               <img src="{{ asset('images/' . $project->image) }}" class="img-fluid z-depth-2" style="height:auto;">
               <h2 class="h2-responsive mt-3 mb-2 wow bounceInDown">{{ $project->title }}</h2>
               <p class="text-justify">{!! $project->body !!}</p>

               <div class="mt-4 d-flex justify-content-end">
                  @foreach ($project->skills as $skill)
                     <span class="btn btn-sm btn-primary float-right">{{ $skill->skill }}</span>
                  @endforeach
               </div>

               <hr>
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
