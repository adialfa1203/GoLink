<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiLink | Penyingkat Tautan</title>

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

        .custom-accordionwithicon {
            border-radius: 15px;
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
            border-radius: 15px;
            background-color: #fff;
            /* Warna latar belakang item */
            /* border-bottom: 1px solid #fff; */
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
            border-radius: 15px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
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
            border-radius: 0 0 15px 15px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);

            /* Warna teks konten */
        }

        /* Style untuk accordion yang sedang terbuka */
        .accordion-button[aria-expanded="true"] {
            border-radius: 15px 15px 0 0;
            background-color: #0E2954;
            /* Warna latar belakang tombol saat terbuka */
            color: #fff;
            /* Warna teks tombol saat terbuka */
        }
        .accordion-button i.fas.fa-chevron-right {
    margin-right: 3%; /* Ubah angka sesuai dengan seberapa jauh Anda ingin menggeser ikon ke kiri */
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
            <h1 style="color: #0E2954; font-size: 25px; font-weight: bold; margin-left: 1%;">Penyingkat Tautan</h1>

            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-secondary mt-3"
                id="accordionBordered">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionborderedExample1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accor_borderedExamplecollapse1" aria-expanded="true"
                            aria-controls="accor_borderedExamplecollapse1" style="backround">
                            Bagaimana jika link yang saya buat telah Kadaluarsa?
                            <i class="fas fa-chevron-right"></i>

                        </button>
                    </h2>
                    <div id="accor_borderedExamplecollapse1" class="accordion-collapse collapse show"
                        aria-labelledby="accordionborderedExample1" data-bs-parent="#accordionBordered">
                        <div class="accordion-body">
                            <p>Jika Link Anda sudah Kaaluarsa atau lewat tenggat maka link Anda akan berada di menu
                                History. Dimana Menu History atau riwayat adalah untuk menampung semua Link anda yang
                                telah Kadaluarsa</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mt-2 mb-5">
                    <h2 class="accordion-header" id="accordionborderedExample2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accor_borderedExamplecollapse2" aria-expanded="false"
                            aria-controls="accor_borderedExamplecollapse2">
                            Apakah ada batasan kuota dalam membuat tautan pendek?
                            <i class="fas fa-chevron-right"></i>

                        </button>
                    </h2>
                    <div id="accor_borderedExamplecollapse2" class="accordion-collapse collapse"
                        aria-labelledby="accordionborderedExample2" data-bs-parent="#accordionBordered">
                        <div class="accordion-body">
                            <p> Kuota bulanan untuk membuat shortlink/tautan pendek di MiLink adalah :</p>
                            <p><strong>Gratis - 100/bulan</strong></p>
                            <p><strong>Ringan - 100/bulan</strong></p>
                            <p><strong>Premium - 300/bulan</strong></p>
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
