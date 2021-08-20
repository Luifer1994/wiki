<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/images/favicon.png") }}">
    <link href="{{ asset("assets/vendor/datatables/css/jquery.dataTables.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
    @livewireStyles


</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        @include('plantilla.navheader')

        @include('plantilla.sidebar')

        <div class="content-body">

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        @include('plantilla.footer')



    </div>
    <!-- Required vendors -->
    <script src="{{ asset("assets/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/global/global.min.js") }}"></script>
    <script src="{{ asset("assets/js/quixnav-init.js") }}"></script>
    <script src="{{ asset("assets/js/custom.min.js") }}"></script>

    <script src="{{ asset("assets/js/dashboard/dashboard-1.js") }}}"></script>
    <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/toastr-init.js') }}"></script>
    @livewireScripts
</body>

</html>
