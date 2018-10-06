<div class="header">
	<div class="container">
		<div class="logo">
			<a href="{{ url('/') }}"><span>Re</span>sale</a>
		</div>
		<div class="header-right">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                        <a href="{{ route('myaccount') }}" class="account" style="text-transform: capitalize;">{{ Auth::user()->name }}</a>

                        <a class="account" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @else
                    <a href="{{ route('login') }}" class="account">Login</a>
                    <a href="{{ route('register') }}" class="account">Register</a>
                @endauth
            </div>
        @endif

	</div>
	</div>
</div>