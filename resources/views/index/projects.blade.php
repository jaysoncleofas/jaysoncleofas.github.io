<div class="container">
  <section id="projects" class="pt-5 pb-5">
    <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">What i did?</h2>
    <p class="text-center pb-2 wow bounceInDown">Projects that I created and some projects I contribute with.</p>
    <!-- First row -->
      <div class="row wow fadeIn" data-wow-delay=".5s">
        @foreach ($projects as $project)
				<div class="col-lg-6 mb-2">
          <!--Card-->
          <div class="card">
              <!--Card image-->
              <div class="view overlay hm-white-slight">
                  <img src="{{ asset('images/' . $project->image) }}" class="img-fluid" alt="">
                  <a href="{{ url('portfolio/'.$project->title) }}">
                      <div class="mask waves-effect waves-light flex-center">
                        <p class="btn btn-primary">View</p>
                      </div>
                  </a>
              </div>
              <div class="card-body">
                <hr>
                <p class="text-center grey-text mb-2 mt-2">{{ strtoupper($project->title) }}</p>

              </div>
          </div>
          <!--/.Card-->
				</div>
        @endforeach
			</div>
				<!-- /.First row -->
  </section>
</div>
