<div class="container">
  <section id="about" class="pt-5 pb-5">

        <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">Who am i?</h2>
        <!-- <hr> -->
        <div class="row">
          <div class="col-sm-5 pb-2">
            @foreach ($users as $user)
            <img src="{{ asset('images/' . $user->avatar) }}" alt="user profile photo" class="img-fluid mx-auto z-depth-2 wow slideInLeft" style="height:300px;width:300px;border-radius:50%;">
          </div>
          <div class="col-sm-7 mt-2 wow slideInRight smooth-scroll">

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



  </section>
</div>
<div class="container-fluid" style="background:#34495e;">
  <div class="container white-text">
    <div class="row pt-3">
      <div class="col-md-4 mb-r">
        <div class="col-2 col-md-3 float-left">
            <i class="fa fa-code blue-text fa-3x"></i>
        </div>
        <div class="col-9 col-md-8 col-lg-9 float-right">
            <h4 class="feature-title mb-2">Development</h4>
            <p class="grey-text">Brings the design and functionality of an app to life. Using a mix of frameworks, build everything that makes a website function.</p>
            <!-- <a class="btn btn-primary btn-sm ml-0">Learn more</a> -->
        </div>
      </div>
      <div class="col-md-4 mb-r">
        <div class="col-2 col-md-3 float-left">
            <i class="fa fa-paint-brush pink-text fa-3x"></i>
        </div>
        <div class="col-9 col-md-8 col-lg-9 float-right">
            <h4 class="feature-title mb-2">Modern design</h4>
            <p class="grey-text">Design changes quickly and it is of most importance to keep up with the latest trends</p>
            <!-- <a class="btn btn-primary btn-sm ml-0">Learn more</a> -->
        </div>
      </div>
      <div class="col-md-4 mb-r">
        <div class="col-2 col-md-3 float-left">
            <i class="fa fa-laptop purple-text fa-3x"></i>
        </div>
        <div class="col-9 col-md-8 col-lg-9 float-right">
            <h4 class="feature-title mb-2">Responsive websites</h4>
            <p class="grey-text">It doesn't matter on which device your projects will be displayed. It looks great on each screen</p>
            <!-- <a class="btn btn-primary btn-sm ml-0">Learn more</a> -->
        </div>
      </div>
    </div>
  </div>
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
