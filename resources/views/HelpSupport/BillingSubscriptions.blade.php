<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiLink | Berlangganan</title>

    <!-- icofont-css-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/icofont.min.css') }}">
    <!-- Owl-Carosal-Style-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/owl.carousel.min.css') }}">
    <!-- Bootstrap-Style-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap.min.css') }}">
    <!-- Aos-Style-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/aos.css') }}">
    <!-- Coustome-Style-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}">
    <!-- Responsive-Style-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/responsive.css') }}">
    <!-- waveanimation-Style-link -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/wave-animation-style.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}"
        style="width: 200px; height: 200px;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/icons.min.css') }}" rel="stylesheet"
        type="text/css">
</head>

<body>
    <style>
        .custom-btn {
            width: 100%;
            max-width: 300px;
            /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
            margin: 5px;
            /* Sesuaikan jarak antara tombol jika diperlukan */
        }

        header {
            height: 100px;
            /* Ganti dengan tinggi yang Anda inginkan */
        }

        header {
            padding: 20px 0;
            /* Atur padding sesuai kebutuhan Anda */
        }

        .text-muted {
            --tb-text-opacity: 1;
            color: var(--tb-secondary-color) !important;
        }

        .hidden {
            display: none;
        }

        /* Style untuk accordion wrapper */
        .custom-accordionwithicon {
            max-width: 100%;
            /* Sesuaikan lebar sesuai kebutuhan Anda */
            margin: 0 auto;
            background-color: #F6F4FE;
            /* Warna latar belakang */
            /* border: 1px solid #fff; */
            border-radius: 5px;
            /* Sudut border */
        }

        /* Style untuk accordion item */
        .accordion-item {
            background-color: #fff;
            /* Warna latar belakang item */
            border-bottom: 1px solid #fff;
            /* Garis pembatas antar item */
        }

        /* Style untuk judul accordion */
        .accordion-button {
            background-color: #fff;
            /* Warna latar belakang tombol */
            color: ##104898;
            /* Warna teks tombol */
            font-weight: bold;
            font-size: 16px;
            padding: 15px;
            /* Padding tombol */
            width: 100%;
            text-align: left;
            /* Teks rata kiri */
            border: none;
            border-radius: 0;
            outline: none;
            transition: background-color 0.3s ease;
            /* Efek hover */
            display: flex;
            /* Membuat konten tombol menggunakan flexbox */
            justify-content: space-between;
            /* Mengatur jarak antara teks tombol dan ikon (jika ada) */
            align-items: center;
            padding-right: 10px;
        }

        /* Style untuk judul accordion saat dihover */
        .accordion-button:hover {
            background-color: #fff;
        }

        /* Style untuk konten accordion */
        .accordion-body {
            padding: 15px 20px;
            /* Padding konten */
            line-height: 1.6;
            /* Line height konten */
            color: #555;
            /* Warna teks konten */
        }

        /* Style untuk accordion yang sedang terbuka */
        .accordion-button[aria-expanded="true"] {
            background-color: #104898;
            /* Warna latar belakang tombol saat terbuka */
            color: #fff;
            /* Warna teks tombol saat terbuka */
        }
    </style>

    <!-- Page-wrapper-Start -->
    <div class="page_wrapper">

        <!-- Preloader -->
        <div id="preloader">
            <div id="loader"></div>
        </div>

        <!-- Header Start -->
        @include('layout.landingPage.header')

        <!-- Banner-Section-Start -->
        <section class="banner_section mb-5" id="beranda">
            <!-- container start -->


            <!-- container end -->

            <!-- wave animation start -->
            <div>
                {{-- <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave"
                            d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#f6f4fe" />
                    </g>
                </svg> --}}
            </div>
            <!-- wave animation end -->

        </section>
        <div class="container mb-12">
            <!-- Accordions Bordered -->

            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-secondary"
                id="accordionBordered">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionborderedExample1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accor_borderedExamplecollapse1" aria-expanded="true"
                            aria-controls="accor_borderedExamplecollapse1" style="backround">
                            Keuntungan Layanan Starter
                        </button>
                    </h2>
                    <div id="accor_borderedExamplecollapse1" class="accordion-collapse collapse show"
                        aria-labelledby="accordionborderedExample1" data-bs-parent="#accordionBordered">
                        <div class="accordion-body">
                            <p>Apa saja keuntungan dari layanan Starter?</p>

                            <p>Berikut ini adalah fitur-fitur yang tersedia dalam layanan Starter:</p>
                            <p>1. Kustomisasi Nama URL - Anda dapat mengganti nama URL
                                hingga 30 kali per bulan.</p>
                            <p>2. Mengganti Alamat Tujuan Shortlink - Anda dapat
                                mengganti alamat tujuan shortlink hingga 3 kali per bulan.</p>
                            <p>3. Mengganti Nama Microsite</p>
                            <p>4. Menyembunyikan Watermark</p>
                            <p>5. Tampilan Rentang Analitik - Sampai dengan 60 hari.
                            </p>
                            <p>6. Retensi Analitik - Data analitik dapat disimpan
                                hingga 180 hari ke belakang.</p>
                            <p>7. Bebas Iklan</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mt-2 mb-5">
                    <h2 class="accordion-header" id="accordionborderedExample2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accor_borderedExamplecollapse2" aria-expanded="false"
                            aria-controls="accor_borderedExamplecollapse2">
                            Bagaimana cara berlangganan di MiLink?
                        </button>
                    </h2>
                    <div id="accor_borderedExamplecollapse2" class="accordion-collapse collapse"
                        aria-labelledby="accordionborderedExample2" data-bs-parent="#accordionBordered">
                        <div class="accordion-body">
                            <p>1. Kunjungi https://home.MiLink/subscription </p>
                            <p>2. Silahkan Login dahulu dengan klik Masuk/Daftar sebelah kanan
                                atas</p>
                            <p>3. Pilih paket yang kamu butuhkan</p>
                            <p>4. Klik process <i>payment</i> atau pembayaran</p>
                            <p>5. Pilih metode pembayaran</p>
                            <p>6. Selamat, pembayaran Anda berhasil</p>
                            <p>7. Riwayat pembayaran Anda akan ada di pengaturan -
                                berlangganan.</p>
                            <p>8. Luar biasa! Kini Anda bisa menikmati semua fitur yang
                                ada.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end col-->

    </div>
    @include('layout.landingPage.footer')
    <!-- Footer-Section end -->

    <!-- VIDEO MODAL -->
    <div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button id="close-video" type="button" class="button btn btn-default text-right" data-dismiss="modal">
                    <i class="icofont-close-line-circled"></i>
                </button>
                <div class="modal-body">
                    <div id="video-container" class="video-container">
                        <iframe id="youtubevideo" src="#" width="640" height="360" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="purple_backdrop"></div>

    </div>
    <!-- Page-wrapper-End -->

    <!-- Jquery-js-Link -->
    <script src="{{ asset('landingpage/js/jquery.js') }}"></script>
    <!-- owl-js-Link -->
    <script src="{{ asset('landingpage/js/owl.carousel.min.js') }}"></script>
    <!-- bootstrap-js-Link -->
    <script src="{{ asset('landingpage/js/bootstrap.min.js') }}"></script>
    <!-- aos-js-Link -->
    <script src="{{ asset('landingpage/js/aos.js') }}"></script>
    <!-- main-js-Link -->
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tombolLihatSelengkapnya = document.getElementById("tombolLihatSelengkapnya");

            tombolLihatSelengkapnya.addEventListener("click", function() {
                var komentarTersembunyi = document.querySelectorAll(".comment-container.hidden");
                for (var i = 0; i < komentarTersembunyi.length; i++) {
                    komentarTersembunyi[i].style.display = "flex"; // Tampilkan komentar yang tersembunyi
                }
                tombolLihatSelengkapnya.style.display = "none"; // Sembunyikan tombol "Lihat Selengkapnya"
            });
        });
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/plugins.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/app.js') }}"></script>
</body>


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:12:27 GMT -->

</html>
