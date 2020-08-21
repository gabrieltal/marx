<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marx</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="header-wrapper" class="d-flex align-items-center">
            <div id="header">
                <h1><a href="/">Marx</a></h1>
            </div>
            <div class="nav">
                <ul class="d-flex justify-content-between">
                    <li class="{{ Request::path() === '/' ? 'active-nav-item' : '' }}"><a href="/">Home</a></li>
                    <li class="{{ Request::path() === 'about' ? 'active-nav-item' : '' }}"><a href="/about">About</a></li>
                    <li class="{{ Request::path() === 'posts' ? 'active-nav-item' : '' }}"><a href="/posts">Posts</a></li>
                </ul>
            </div>
        </div>

        @yield ('content')

        <footer><div class="d-flex align-items-center h-100">
          <p>A Gabriel Talavera production.</p>
        </div></footer>
    </body>
</html>
