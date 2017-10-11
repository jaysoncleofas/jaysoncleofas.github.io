<!--Navbar-->
<nav class="navbar fixed-top navbar-dark bg-primary">
   <div class="container">
      <a class="navbar-brand" href="{{ url('/home') }}">
         Dashboard
      </a>
      <ul class="nav navbar-nav float-right">
        <li class="nav-item dropdown btn-group">
          <a class="nav-link dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-comments"></i>
          </a>
          <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu12">
             <a href="{{ route('settings.index') }}" class="dropdown-item">Settings</a>
             <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Logout
             </a>
          </div>
        </li>
        <li class="nav-item dropdown btn-group">
          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <img src="{{ asset('images/'. Auth::user()->avatar) }}" alt="" style="border-radius:50%;height:30px;width:30px;">
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
