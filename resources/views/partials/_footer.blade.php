<footer class="page-footer center-on-small-only" id="footer" style="background: url('../img/use_your_illusion.png')">
  <div class="container">

    @foreach ($users as $user)
      <div class="row text-center mt-2 px-5 wow slideInLeft">
        <div class="col-sm-4">
          <div class="btn-floating blue mb-1"><i class="fa fa-map-marker"></i></div>
          <p>{{ $user->address }}</p>
        </div>
        <div class="col-sm-4 mb">
          <div class="btn-floating blue mb-1"><i class="fa fa-envelope"></i></div>
          <p>{{ $user->email }}</p>
        </div>
        <div class="col-sm-4">
          <div class="btn-floating blue mb-1"><i class="fa fa-mobile"></i></div>
          <p>{{ $user->phoneNumber }}</p>
        </div>
      </div>
    @endforeach
    {{-- <hr> --}}
    <div class="row mt-1">
      <div class="col-sm-12 text-center mb-2">
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

  <div class="footer-copyright">
    <div class="conatiner-fluid wow fadeInUp">
      <p>© 2017 By JAYSON CLEOFAS</p>
    </div>
  </div>
</footer>
