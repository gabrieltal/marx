@extends ('layout')

@section ('header')
    <div id="header-wrapper" class="d-flex align-items-center">
        <div id="header">
            <h1><a href="/">Marx</a></h1>
        </div>
        <div class="nav">
            <ul class="d-flex justify-content-between">
                <li class="{{ Request::path() === '/' ? 'active-nav-item' : '' }}"><a href="/">Home</a></li>
                <li class="{{ Request::path() === 'about' ? 'active-nav-item' : '' }}"><a href="/about">About</a></li>
            </ul>
        </div>
    </div>
@endsection

@section ('content')
    <h1>About</h1>

    <p>Welcome to Marx. We love Karl Marx.</p>
@endsection
