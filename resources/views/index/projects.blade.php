<div class="container">
   <section id="projects" class="pt-5 pb-5">
      <h2 class="h2-responsive section-heading text-center mb-2 wow fadeIn" data-wow-delay="0.2s">What i did?</h2>
<<<<<<< HEAD
      <p class="text-center wow fadeIn" data-wow-delay="0.2s">Projects that I created and some projects I contribute with.</p>
=======
      <p class="text-center wow fadeIn" data-wow-delay="0.2s">Projects I've made and some projects that I'm working with.</p>
>>>>>>> 13cc8714f682675f7549a3ee7b00a6e8498a38a9
      @foreach ($projects as $project)
      <hr class="mb-3 mt-2">
      <div class="row wow fadeIn" data-wow-delay="0.2s">
         <div class="col-sm-7">
            <div class="view overlay hm-teal-slight z-depth-1 mb-2">
<<<<<<< HEAD
               <img src="{{ asset('images/'.$project->image) }}" class="img-fluid" alt="">
=======
               <img src="{{ asset($project->image) }}" class="img-fluid" alt="">
>>>>>>> 13cc8714f682675f7549a3ee7b00a6e8498a38a9
               <a href="{{ url('portfolio/'.$project->title) }}">
                  <div class="mask waves-effect waves-light flex-center">
                     <p class=""></p>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-sm-5">
            <h4 class="h4-responsive">
               <a href="{{ url('portfolio/' . $project->title) }}">{{ strtoupper($project->title) }}</a>
            </h4>
            <p class="my-2">{{ substr(strip_tags($project->body), 0, 200) }}{{ strlen($project->body) > 200 ? "..." : "" }}</p>
            <p>
               <i class="fa fa-clock-o"></i>
               {{ $project->created_at->toFormattedDateString() }}</p>
            <a href="{{ url('portfolio/'.$project->title) }}" class="btn btn-primary">Read more</a>
         </div>
      </div>
      @endforeach
   </section>
</div>
