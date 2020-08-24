@extends ('layout')

@section ('content')
    <div id="body-wrapper">
        <h2>Welcome!</h2>
        <a href="https://github.com/gabrieltal/marx" class="yellow-color">Github</a>
    </div>
    <div class="flex-center position-ref vh-100">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
@endsection
