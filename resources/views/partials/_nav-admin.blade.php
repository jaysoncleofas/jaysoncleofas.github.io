<!--Navbar-->
<nav class="navbar fixed-top navbar-dark bg-primary">
   <div class="container">
      <a class="navbar-brand" href="{{ url('/home') }}">
         Dashboard
      </a>
      <ul class="nav navbar-nav float-right">
        <li class="nav-item dropdown btn-group">
          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<<<<<<< HEAD
             <img src="{{ asset('images/'.Auth::user()->avatar) }}" alt="" style="border-radius:50%;height:30px;width:30px;">
=======
             <img src="{{ asset(Auth::user()->avatar) }}" alt="" style="border-radius:50%;height:30px;width:30px;">
>>>>>>> 13cc8714f682675f7549a3ee7b00a6e8498a38a9
             {{ ucwords(Auth::user()->name) }}
             <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
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
</nav>
