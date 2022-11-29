<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        DUSHAA:: Dr. Muhammad Shahidullah Hall Alumni Association :: Reunion 2022
    </title>
    <link rel="icon" type="icon" href="{{ asset('/') }}assets/frontend/images/favicon.png">

    <!-- Links Of CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/countdown.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/style.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/frontend/css/toastr.min.css" />
</head>
<body>

@include('frontend.layouts.header')

@yield('content')

@include('frontend.layouts.footer')

<!-- Link Os JS -->
<script src="{{ asset('/') }}assets/frontend/js/jquery.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/countdown.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/iconify.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/lightbox.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/toastr.min.js"></script>
<script src="{{ asset('/') }}assets/frontend/js/custom.js"></script>
@stack('script')

<script>
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
    };

    @if(session()->has( 'success' ))
    toastr.success("{{ session()->get( 'success' ) }}");
    @endif

    @if(session()->has( 'error' ))
    toastr.error("{{ session()->get( 'error' ) }}");
    @endif

    @if (@$errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
</body>
</html>
