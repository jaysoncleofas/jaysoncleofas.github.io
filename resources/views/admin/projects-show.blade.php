@extends('layouts.app')

@section('title', 'Projects')

@section('content')

@include('partials._nav-projects')
<div class="container">
   <section id="projects" class="pt-5 pb-3">
      <div class="row wow fadeIn mt-3" data-wow-delay="1s">
         <div class="col-lg-8 mb-2 mx-auto">
<<<<<<< HEAD
            <img src="{{ asset('images/'. $project->image) }}" class="img-fluid z-depth-2" style="height:auto;">
=======
            <img src="{{ asset($project->image) }}" class="img-fluid z-depth-2" style="height:auto;">
>>>>>>> 13cc8714f682675f7549a3ee7b00a6e8498a38a9
            <h2 class="h2-responsive mt-3 mb-2 wow bounceInDown">{{ $project->title }}</h2>
            <p class="text-justify">{!! $project->body !!}</p>
            <div class="mt-4 ">
               <p class="lead">Tags: @foreach ($project->skills as $skill)
                  <span class="btn btn-sm btn-primary">{{ $skill->skill }}</span>
                  @endforeach
               </p>
            </div>
            <hr>
            <a href="/#projects" class="btn btn-danger">Back</a>
         </div>
      </div>
   </section>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
   $('form').parsley();
</script>
@endsection
