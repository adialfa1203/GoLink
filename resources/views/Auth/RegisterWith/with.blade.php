<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:51 GMT -->

<head>

    <meta charset="utf-8">
    <title>Buat Akun | Go.Link</title>
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
    <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card mb-0">
                        <div class="row g-0 align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-0 border-0 shadow-none mb-0">
                                        <div class="card-body p-sm-5 m-lg-4">
                                            <div class="text-center">
                                                <h5 class="fs-3xl">Konfirmasi Akun Anda</h5>
                                                <p class="text-muted mb-5">Anda perlu konfirmasi Akun Anda di halaman ini. Jika tidak, pendaftaran akun Anda akan dibatalkan.</p>
                                            </div>
                                            <div class="p-2">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="email" value="">
                                                    <!-- Hidden input for email -->
                                                    <div>
                                                        @error('password')
                                                            <div class="alert alert-danger"></div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        @error('password_confirmation')
                                                            <div class="alert alert-danger"></div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="name-input">Nama Lengkap</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input name="name" type="text" class="form-control pe-5 password-input" onpaste="return false" placeholder="Masukkan Nama Lengkap" value="{{ $githubUserData['name'] }}" id="name-input">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="number-input">Nomor Ponsel</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input name="number" type="number" class="form-control pe-5 number-input" onpaste="return false" placeholder="Masukkan Nomor Ponsel" id="number-input">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="email-input">Email</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input name="email" type="email" class="form-control pe-5 email-input" onpaste="return false" placeholder="Masukkan Email" value="{{ $githubUserData['email'] }}" id="email-input">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">Kata Sandi</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input name="password" type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Masukkan kata sandi" id="password-input">
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        </div>
                                                        <div id="passwordInput"
                                                            class="form-text">Kata sandi Anda harus sepanjang 8-20
                                                            karakter.</div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="confirm-password-input">Konfirmasi Kata Sandi</label>
                                                        <div
                                                            class="position-relative auth-pass-inputgroup mb-3">
                                                            <input name="password_confirmation" type="password"
                                                                class="form-control pe-5 password-input"
                                                                onpaste="return false" placeholder="Korfirmasi kata sandi" id="confirm-password-input">
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                                                        </div>
                                                    </div>

                                                    <div id="password-contain"
                                                        class="p-3 bg-light mb-2 rounded">
                                                        <h5 class="fs-sm">Password must contain:</h5>
                                                        <p id="pass-length"
                                                            class="invalid fs-xs mb-2">Minimum <b>8 characters</b></p>
                                                        <p id="pass-lower"
                                                            class="invalid fs-xs mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                        <p id="pass-upper"
                                                            class="invalid fs-xs mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                        <p id="pass-number"
                                                            class="invalid fs-xs mb-0">A least <b>number</b> (0-9)</p>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100"
                                                            type="submit">Lanjutkan dan Daftar</button>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Tunggu, saya sudah mempunyai akun ... <a
                                                        href="{{ url('login') }}"
                                                        class="fw-semibold text-primary text-decoration-underline"> Masuk </a>
                                                </p>
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
