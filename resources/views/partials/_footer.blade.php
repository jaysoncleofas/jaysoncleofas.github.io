<footer class="page-footer center-on-small-only" id="footer" style="background: url('../img/use_your_illusion.png')">
   <div class="container">
      <div class="row mt-2 px-5">
         <div class="col-sm-4 mb-2 wow fadeIn" data-wow-delay="0.2s">
            <h5 class="mb-1">{{ strtoupper($users->name) }}</h5>
            <p>Feel free to browse through my portfolio, and get in touch if you have a project in mind that you’d like to explore together.</p>
         </div>
         <div class="col-sm-4 mb-2 text-center wow fadeIn" data-wow-delay="0.2s">
            <div class="">
               <h5>STAY IN TOUCH</h5>
            </div>
            <a href="https://www.facebook.com/8H8qLTxmHBUQpjDB" target="_blank" class="btn btn-floating btn-fb">
               <i class="fa fa-facebook left"></i>
            </a>
            <a href="https://www.linkedin.com/in/jayson-cleofas-546183121/" target="_blank" class="btn btn-floating btn-li">
               <i class="fa fa-linkedin"></i>
            </a>
            <a href="https://stackoverflow.com/users/7244389/jayson-cleofas?tab=profile" target="_blank" class="btn btn-floating btn-so">
               <i class="fa fa-stack-overflow"></i>
            </a>
            <a href="https://github.com/jaysoncleofas" target="_blank" class="btn btn-floating btn-git">
               <i class="fa fa-github"></i>
            </a>
         </div>
         <div class="col-sm-4 text-center mb-2 wow fadeIn" data-wow-delay="0.2s">
            <div class="mb-1">
               <h5>CONTACT</h5>
            </div>
            <p>
               <i class="fa fa-map-marker"></i>
               {{ $users->address }}</p>
            <p>
               <i class="fa fa-envelope"></i>
               {{ $users->email }}</p>
            <p>
               <i class="fa fa-mobile"></i>
               {{ $users->phoneNumber }}</p>
         </div>
      </div>
   </div>
   <div class="footer-copyright">
      <div class="conatiner-fluid wow fadeInUp" data-wow-delay="0.2s">
         <p>© 2017 By JAYSON CLEOFAS</p>
      </div>
   </div>
</footer>
