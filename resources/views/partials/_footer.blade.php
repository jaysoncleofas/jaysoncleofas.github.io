<footer class="page-footer center-on-small-only" id="footer">
  <div class="container">
    <div class="row">

      <div class="col-lg-6 text-center">
        {{-- <h5 class="h5-responsive wow slideInLeft">Contact info</h5>
        <hr class="hidden-md-down wow slideInLeft"> --}}
        @foreach ($users as $user)
          <p><i class="fa fa-envelope"></i> {{ $user->email }}</p>
          <p><i class="fa fa-mobile"></i> {{ $user->phoneNumber }}</p>
          <p><i class="fa fa-map-marker"></i> {{ $user->address }}</p>
        @endforeach
      </div>


      <div class="col-sm-6 text-center">
        <div class="text-center pt-2">
          <a href="" class="btn btn-floating btn-fb wow slideInRight"><i class="fa fa-facebook left"></i></a>
          <a href="" class="btn btn-floating btn-tw wow slideInRight"><i class="fa fa-twitter"></i></a>
          <a href="" class="btn btn-floating btn-gplus wow slideInRight"><i class="fa fa-google-plus"></i></a>
          <a href="" class="btn btn-floating btn-li wow slideInRight"><i class="fa fa-linkedin"></i></a>
          <a href="" class="btn btn-floating btn-ins wow slideInRight"><i class="fa fa-instagram"></i></a>
          <a href="" class="btn btn-floating btn-so wow slideInRight"><i class="fa fa-stack-overflow"></i></a>
          <a href="" class="btn btn-floating btn-git wow slideInRight"><i class="fa fa-github"></i></a>
        </div>
      </div>
    </div>

  </div>

  <div class="footer-copyright">
    <div class="conatiner-fluid wow fadeInUp">
      <p>© 2017 By JAYSON CLEOFAS</p>
    </div>
  </div>
</footer>
