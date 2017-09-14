<div class="container">
  <section id="about" class="pt-5 pb-5">
    <div class="card">
      <div class="card-block">
        <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">Who am i?</h2>
        <hr>
        <div class="row">
          <div class="col-12 col-sm-3 pb-2">
            <img src="../img/ok.jpg" alt="My photo" class="img-fluid z-depth-2 wow slideInLeft" style="border-radius:;">
          </div>

          <div class="col-lg-9 wow slideInRight smooth-scroll">
            @foreach ($users as $user)
              <p><strong>{{ $user->name }}</strong></p>
              <div class="mb-1">
                <a href="#" class="fb-ic mr-1">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="gplus-ic mr-1">
                  <i class="fa fa-google-plus"></i>
                </a>
                <a href="#" class="li-ic mr-1">
                  <i class="fa fa-linkedin"></i>
                </a>
                <a href="#" class="git-ic mr-1">
                  <i class="fa fa-github"></i>
                </a>
              </div>
                <p class="text-justify">{!! $user->about !!}</p>
            @endforeach
          </div>
        </div>
      </div>
    </div>

  </section>
</div>

<!--Mask-->
{{-- <div class="view hm-light about-title">
    <div class="full-bg-img flex-center">
      <div class="container white-text text-center">
        <h3 class="h3-responsive wow lightSpeedIn mb-2"><i class="fa fa-quote-left" aria-hidden="true"></i>
          You might not think that programmers are artists, but programming is an extremely creative profession. It's logic-based creativity.
        <i class="fa fa-quote-right" aria-hidden="true"></i></h3>
        <h6 class="h6-responsive text-center font-italic wow lightSpeedIn" data-wow-delay="0.2s">~ JOHN ROMERO</h6>
      </div>
    </div>
</div> --}}
<!--/.Mask-->
