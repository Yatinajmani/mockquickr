  <div class="navbar-fixed">
    <nav class="indigo lighten-5" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="{{asset('images/download.png')}}"></a>
        <ul class="right hide-on-med-and-down">
        @if (Route::has('login'))
        @auth
          <li><a href="{{ route('myaccount') }}" style="text-transform: capitalize;" class="waves-effect waves-light btn indigo lighten-1">{{ Auth::user()->name }}</a></li>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect waves-light btn indigo darken-3">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        @else
          <li><a href="{{ route('login') }}" class="waves-effect waves-light btn indigo lighten-1">Login</a></li>
          <li><a href="{{ route('register') }}" class="waves-effect waves-light btn indigo darken-3">Register</a></li>
        @endauth
        @endif
      </ul>

      <ul id="nav-mobile" class="sidenav indigo darken-2">
        @if (Route::has('login'))
        @auth
          <li><a href="{{ route('myaccount') }}" style="text-transform: capitalize;" class="indigo-text text-darken-2">{{ Auth::user()->name }}</a></li>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="indigo-text text-darken-2">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        @else
          <li><a href="{{ route('login') }}" class="indigo-text text-lighten-5">Login</a></li>
          <li><a href="{{ route('register') }}" class="indigo-text text-lighten-5">Register</a></li>
        @endauth
        @endif
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger indigo-text text-darken-2"><i class="material-icons">menu</i></a>
  </div>
</nav>
</div>

