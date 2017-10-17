<!--Mask-->
<div class="view hm-black-light contact-title" id="contact">
   <div class="full-bg-img flex-center smooth-scroll">
      <div class="white-text text-center">
         <h3 class="h3-responsive intro-heading wow fadeIn text-uppercase" data-wow-delay="0.2s">Let's make something awesome together.</h3>
         <a href="#your-message" class="btn btn-primary btn-lg mt-2 wow fadeIn" data-wow-delay="0.2s">Get in touch</a>
      </div>
   </div>
</div>
<!--/.Mask-->
<div class="container">
   <section id="your-message" class="pt-5 pb-3">
      <h2 class="h2-responsive section-heading text-center pb-2 wow fadeIn" data-wow-delay="0.2s">LEAVE ME A MESSAGE</h2>
      <p class="text-center mb-2wow fadeIn" data-wow-delay="0.2s">Please fill out the quick form and I will be in touch with lightning speed.</p>
      <div class="row">
         <div class="col-lg-6 mx-auto text-center">
            @if (Session::has('success'))
            <div class="alert alert-success">
               {{ Session::get('success') }}
            </div>
            @endif @if (Session::has('error'))
            <div class="alert alert-danger">
               {{ Session::get('error') }}
            </div>
            @endif
            <form action="{{ route('message.store') }}" method="post" data-parsley-validate id="form">
               {{ csrf_field() }}
               <div class="md-form {{ $errors->has('name') ? 'has-danger' : '' }} wow fadeInUp" data-wow-delay="0.2s">
                  <input type="text" name="name" value="" class="form-control" data-parsley-length="[8, 40]" required>
                  <label for="">Name</label>
                  @if ($errors->has('name'))
                  <span class="text-danger">
                     {{ $errors->first('name') }}
                  </span>
                  @endif
               </div>
               <div class="row">
                  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                     <div class="md-form {{ $errors->has('email') ? 'has-danger' : '' }}">
                        <input type="email" name="email" value="" class="form-control" data-parsley-type="email" required>
                        <label for="">E-mail Addess</label>
                        @if ($errors->has('email'))
                        <span>
                           {{ $errors->first('email') }}
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                     <div class="md-form {{ $errors->has('contactNumber') ? 'has-danger' : '' }}">
                        <input type="text" name="contactNumber" value="" class="form-control" required="">
                        <label for="">Contact Number</label>
                        @if ($errors->has('contactNumber'))
                        <span class="text-danger">
                           {{ $errors->first('contactNumber') }}
                        </span>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="md-form {{ $errors->has('subject') ? 'has-danger' : '' }} wow fadeInUp" data-wow-delay="0.2s">
                  <input type="text" name="subject" value="" class="form-control" required="">
                  <label for="">Subject</label>
                  @if ($errors->has('subject'))
                  <span class="text-danger">
                     {{ $errors->first('subject') }}
                  </span>
                  @endif
               </div>
               <div class="md-form {{ $errors->has('message') ? 'has-danger' : '' }} wow fadeInUp" data-wow-delay="0.2s">
                  <textarea type="text" name="message" class="md-textarea" required=""></textarea>
                  <label for="">Your Message</label>
                  @if ($errors->has('message'))
                  <span class="text-danger">
                     {{ $errors->first('message') }}
                  </span>
                  @endif
               </div>
               <div class="md-form wow fadeInUp" data-wow-delay="0.2s">
                  <div class="g-recaptcha" data-sitekey="6Lf2Ni8UAAAAAJX8OVUkOzn73GhuMg_x0okbTbhw"></div>
               </div>
               <div class="md-form wow fadeInUp" data-wow-delay="0.2s">
                  <button type="submit" name="button" class="btn btn-unique btn-block">Send message</button>
               </div>
            </form>
         </div>
      </div>
   </section>
</div>
