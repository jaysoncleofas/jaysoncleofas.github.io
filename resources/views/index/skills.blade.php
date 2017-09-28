<div class="fluid-container skills_container pb-4">
  <div class="container">
    <section id="skills" class="pt-5 pb-3">
    <h2 class="h2-responsive section-heading text-center pb-2 wow bounceInDown">What i do?</h2>
    <p class="text-center pb-1 wow bounceInDown">Main tools and technologies I use.</p>
      <!-- First row -->
        <div class="row">
          <!--Carousel Wrapper-->
          <div id="carousel-example-2" class="carousel carousel-example-2 slide carousel-fade mx-auto" data-ride="carousel">

              <!--Controls-->
              <div class="controls-top">
                  <a class="btn-floating" href="#carousel-example-2" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                  <a class="btn-floating" href="#carousel-example-2" data-slide="next"><i class="fa fa-chevron-right"></i></a>
              </div>
              <!--/.Controls-->

              <!--Indicators-->
              <ol class="carousel-indicators">
                @foreach( $skills->chunk(4) as $skill )
                  <li data-target="#carousel-example-2" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
               @endforeach
              </ol>
              <!--/.Indicators-->

              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                @foreach( $skills->chunk(4) as $skill )
                   <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                      <div class="row">
                        @foreach( $skill as $data )
                        <div class="col-sm-3 mb-3 mx-auto">
                            <div class="card mt-2">
                                <div class="card-block">
                                  <div class="form-header indigo">
                                    {{ $data->skill }}
                                  </div>
                                  <div class="card-body">
                                      <img class="img-fluid mx-auto" src="{{ asset('images/'. $data->image ) }}" alt="{{ $data->title }}" style="">
                                  </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      </div>
                   </div>
                @endforeach
              </div>
              <!--/.Slides-->

          </div>
          <!--/.Carousel Wrapper-->
  			</div>
  				<!-- /.First row -->
    </section>
  </div>
</div>

{{-- <div class="row">
  @foreach ($skills as $skill)
  <div class="col-sm-4">
    <ul class="list-group z-depth-0">
      <li class="list-group-item flex-column teal-text">
        <img src="{{ asset('images/' . $skill->image) }}" class="img-fluid" style="height:100px;" alt="">
        {{ $skill->skill }}
      </li>
    </ul>
  </div>
  @endforeach
  <!-- @foreach ($skills as $skill)
  <div class="col-lg-3 mb-2">
    <div class="card">
        <div class="view overlay hm-white-slight">
            <img src="{{ asset('images/' . $skill->image) }}" class="img-fluid" alt="">
                <div class="mask waves-effect waves-light flex-center">
                  <p class="btn btn-primary">{{ $skill->skill }}</p>
                </div>
        </div>
    </div>
  </div>
  @endforeach -->
</div> --}}
