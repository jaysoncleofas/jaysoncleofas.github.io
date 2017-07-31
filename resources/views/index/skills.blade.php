<div class="container">
  <section id="skills" class="pt-5 pb-3">
    <h2 class="h2-responsive section-heading text-center pb-2 wow bounceInDown">What i do?</h2>
    <p class="text-center pb-2 wow bounceInDown">Technologies I am using in Web development.</p>

    <!-- First row -->
				<div class="row text-center wow fadeIn" data-wow-delay="1s">

					<div class="col-md-12 col-lg-4 mb-2">

						<i class="fa fa-code deep-orange-text fa-4x" aria-hidden="true"></i>
						<h4 class="lead mt-2 mb-2 text-uppercase">{{ $tags[1]->name }}</h4>
						<ul class="list-group z-depth-0 pb-3">
							@foreach ($dev as $devs)
							  <li class="list-group-item flex-column">{{ $devs->skill }}</li>
							@endforeach
						</ul>

					</div>
					<div class="col-md-12 col-lg-4 mb-2">

						<i class="fa fa-paint-brush green-text fa-4x" aria-hidden="true"></i>
						<h4 class="lead mt-2 mb-2 text-uppercase">{{ $tags[0]->name }}</h4>
						<ul class="list-group z-depth-0 pb-3">
							@foreach ($des as $desi)
							  <li class="list-group-item flex-column">{{ $desi->skill }}</li>
							@endforeach
						</ul>

					</div>
					<div class="col-md-12 col-lg-4 mb-2">

						<i class="fa fa-wrench blue-text fa-4x" aria-hidden="true"></i>
						<h4 class="lead mt-2 mb-2 text-uppercase">{{ $tags[2]->name }}</h4>
						<ul class="list-group z-depth-0 pb-3">
							@foreach ($tool as $tools)
							  <li class="list-group-item flex-column">{{ $tools->skill }}</li>
							@endforeach
						</ul>

					</div>

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
