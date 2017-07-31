<!--Navbar-->
<nav class="navbar fixed-top navbar-dark bg-primary">
    <div class="container">

      <a class="navbar-brand" href="{{ url('/home') }}">
        Dashboard
      </a>

      <ul class="nav navbar-nav float-right">
        <li class="nav-item dropdown btn-group">

          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}<span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
            <a href="{{ route('settings.index') }}" class="dropdown-item">Settings</a>
            <a href="{{ route('logout') }}" class="dropdown-item"
                onclick="event.preventDefault();
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
