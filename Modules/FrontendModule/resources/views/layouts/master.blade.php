<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cash for trash</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/css/style.css">
    <link href="{{ asset('assets/admin-module') }}/css/toastr.min.css" rel="stylesheet">
    <style>
        .nav-item.dropdown.active .nav-link {
            color: #ffb600 !important;
        }
    </style>
    @stack('css')
</head>

<body>
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="top-info text-center text-md-left">
                            <li><i class="fas fa-map-marker-alt"></i>
                                <p class="info-text">Dhaka, Bangladesh</p>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top info end -->

                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                        <ul class="list-unstyled">
                            <li>
                                <a title="Facebook" href="https://facebbok.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a title="Twitter" href="https://twitter.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a title="Instagram" href="https://instagram.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                </a>
                                <a title="Linkdin" href="https://github.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-github"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
        @include('frontendmodule::layouts.partials._header')
        <!--/ Header end -->
        @yield('content')

        <!--/ News end -->
        @include('frontendmodule::layouts.partials._footer')
        <!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        <script src="{{ asset('assets/frontend-module') }}/plugins/jQuery/jquery.min.js"></script>
        <!-- Bootstrap jQuery -->
        <script src="{{ asset('assets/frontend-module') }}/plugins/bootstrap/bootstrap.min.js" defer></script>
        <!-- Slick Carousel -->
        <script src="{{ asset('assets/frontend-module') }}/plugins/slick/slick.min.js"></script>
        <script src="{{ asset('assets/frontend-module') }}/plugins/slick/slick-animation.min.js"></script>
        <!-- Color box -->
        <script src="{{ asset('assets/frontend-module') }}/plugins/colorbox/jquery.colorbox.js"></script>
        <!-- shuffle -->
        <script src="{{ asset('assets/frontend-module') }}/plugins/shuffle/shuffle.min.js" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->
        <script src="{{ asset('assets/frontend-module') }}/plugins/google-map/map.js" defer></script>

        <!-- Template custom -->
        <script src="{{ asset('assets/frontend-module') }}/js/script.js"></script>
        <script src="{{ asset('assets/admin-module') }}/custom-js/toastr.min.js"></script>
        {{-- toastr --}}
        <script>
            "use strict";
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            @if (session()->has('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if (session()->has('info'))
                toastr.info('{{ session('info') }}');
            @endif

            @if (session()->has('warning'))
                toastr.warning('{{ session('warning') }}');
            @endif

            @if (session()->has('error'))
                toastr.error('{{ session('error') }}');
            @endif
        </script>
        <!-- SWEET-ALERT JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function login_alert() {
                "use strict";
                Swal.fire({
                    title: "Please login first !",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#ff9800",
                    confirmButtonText: "Login",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('customer.auth.login') }}";
                    }
                    return false;
                });
            }
        </script>

    </div><!-- Body inner end -->
</body>

</html>
