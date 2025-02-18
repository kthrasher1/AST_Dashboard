<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        @auth

        @if(Auth::user()->hasRole('admin'))
        <a class="navbar-brand" href="{{ url('/admin') }}">
            {{ config('app.name', 'Dashboard') }}
        </a>
        @elseif(Auth::user()->hasRole('staff'))
        <a class="navbar-brand" href="{{ url('/staff') }}">
            {{ config('app.name', 'Dashboard') }}
        </a>
        @elseif(Auth::user()->hasRole('student'))
        <a class="navbar-brand" href="{{ url('/student') }}">
            {{ config('app.name', 'Dashboard') }}
        </a>

        @endif

        @endauth

        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Dashboard') }}
        </a>
        @endguest

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif




                @else
                @auth

                @if(Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link home" href="{{ url('/admin') }}">Home</a>
                </li>
                @elseif(Auth::user()->hasRole('staff'))
                <li class="nav-item">
                    <a class="nav-link home" href="{{ url('/staff') }}">Home</a>
                </li>
                @elseif(Auth::user()->hasRole('student'))
                <li class="nav-item">
                    <a class="nav-link home" href="{{ url('/student') }}">Home</a>
                </li>
                @endif

                @endauth

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" style="text-transform: capitalize;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
