<div class="container">
  <section id="projects" class="pt-5 pb-3">
    <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">What i did?</h2>
    <p class="text-center pb-2 wow bounceInDown">Projects that I created and some projects I contribute with.</p>

    <!-- First row -->

          <div class="row wow fadeIn" data-wow-delay=".5s">
            @foreach ($projects as $project)
  					<div class="col-lg-6 mb-2">
              <!--Card-->
              <div class="card hoverable">

                  <!--Card image-->
                  <div class="view overlay hm-white-slight hm-zoom">
                      <img src="../img/dashboard.png" class="img-fluid" alt="">
                      <a href="{{ url('portfolio/'.$project->slug) }}">
                          <div class="mask waves-effect waves-light flex-center">
                            <p class="btn btn-primary">View</p>
                          </div>
                      </a>
                  </div>
                  <!--/.Card image-->

                  <!--Card content-->
                  <div class="card-block">
                      <!--Title-->
                      <h6 class="card-title font-weight-bold">{{ $project->title }}</h6>
                      <!--Text-->
                      <p class="card-text">{{ $project->created_at->toFormattedDateString() }}</p>
                  </div>
                  <!--/.Card content-->

              </div>
              <!--/.Card-->

  					</div>
            @endforeach
  				</div>

				<!-- /.First row -->

  </section>
</div>
