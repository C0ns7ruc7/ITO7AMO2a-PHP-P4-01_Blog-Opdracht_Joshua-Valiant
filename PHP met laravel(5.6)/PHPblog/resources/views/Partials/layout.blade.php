<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Valiant Hekert">

    <title>blog site</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #eee;
            color: #555;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            padding: 0.5%;
        }
    </style>
</head>
<body>
    <div>
        <a href="/">start pagina</a>
        <a href="/lijst">lijst weergave</a>
    </div>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>
