<!--Mask-->
<div class="view hm-black-light contact-title" id="contact">
    <div class="full-bg-img flex-center smooth-scroll">
      <div class="white-text text-center">
        <h3 class="h3-responsive intro-heading wow lightSpeedIn text-uppercase">Let's make something awesome together.</h3>
        <a href="#your-message" class="btn btn-primary btn-lg mt-2 wow lightSpeedIn">Get in touch</a>
      </div>
    </div>
</div>
<!--/.Mask-->
<div class="container">
  <section id="your-message" class="pt-5 pb-3">
    <h2 class="h2-responsive section-heading text-center pb-2 wow bounceInDown">LEAVE ME A MESSAGE</h2>
    <p class="text-center mb-3 wow bounceInDown">Please fill out the quick form and I will be in touch with lightning speed.</p>
    <div class="row">
      <div class="col-lg-6 mx-auto">

        @if (Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        @endif

        @if (Session::has('error'))
          <div class="alert alert-danger">
            {{ Session::get('error') }}
          </div>
        @endif

        <form action="{{ route('message.store') }}" method="post" data-parsley-validate id="form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-6 wow fadeInUp">
              <div class="md-form">
                <input type="text" name="firstname" value="" class="form-control" required="">
                <label for="">First Name</label>
              </div>
            </div>

            <div class="col-lg-6 wow fadeInUp">
              <div class="md-form">
                <input type="text" name="lastname" value="" class="form-control" required="">
                <label for="">Last Name</label>
              </div>
            </div>
          </div>

          <div class="md-form wow fadeInUp">
            <input type="email" name="email" value="" class="form-control" required="">
            <label for="">E-mail Addess</label>
          </div>

          <div class="md-form wow fadeInUp">
            <textarea type="text" name="message" class="md-textarea" required=""></textarea>
            <label for="">Your Message</label>
          </div>

          <div class="md-form wow fadeInUp">
            <div class="g-recaptcha" data-sitekey="6Lf2Ni8UAAAAAJX8OVUkOzn73GhuMg_x0okbTbhw"></div>
          </div>

          <div class="md-form wow fadeInUp">
            <button type="submit" name="button" class="btn btn-unique btn-block">Send message</button>
          </div>

        </form>

      </div>
    </div>

  </section>
</div>
