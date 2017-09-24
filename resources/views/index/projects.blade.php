<div class="container">
  <section id="projects" class="pt-5 pb-5">
    <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">What i did?</h2>
    <p class="text-center wow bounceInDown">Projects that I created and some projects I contribute with.</p>
    @foreach ($projects as $project)
    <div class="row my-3">
      <div class="col-sm-6">
        <div class="view overlay hm-blue-slight z-depth-1">
            <img src="{{ asset('images/' . $project->image) }}" class="img-fluid" alt="">
            <a href="{{ url('portfolio/'.$project->title) }}">
                <div class="mask waves-effect waves-light flex-center">
                  <p class=""></p>
                </div>
            </a>
        </div>
      </div>
      <div class="col-sm-6">
        <h4 class="h4-responsive teal-text mt-2">{{ strtoupper($project->title) }}</h4>
        <p>{{ substr(strip_tags($project->body), 0, 200) }}{{ strlen($project->body) > 200 ? "..." : "" }}</p>
        <p><i class="fa fa-clock-o"></i> {{ $project->created_at->toDateString() }}</p>
        <a href="{{ url('portfolio/'.$project->title) }}" class="btn btn-sm btn-primary">Read more</a>
        <!-- <div class="mb-2">
           @foreach ($project->skills as $skill)
              <span class="btn btn-sm btn-primary">{{ $skill->skill }}</span>
           @endforeach
        </div> -->
      </div>
    </div>
    <hr>
    @endforeach
  </section>
</div>

  <!-- <div class="row wow fadeIn" data-wow-delay=".5s">
    @foreach ($projects as $project)
    <div class="col-lg-6 mb-2">
      <div class="card mb-2">
          <div class="view overlay hm-blue-slight">
              <img src="{{ asset('images/' . $project->image) }}" class="img-fluid" alt="">
              <a href="{{ url('portfolio/'.$project->title) }}">
                  <div class="mask waves-effect waves-light flex-center">
                    <p class="btn btn-primary">Read more</p>
                  </div>
              </a>
          </div>
          <div class="card-body">
            <p class="ml-3 mt-1">{{ strtoupper($project->title) }}</p>
            <hr>
            <div class="mb-2 ml-3">
               @foreach ($project->skills as $skill)
                  <span class="btn btn-sm btn-primary">{{ $skill->skill }}</span>
               @endforeach
            </div>
          </div>
      </div>>
    </div>
    @endforeach
  </div> -->
