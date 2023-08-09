<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('images/logo/rmv2.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .container {
        padding-top: 50px;
        margin: auto;
    }
    </style>
    <title>@yield('title')</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('layout/section/navbartop')
        @include('layout/section/sidebar')
        <div class="content-wrapper">
            <div>
                @if ($message = Session::get('success'))
                <script>
                    Swal.fire({
                        timer: 1500,
                        title: `Selamat!`,
                        text: "{{ $message }}",
                        icon: "success",
                        showConfirmButton: false,
                    })
                </script>
                @endif

                @if ($message = Session::get('error'))
                <script>
                    Swal.fire({
                        timer: 1500,
                        title: `Maaf!`,
                        text: "{{ $message }}",
                        icon: "error",
                        showConfirmButton: false,
                    })
                </script>
                @endif

                @if ($message = Session::get('warning'))
                <script>
                    Swal.fire({
                        timer: 1500,
                        title: `Cek Kembali!`,
                        text: "{{ $message }}",
                        icon: "warning",
                        showConfirmButton: false,
                    })
                </script>
                @endif

                @if ($message = Session::get('info'))
                <script>
                    Swal.fire({
                        timer: 1500,
                        text: "{{ $message }}",
                        icon: "info",
                        showConfirmButton: false,
                    })
                </script>
                @endif

                @if ($errors->any())
                <script>
                    Swal.fire({
                        timer: 1500,
                        title: `Maaf!`,
                        text: "{{ $message }}",
                        icon: "error",
                        showConfirmButton: false,
                    })
                </script>
                @endif
            </div>
            <script>
                //alert flash out
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            </script>
            @yield('content')
            @include('layout/section/footer')
            @yield('custom-script')
        </div>
    </div>
    <!-- =========================================== JS ================================================ -->
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- =========================================== END ================================================ -->


</body>
</html>