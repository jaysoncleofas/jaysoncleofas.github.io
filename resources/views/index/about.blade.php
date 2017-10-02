<div class="container">
   <section id="about" class="pt-5 pb-5">
      <h2 class="h2-responsive section-heading text-center mb-2 wow bounceInDown">
         Who am i?
      </h2>
      <div class="row">
         <div class="col-sm-5 pb-2 wow slideInLeft">
            <img src="{{ asset('images/' . $users->avatar) }}" alt="user profile photo" class="img-fluid mx-auto z-depth-2" style="height:300px;width:300px;border-radius:50%;">
            <div class="text-center mt-3">
               <a href="https://www.facebook.com/8H8qLTxmHBUQpjDB" target="_blank" class="fb-ic mr-2">
                  <i class="fa fa-facebook fa-2x"></i>
               </a>
               <a href="https://www.linkedin.com/in/jayson-cleofas-546183121/" target="_blank" class="li-ic mr-2">
                  <i class="fa fa-linkedin fa-2x"></i>
               </a>
               <a href="https://stackoverflow.com/users/7244389/jayson-cleofas?tab=profile" target="_blank" class="so-ic mr-2">
                  <i class="fa fa-stack-overflow fa-2x"></i>
               </a>
               <a href="https://github.com/jaysoncleofas" target="_blank" class="gh-ic mr-2">
                  <i class="fa fa-github fa-2x"></i>
               </a>
            </div>
         </div>
         <div class="col-sm-7 mt-2 wow slideInRight">
            <p class="text-justify">{!! $users->about !!}</p>
         </div>
      </div>
   </section>
</div>
<div class="container-fluid" style="background:#34495e;">
   <div class="container white-text">
      <div class="row pt-3">
         <div class="col-md-4 mb-r wow slideInRight">
            <div class="col-2 col-md-3 float-left">
               <i class="fa fa-code blue-text fa-3x"></i>
            </div>
            <div class="col-9 col-md-8 col-lg-9 float-right">
               <h4 class="feature-title mb-2">Development</h4>
               <p class="grey-text">Brings the design and functionality of an app to life. Using a mix of frameworks, build everything that makes a website function.</p>
            </div>
         </div>
         <div class="col-md-4 mb-r wow slideInRight">
            <div class="col-2 col-md-3 float-left">
               <i class="fa fa-paint-brush pink-text fa-3x"></i>
            </div>
            <div class="col-9 col-md-8 col-lg-9 float-right">
               <h4 class="feature-title mb-2">Modern design</h4>
               <p class="grey-text">Design changes quickly and it is of most importance to keep up with the latest trends</p>
            </div>
         </div>
         <div class="col-md-4 mb-r wow slideInRight">
            <div class="col-2 col-md-3 float-left">
               <i class="fa fa-laptop purple-text fa-3x"></i>
            </div>
            <div class="col-9 col-md-8 col-lg-9 float-right">
               <h4 class="feature-title mb-2">Responsive websites</h4>
               <p class="grey-text">It doesn't matter on which device your projects will be displayed. It looks great on each screen</p>
            </div>
         </div>
      </div>
   </div>
</div>
