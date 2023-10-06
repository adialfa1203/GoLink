<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:51 GMT -->

<head>

    <meta charset="utf-8">
    <title>Masuk | Go Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}"
        style="width: 200px; height: 200px;">


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
            padding: 30px;
            margin: 0;
        }

        .custom-btn {
            background-color: #0B7EFF;
        }

        .google-btn,
        .btn-fb {
            margin: auto;
            width: 50%;
        }

        /* Facebook Button */
        .btn-fb {
            display: inline-block;
            border-radius: 3px;
            text-decoration: none;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
            -webkit-transition: background-color 0.218s, border-color 0.218s,
                box-shadow 0.218s;
            transition: background-color 0.218s, border-color 0.218s, box-shadow 0.218s;
        }

        .fb-content,
        .btn-fb,
        .btn-fb .fb-content {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            width: 210px;
            height: 40px;
        }

        .fb-content .logo,
        .btn-fb .logo,
        .btn-fb .fb-content .logo {
            padding: 3px;
            height: inherit;
        }

        .fb-content svg,
        .btn-fb svg,
        .btn-fb .fb-content svg {
            width: 18px;
            height: 18px;
        }

        .fb-content p,
        .btn-fb,
        .btn-fb .fb-content p {
            width: 100%;
            width: 220px;
            line-height: 1;
            letter-spacing: 0.21px;
            text-align: center;
            font-weight: 500;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
        }

        .btn-fb {
            padding-top: 1.5px;
            background: #1877f2;
            background-color: #1877f2;
        }

        .btn-fb:hover {
            box-shadow: 0 0 3px 3px rgba(59, 89, 152, 0.3);
        }

        .btn-fb .fb-content p {
            color: rgba(255, 255, 255, 0.87);
        }

        /* Google Button */
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,
     400,
        500,
        700&subset=cyrillic);

        .google-btn {
            width: 90%;
            height: 40px;
            background-color: #4285f4;
            border-radius: 2px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
            -webkit-transition: background-color 0.218s, border-color 0.218s,
                box-shadow 0.218s;
            transition: background-color 0.218s, border-color 0.218s, box-shadow 0.218s;
        }

        .google-btn .google-icon-wrapper {
            position: absolute;
            margin-top: 1px;
            margin-left: 1px;
            width: 38px;
            height: 38px;
            border-radius: 2px;
            background-color: #fff;
        }

        .google-btn .google-icon {
            position: absolute;
            margin-top: 11px;
            margin-left: 11px;
            width: 18px;
            height: 18px;
        }

        .google-btn .btn-text {
            padding-left: 10%;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            font-family: "Poppins", sans-serif;
        }

        .google-btn:hover {
            box-shadow: 0 0 6px #4285f4;
            cursor: pointer;
        }

        .google-btn:active {
            background: #1669f2;
        }
        .log{
            margin-bottom: 5px;
        }
    </style>
    <style>
        @media (max-width: 768px) {
            .img {
                display: none;
                /* Hide the element with class "img" for screens up to 768px wide (tablet) */
            }

            .col-lg-6 {
                width: 100%;
                /* Make the column full-width on tablets */
            }
        }
    </style>

    <script>
        window.addEventListener('resize', function() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body
                .clientWidth;
            if (screenWidth <= 768) { // Adjusted to 768px to match the tablet width
                var imgElement = document.querySelector('.img');
                if (imgElement) {
                    imgElement.remove(); // Remove the element with class "img" on tablet screens
                }
            }
        });
    </script>


</head>

<body>
    <section
        class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="card mb-0 p-0 d-flex justify-content-between">
                        <div class="row">
                            <div class="col-lg-6 col-md-9 col-sm-10 col-lg-6">
                                <div class="card mb-0 border-0 shadow-none mb-0">
                                    <div class="card-body p-sm-4 m-lg-3">
                                        <div class="text-center mt-5">
                                            <h5 class="fs-3xl" style="color: #104898">MASUK</h5>
                                            <p class="text-muted">Masuk untuk melanjutkan ke Go.Link</p>
                                        </div>
                                        <div class="p-2 mt-5">
                                            <form action="{{ route('login.user') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Email</label>
                                                    <div class="position-relative ">
                                                        <input type="text"
                                                            class="form-control password-input @error('email')
                                                        is-invalid
                                                        @enderror"
                                                            name="email" id="username" placeholder="Masukkan Email"
                                                            value="{{ old('email') }}">
                                                    </div>
                                                    <div>
                                                        @if ($errors->has('email'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Kata Sandi</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input"
                                                            name="password" placeholder="Masukkan Kata Sandi"
                                                            id="password-input" value="{{ old('password') }}">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                        <div>
                                                            @if ($errors->has('password'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="float-end">
                                                        <a href="{{ url('send-email') }}" class="text-muted">Lupa kata
                                                            sandi?</a>
                                                    </div>
                                                    <div class="mb-3 form-check col-4">
                                                        <input type="checkbox" class="form-check-input" id="remember"
                                                            name="remember_me">
                                                        <label class="form-check-label" for="remember">Ingat
                                                            saya</label>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100 custom-btn"
                                                        type="submit">Masuk</button>
                                                </div>
                                                <div class="mt-4 pt-2 text-center">
                                                    <div class="signin-other-title position-relative">
                                                        <h5 class="fs-sm mb-4 title">Login dengan</h5>
                                                    </div>
                                                    <div class="pt-2 hstack gap-2 justify-content-center">
                                                        <a href="{{ route('redirect.google') }}"  style="width: 100%;">
                                                            <div class="google-btn">
                                                                <div class="google-icon-wrapper">
                                                                    <img class="google-icon d-flex justify-content-center"
                                                                        src="https://i.ibb.co/ydLySMx/google.png" />
                                                                </div>
                                                                <h6 class="btn-text" style="padding: 11px;">Login dengan Google</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="pt-2 hstack gap-2 justify-content-center">
                                                        <a href="{{ route('redirect.facebook') }}"  style="width: 100%;">
                                                            <div class="google-btn">
                                                                <div class="google-icon-wrapper">
                                                                    <img class="google-icon d-flex justify-content-center"
                                                                        src="https://i.ibb.co/pnpDRC6/facebook.png" />
                                                                </div>
                                                                <p class="btn-text" style="padding: 11px;">Login dengan Facebook</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="text-center mt-5">
                                                <p class="mb-0">Tidak mempunyai akun ? <a
                                                        href="{{ url('register') }}"
                                                        class="fw-semibold text-secondary text-decoration-underline">
                                                        Daftar</a> </p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <div class="col-6 right-section img col-lg-6">
                                <center>
                                    <div class="w-100" style="margin-top: 20% ">
                                        <img src="{{ asset('template/image/Login2.png') }} " width="400"
                                            height="400">
                                    </div>
                                </center>
                            </div>
                        </div>
                        <!--end col-->
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
    <script>
        // Fungsi untuk menampilkan atau menyembunyikan pesan kesalahan
        function toggleRequiredAlert(show) {
            var requiredAlert = document.getElementById('requiredAlert');
            requiredAlert.style.display = show ? 'block' : 'none';
        }

        // Fungsi untuk memvalidasi formulir sebelum pengiriman
        function validateForm(event) {
            var rememberCheckbox = document.getElementById('remember');

            if (!rememberCheckbox.checked) {
                toggleRequiredAlert(true);
                event.preventDefault(); // Mencegah pengiriman formulir
            } else {
                toggleRequiredAlert(false);
            }
        }

        // Tambahkan event listener untuk tautan kebijakan privasi
        var privacyLink = document.getElementById('privacyLink');
        privacyLink.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tautan dari mengarahkan ke halaman lain
            // Tampilkan atau sembunyikan modal kebijakan privasi di sini jika diperlukan
        });

        // Tambahkan event listener untuk validasi sebelum pengiriman formulir
        var loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', validateForm);
    </script>

</body>


<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:58 GMT -->

</html>
