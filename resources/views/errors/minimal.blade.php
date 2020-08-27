<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('favicon.png') }}" rel="shortcut icon" type="image/svg+xml">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .error {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
                font-size: 24px;
                text-align: center;
            }

            .message { margin-top: 8px; }
        </style>
    </head>
    <body>
        <div class="error full-height">
              @yield('code')
              <div class="message">
                @yield('message')
              </div>
        </div>
    </body>
</html>
