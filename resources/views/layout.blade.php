<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marx</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        @yield ('header')
        @yield ('content')

        <footer><div class="d-flex align-items-center h-100">
          <p>A Gabriel Talavera production.</p>
        </div></footer>
    </body>
</html>
