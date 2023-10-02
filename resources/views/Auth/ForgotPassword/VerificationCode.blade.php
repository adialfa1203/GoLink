<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:51 GMT -->

<head>

    <meta charset="utf-8">
    <title>Verifikasi Kode | Go Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/images/favicon.ico') }}">

    <!-- Fonts css load -->
    <link rel="preconnect"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/https://fonts.googleapis.com/') }}">
    <link rel="preconnect"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/https://fonts.gstatic.com/') }}"
        crossorigin>
    <link id="fontsLink"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/icons.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- App Css-->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/app.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- custom Css-->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/custom.min.css') }}" rel="stylesheet"
        type="text/css">

    <style>
        .right-section {
            background-color: #104898;
            color: white;
            padding: 20px;
        }

        .custom-btn {
            background-color: #0B7EFF;
        }
    </style>

</head>

<body>
    <section
        class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card mb-0">
                        <div class="row g-0 align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-0 border-0 shadow-none mb-0">
                                        <div class="card-body p-sm-5 m-lg-4">
                                            <div class="text-center mt-2">
                                                <h5 class="fs-3xl">Verifikasi Kode</h5>
                                                <p class="text-muted mb-4">Masukkan kode verifikasi</p>
                                                <div class="pb-4">
                                                    <img src="{{('template/themesbrand.com/steex/layouts/assets/images/auth/email.png')}}" alt="" class="avatar-md">
                                                </div>
                                            </div>
                                            {{-- @if (isset($success) || (isset($error)))
                                            <div class="alert border-0 {{ isset($success) ? 'alert-success' : 'alert-danger' }} text-center mb-2 mx-2" role="alert">
                                                @if (isset($success))
                                                    Instruksi telah dikirimkan ke email Anda!
                                                @elseif (isset($error))
                                                    Terjadi kesalahan saat mengirimkan instruksi. Silakan coba lagi.
                                                @endif
                                            </div>
                                            @endif --}}
                                            <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
                                                Masukkan kode yang telah dikirimkan kepada Anda!
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('verificationCode')}}" method="POST">
                                                    @csrf

                                                    <div class="mb-4">
                                                        <label class="form-label">Kode Verifikasi</label>
                                                        <input type="text" name="verification_code" class="form-control password-input" id="verification_code" placeholder="Masukkan Kode Verifikasi">
                                                        <div>
                                                               @if ($errors->has('verification_code'))
                                                                   <span class="text-danger">{{ $errors->first('verification_code') }}</span>
                                                               @endif
                                                           </div>
                                                    </div>

                                                    <div class="text-center mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">Verifikasi Kode</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Tunggu, saya ingat kata sandi saya ... <a href="{{ url ('login')}}" class="fw-semibold text-primary text-decoration-underline"> Masuk </a> </p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/plugins.js') }}"></script>



    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/password-addon.init.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- swiper.init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/swiper.init.js') }}"></script>

</body>


<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:58 GMT -->

</html>
