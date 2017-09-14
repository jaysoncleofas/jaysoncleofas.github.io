<div class="container">
  <section id="skills" class="pt-5 pb-3">
    <h2 class="h2-responsive section-heading text-center pb-2 wow bounceInDown">What i do?</h2>
    <p class="text-center pb-2 wow bounceInDown">Main tools and technologies I use.</p>

    <!-- First row -->
				<div class="row text-center wow fadeIn" data-wow-delay="1s">

					@foreach ($skills as $skill)
          <div class="col-sm-3 mb-2">

            <img src="{{ asset('images/' . $skill->image) }}" class="img-fluid" style="" alt="">

            <!-- <ul class="list-group z-depth-0 pb-3">
              {{ $skill->skill }}
            </ul> -->
            <p class="text-center grey-text mb-2 mt-1">{{ strtoupper($skill->skill) }}</p>

          </div>
					@endforeach

				</div>
			<!-- /.First row -->
  </section>
</div>

<!--Mask-->
{{-- <div class="view hm-black-light skills-title">
    <div class="full-bg-img flex-center smooth-scroll">
      <div class="white-text text-center">
        <h3 class="h3-responsive intro-heading wow lightSpeedIn mb-2"><i class="fa fa-quote-left" aria-hidden="true"></i>
          Good software, like wine, takes time.
        <i class="fa fa-quote-right" aria-hidden="true"></i></h3>
        <h6 class="h6-responsive text-center font-italic wow lightSpeedIn" data-wow-delay="0.2s">~ JOEL SPOLSKY</h6>
      </div>
    </div>
</div> --}}
<!--/.Mask-->
