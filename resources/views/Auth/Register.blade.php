<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 01:40:51 GMT -->

<head>

    <meta charset="utf-8">
    <title>Daftar | Go Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}"
        style="width: 200px; height: 200px;">

    <!-- Fonts css load -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link id="fontsLink"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

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

</head>

<body>
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
                                            <h5 class="fs-3xl" style="color: #104898">DAFTAR</h5>
                                            <p class="text-muted">Silahkan lengkapi seluruh data dibawah ini!</p>
                                        </div>
                                        <div class="p-2 mt-5">
                                            <form action="{{ route('register.user') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <div class="position-relative">
                                                        <input name="name" type="text"
                                                            class="form-control password-input"
                                                            placeholder="Masukkan Nama Lengkap"
                                                            value="{{ old('name') }}">
                                                    </div>
                                                    <div>
                                                        @if ($errors->has('name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomer Ponsel</label>
                                                    <div class="position-relative">
                                                        <input name="number" type="number" class="form-control"
                                                            placeholder="Masukkan Nomor Ponsel"
                                                            value="{{ old('number') }}">
                                                    </div>
                                                    <div>
                                                        @if ($errors->has('number'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('number') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <div class="position-relative">
                                                        <input name="email" type="text"
                                                            class="form-control password-input" id="email"
                                                            placeholder="Masukkan Email" value="{{ old('email') }}">
                                                    </div>
                                                    <span id="emailError" class="text-danger"></span>
                                                    <span id="successMessage" class="text-success"></span>
                                                    <div>
                                                        @if ($errors->has('email'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Kata Sandi</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input name="password" type="password" id="newPassword"
                                                            class="form-control pe-5 password-input"
                                                            placeholder="Masukkan Kata Sandi" id="password-input"
                                                            value="{{ old('password') }}">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon">
                                                            <i class="ri-eye-fill align-middle"></i>
                                                        </button>
                                                        <div id="newPasswordError" class="text-danger mt-2">
                                                        </div>
                                                        <div id="newPasswordSuccess" class="text-success mt-2">
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('password'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Ulangi Kata
                                                        Sandi</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input name="password_confirmation" type="password"
                                                            id="confirmPassword"
                                                            class="form-control pe-5 password-input"
                                                            placeholder="Masukkan ulang Kata Sandi"
                                                            id="password-input">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon">
                                                            <i class="ri-eye-fill align-middle"></i>
                                                        </button>
                                                        <div id="confirmPasswordError" class="text-danger mt-2"></div>
                                                        <div id="confirmPasswordSuccess" class="text-success mt-2">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        @if ($errors->has('password_confirmation'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" onchange="enableButton()">
                                                    <label class="form-check-label" for="remember">Saya setuju dengan
                                                        <a href="#" data-bs-target="#myModal"
                                                            data-bs-toggle="modal" id="privacyLink">Kebijakan
                                                            Privasi</a></label>
                                                </div>
                                                <div>
                                                    @if ($errors->has('remember'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('remember') }}</span>
                                                    @endif
                                                </div>
                                                <div id="myModal" class="modal fade" tabindex="-1"
                                                    aria-labelledby="myModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">
                                                                    Kebijakan Privasi</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Hummasoft Technology membangun aplikasi GoLink
                                                                    sebagai aplikasi Komersial. LAYANAN ini adalah
                                                                    disediakan oleh Hummasoft Technology dan
                                                                    dimaksudkan untuk digunakan sebagaimana adanya.
                                                                </p>
                                                                <p>Halaman ini digunakan untuk memberi tahu
                                                                    pengunjung mengenai kebijakan kami terkait
                                                                    pengumpulan, penggunaan, dan pengungkapan Informasi
                                                                    Pribadi jika ada yang memutuskan untuk menggunakan
                                                                    Layanan kami.</p>

                                                                <p>Jika Anda memilih untuk menggunakan Layanan kami,
                                                                    maka Anda menyetujui pengumpulan dan penggunaan
                                                                    informasi di kaitannya dengan kebijakan ini.
                                                                    Informasi Pribadi yang kami kumpulkan digunakan
                                                                    untuk menyediakan dan meningkatkan Layanan. Kami
                                                                    tidak akan menggunakan atau membagikan informasi
                                                                    Anda kepada siapa pun kecuali sebagai dijelaskan
                                                                    dalam Kebijakan Privasi ini.</p>

                                                                <p>Istilah yang digunakan dalam Kebijakan Privasi
                                                                    ini memiliki arti yang sama dengan <a
                                                                        href="{{ url('landing-page/privacy') }}">Syarat
                                                                        dan Ketentuan</a>,
                                                                    yang dapat diakses di GoLink kecuali ditentukan
                                                                    lain dalam Kebijakan Privasi ini.</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100 custom-btn" type="submit"
                                                        id="submitButton" disabled>Daftar</button>
                                                </div>
                                            </form>
                                            <div class="text-center mt-5">
                                                <p class="mb-0">Sudah memiliki akun ? <a
                                                        href="{{ route('login') }}"
                                                        class="fw-semibold text-secondary text-decoration-underline">
                                                        Masuk</a> </p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <div class="col-6 right-section img col-lg-6">
                                <center>
                                    <div class="w-100" style="margin-top: 20% ">
                                        <img src="{{ asset('template/image/Login.png') }} " width="400"
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
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/plugins.js') }}"></script>



    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/password-addon.init.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- swiper.init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/swiper.init.js') }}"></script>

    <script>
        function enableButton() {
            const rememberCheckbox = document.getElementById('remember');
            const submitButton = document.getElementById('submitButton');
            if (rememberCheckbox.checked) {
                submitButton.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
            }
        }
    </script>
    {{-- Email Validation --}}
    <script>
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const successMessage = document.getElementById('successMessage');

        emailInput.addEventListener('input', validateEmail);

        function validateEmail() {
            const email = emailInput.value;
            const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            const isValidEmail = emailRegex.test(email);

            emailError.textContent = '';
            successMessage.textContent = '';

            if (!isValidEmail) {
                emailError.textContent = 'Alamat email tidak valid. Pastikan formatnya seperti namaemail@domain.ekstensi.';
            } else {
                successMessage.textContent = 'Email Anda valid!';
            }
        }
    </script>

    {{-- Validation Conrifmation New Password --}}
    <script>
        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const newPasswordError = document.getElementById('newPasswordError');
        const newPasswordSuccess = document.getElementById('newPasswordSuccess');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const confirmPasswordSuccess = document.getElementById('confirmPasswordSuccess');

        newPasswordInput.addEventListener('input', validatePassword);
        confirmPasswordInput.addEventListener('input', validatePassword);

        function validatePassword() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (newPassword.length < 8) {
                newPasswordError.textContent = 'Kata sandi harus memiliki setidaknya 8 karakter.';
            } else {
                newPasswordError.textContent = '';
            }

            if (confirmPassword !== newPassword) {
                confirmPasswordError.textContent = 'Ulangi kata sandi tidak cocok.';
                confirmPasswordSuccess.textContent = '';
            } else {
                confirmPasswordError.textContent = '';
                confirmPasswordSuccess.textContent = 'Ulangi kata sandi sudah benar';
            }
        }
    </script>
</body>

</html>
