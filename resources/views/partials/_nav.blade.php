@if (Auth::guest())
<!--Navbar-->
<nav class="navbar navbar-user fixed-top navbar-toggleable-md scrolling-navbar navbar-dark">
   <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx12" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">{{ strtoupper(config('app.name')) }}</a>
      <div class="collapse navbar-collapse" id="collapseEx12">
         <ul class="navbar-nav mr-auto smooth-scroll">
            <li class="nav-item">
               <a href="#home" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
               <a href="#about" class="nav-link">About</a>
            </li>
            <li class="nav-item">
               <a href="#skills" class="nav-link">Skills</a>
            </li>
            <li class="nav-item">
               <a href="#projects" class="nav-link">Works</a>
            </li>
            <li class="nav-item">
               <a href="#contact" class="nav-link">Contact</a>
            </li>
         </ul>
         <!--Navbar icons-->
         <ul class="nav navbar-nav nav-flex-icons">
            <li class="nav-item">
               <a href="https://www.facebook.com/8H8qLTxmHBUQpjDB" target="_blank" class="nav-link">
                  <i class="fa fa-facebook"></i>
               </a>
            </li>
            <li class="nav-item">
               <a href="https://www.linkedin.com/in/jayson-cleofas-546183121/" target="_blank" class="nav-link">
                  <i class="fa fa-linkedin"></i>
               </a>
            </li>
            <li class="nav-item">
               <a href="https://stackoverflow.com/users/7244389/jayson-cleofas?tab=profile" target="_blank" class="nav-link">
                  <i class="fa fa-stack-overflow"></i>
               </a>
            </li>
            <li class="nav-item">
               <a href="https://github.com/jaysoncleofas" target="_blank" class="nav-link">
                  <i class="fa fa-github"></i>
               </a>
            </li>
         </ul>
      </div>
   </div>
</nav>
<!--/.Navbar-->
@else
  <nav class="navbar navbar-user fixed-top navbar-toggleable-md scrolling-navbar navbar-dark" style="background-color:#0275d8">
     <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx12" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapseEx12">
           <ul class="navbar-nav mr-auto smooth-scroll">
              <li class="nav-item">
                 <a href="/home" class="nav-link">Dashboard</a>
              </li>
           </ul>
           <!--Navbar icons-->
           <ul class="nav navbar-nav nav-flex-icons">
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span> <i class="fa fa-comments"></i></a>
               <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                   @foreach (Auth()->user()->unreadNotifications as $notification)
                     <a href="#">{{ ($notification->type) }}</a>
                   @endforeach
               </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ ucfirst(Auth::user()->name) }}</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a href="{{ route('settings.index') }}" class="dropdown-item">Settings</a>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                     Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                  </form>
                </div>
              </li>
           </ul>
        </div>
     </div>
  </nav>
  <!--/.Navbar-->
  @endif
