<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Wiki - Acercate</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('https://img.icons8.com/color/144/000000/google-sites--v2.png') }}">
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
    <!-- Summernote -->
    <link href="{{ asset('assets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
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

    <div id="main-wrapper" style="background-color: rgb(235, 235, 235)">
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
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>

    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}}"></script>
    <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/toastr-init.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('assets/js/plugins-init/summernote-init.js') }}"></script>



    @livewireScripts
    @if (Session::has('mensaje'))
        <script>
            Command: toastr["success"]("{{ session('mensaje') }}")
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
    @endif

    <script>
        $('#alert').fadeIn();
        setTimeout(function() {
            $("#alert").fadeOut();
        }, 2000);
    </script>
    <script>
        $(document).ready(function() {
            $('#desc1').summernote();
        });
    </script>
    <script type="text/javascript">
        window.livewire.on('hide', () => {
            $('.modal').modal('hide');
        });
    </script>

</body>

</html>
