<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:51 GMT -->

<head>

    <meta charset="utf-8">
    <title>Masuk | MiLink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}" style="width: 200px; height: 200px;">


    <!-- Fonts css load -->
    <link rel="preconnect" href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/https://fonts.googleapis.com/') }}">
    <link rel="preconnect" href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/https://fonts.gstatic.com/') }}" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link id="fontsLink" href="{{ asset('template/themesbrand.com/steex/layouts/assets/assets/https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Layout config Js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <!-- custom Css-->
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        body,
        .gm,
        .card {
            min-height: 100vh;
            overflow: hidden;
        }

        .right-section {

            color: white;
            padding: 0;
            margin: 0;

        }

        .rigth {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            border-radius: 30px 0 0 30px;
            box-shadow: -5px 0 5px rgba(0, 0, 0, 0.1);
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
            width: 100%;
            height: 40px;
            background-color: #fff;
            border-radius: 8px;
            border: black solid 1px;
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
            margin-left: 4rem;
            width: 18px;
            height: 18px;
        }

        .google-btn .google-icone {
            position: absolute;
            margin-top: 11px;
            margin-left: 3.5rem;
            width: 18px;
            height: 18px;
        }

        .google-btn .btn-text {
            padding-left: 10%;
            color: auto;
            font-size: 14px;
            font-weight: 500;
            font-family: "Poppins", sans-serif;
        }

        .google-btn:hover {
            box-shadow: 0 0 6px #000;
            cursor: pointer;
        }

        .google-btn:active {
            background: #1669f2;
        }

        .log {
            margin-bottom: 5px;
        }
    </style>
    <style>
        @media (max-width: 768px) {
            .img {
                display: none;
            }

            .col-lg-6 {
                width: 100%;
            }

            .rigth {
                border-top-left-radius: 0;
                /* Hilangkan border-radius pada sudut kiri atas */
                border-bottom-left-radius: 0;
            }

            .google-btn .google-icon {
                position: absolute;
                margin-top: 9px;
                margin-left: 2.2rem;
                width: 18px;
                height: 18px;
            }

            .google-btn .google-icone {
                position: absolute;
                margin-top: 9px;
                margin-left: 1.4rem;
                width: 18px;
                height: 18px;
            }
        }

        @media (min-width: 1025px) {

            /* Atur gaya CSS khusus untuk perangkat laptop di sini */
            .img {
                display: inline;
            }

        }

        .bg {
            position: absolute;
            bottom: 0;
            background-color: #2F5EA2;
            width: 710px;
        }
        .tex {
                margin-right: 20%;
            }

        .fot {
            display: none;
        }

        /* Responsive styles for smaller screens (e.g., tablets and below) */
        @media (max-width: 768px) {
            .bg {
                width: 100%;
                /* Make it full width on smaller screens */
                height: auto;
                /* Automatically adjust the height based on content */
            }

            .tex {
                margin-right: 20%;
            }

            .fot {
                display: inline;
            }
        }

        /* CSS untuk perangkat tablet (misalnya, lebar layar antara 600px dan 1024px) */
        @media (min-width: 601px) and (max-width: 1024px) {

            /* Atur gaya CSS khusus untuk perangkat tablet di sini */
            .img {
                display: none;
            }

            .col-lg-6 {
                width: 100%;
            }

            .rigth {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }

            .fot {
                display: inline;
            }
        }
        .gar:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        // window.addEventListener('resize', function() {
        //     var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body
        //         .clientWidth;
        //     if (screenWidth <= 768) { // Adjusted to 768px to match the tablet width
        //         var imgElement = document.querySelector('.img');
        //         if (imgElement) {
        //             imgElement.remove(); // Remove the element with class "img" on tablet screens
        //         }
        //     }
        // });
    </script>


</head>

<body>
    <div class="row justify-content-center gm">
        <div class="">
            <div class="card mb-0 p-0 d-flex justify-content-between">
                <div class="row" style="background-color: #D2E0FB; ">
                    <div class="col-lg-6 col-md-9 col-sm-10 col-lg-6 img position-relative" style="padding: 0;">
                        <div class="card" style="box-shadow: none; padding: 0;margin:0;">
                            <div class="card-body" style="background-color:  #D2E0FB;padding:0;">
                                <!-- <center> -->
                                <div class="mt-5 tek" style=" position: absolute; top: 80px;margin-left: 10%; ">
                                    <img src="{{ asset('template/image/logobaru.png') }} " width="150" height="40">
                                    <h4>Pemendek Link dengan sekali ketuk</h4>
                                    <h4>Bikin tautanmu makin singkat !</h4>
                                    <h5 style="color: #104898;">
                                        Daftar dan nikmati pengalaman yang menarik pada website kami
                                    </h5>
                                    <!-- <center> -->
                                    <!-- </center> -->
                                </div>
                                <!-- </center> -->
                            </div>
                        </div>
                        <!-- <div class="bg" style="height: 5rem;"> -->
                        <!-- <a href="{{ url('id/home') }}"><p style="padding: 33px; color: #fff;">&nbsp;<i class="fa-solid fa-chevron-left"></i>&nbsp;<i class="fa-solid fa-chevron-left"></i>&nbsp;Kembali ke Landing Page</p></a> -->
                        <!-- </div> -->
                        <img src="{{ asset('template/image/Saly-17.png') }} " width="500" height="400" style=" position: absolute; bottom: 0;margin-left: 13%">
                    </div>
                    <div class="col-6 right-section col-lg-6">
                        <div class="card rigth" style="box-shadow: -5px 0 5px rgba(0,0,0,0.1);margin-bottom: 0;">
                            <div class="card-body p-sm-5 m-lg-3">
                                <center>
                                <img class="fot" src="{{ asset('template/image/Asset 1.png') }} " width="150" height="40" style="object-fit: contain;">
                                <div class=" mt-3">
                                    <h5 class="fs-3xl">Selamat Datang Kembali !</h5>
                                    <p class="text-muted">Masuk untuk melanjutkan ke MILINK</p>
                                </div>
                                </center>
                                <div class=" mt-3">
                                    <form action="{{ route('login.user') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <div class="position-relative ">
                                                <input type="text" class="form-control password-input @error('email')
                                                        is-invalid
                                                        @enderror" name="email" id="username" placeholder="Masukkan Email" value="{{ old('email') }}">
                                            </div>
                                            <div>
                                                @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Kata Sandi</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Masukkan Kata Sandi" id="password-input" value="{{ old('password') }}">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                <div>
                                                    @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <a href="{{ url('id/send-email') }}" class="text-muted">Lupa kata
                                                    sandi?</a>
                                            </div>
                                            <div class="mb-3 form-check col-4">
                                                <input type="checkbox" class="form-check-input" id="remember" name="remember_me">
                                                <label class="form-check-label" for="remember">Ingatkan
                                                    saya</label>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn w-100 custom-btn" style="background-color: #2F5EA2; color: #fff" type="submit">Masuk</button>
                                        </div>
                                        <div class="mt-1 pt-2 text-center">
                                            <div class="signin-other-title position-relative">
                                                <h5 class="fs-sm mb-4 title">Login dengan</h5>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <div class="col-6">
                                                    <div class="pt-2 hstack gap-2 justify-content-center">
                                                        <a href="{{ route('redirect.google') }}" style="width: 100%;">
                                                            <div class="google-btn">
                                                                <div class="google">
                                                                    <img class="google-icon d-flex justify-content-center" src="https://i.ibb.co/ydLySMx/google.png" />
                                                                    <h6 class="btn-text" style="padding: 11px;">Google</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="pt-2 hstack gap-2 justify-content-center">
                                                        <a href="{{ route('redirect.facebook') }}" style="width: 100%;">
                                                            <div class="google-btn">
                                                                <div class="google">
                                                                    <img class="google-icone d-flex justify-content-center" src="https://i.ibb.co/pnpDRC6/facebook.png" />
                                                                    <h6 class="btn-text" style="padding: 11px;">Facebook</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <center>
                                        <div class="mt-3">
                                            <p class="fw-semibold text-secondary ">Belum Punya Akun ? Klik <a href="{{ url('id/register') }}" class="fw-semibold" style="color: #2F5EA2;">Daftar</a> </p>
                                            <p class="fw-semibold text-muted gar"><a href="{{ url('id/home') }}" class="fw-semibold text-muted" style="color: #000;">Kembali</a> </p>
                                        </div>
                                    </center>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

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
