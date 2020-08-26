<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Marx</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('favicon.png') }}" rel="shortcut icon" type="image/svg+xml">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="h-100">
        <div id="app" class="d-flex flex-column h-100">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-2">
                    <a href="/" class="navbar-brand yellow-color py-0 d-flex align-items-center">
                      <img src="/images/hammer-sickle.svg" class="mr-1" alt="" height="32px" width="32px">Marx
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link yellow-color" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link yellow-color" href="/posts">Posts</a></li>
                            <li class="nav-item"><a class="nav-link yellow-color" href="/users">Users</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link yellow-color" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link yellow-color" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ auth()->user()->path() }}">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link yellow-color" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </header>

            <main class="py-4 flex-shrink-0">
                @yield('content')
            </main>

            <footer class="footer mt-auto py-3">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">A <a href="https://linkedin.com/in/gvtalavera" class="text-white underline" target="_blank" rel="noreferrer">Gabriel Talavera</a> production.</p>
                        <a href="https://github.com/gabrieltal/marx" class="yellow-color" target="_blank" rel="noreferrer">Github</a>
                    </div>
                </div>
            </footer>

            <script src="http://unpkg.com/turbolinks"></script>
        </div>
    </body>
</html>
