<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Blank Page | AdminKit Demo</title>

    <link href="{{ asset("assets/css/app.css") }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('plantilla.nav')
        <div class="main">
            @include('plantilla.sidebar')
            @yield('content')
        </div>
    </div>


    <script src="{{ asset("assets/js/app.js") }}"></script>

</body>

</html>
