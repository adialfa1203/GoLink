<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiLink | Pengumuman</title>

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
    <link rel="shortcut icon" href="{{ asset('template/image/M-gelap.png') }}"
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
        <div class="container-fluid">
            <div class="col-xl-12">
                <h5><strong style="color: #0E2954;">Kebijakan Privasi</strong></h5>

                <p>Hummasoft Technology membangun aplikasi MiLink sebagai aplikasi Komersial. LAYANAN ini adalah
                    disediakan oleh Hummasoft Technology dan dimaksudkan untuk digunakan sebagaimana adanya.</p>

                <p>Halaman ini digunakan untuk memberi tahu pengunjung mengenai kebijakan kami terkait pengumpulan,
                    penggunaan, dan pengungkapan Informasi Pribadi jika ada yang memutuskan untuk menggunakan Layanan
                    kami.</p>

                <p>Jika Anda memilih untuk menggunakan Layanan kami, maka Anda menyetujui pengumpulan dan penggunaan
                    informasi di kaitannya dengan kebijakan ini. Informasi Pribadi yang kami kumpulkan digunakan untuk
                    menyediakan dan meningkatkan Layanan. Kami tidak akan menggunakan atau membagikan informasi Anda
                    kepada siapa pun kecuali seperti dijelaskan dalam Kebijakan Privasi ini.</p>

                <p>Istilah yang digunakan dalam Kebijakan Privasi ini memiliki arti yang sama dengan <a
                        style="color: #104898" href="{{ url('landingpage/Privacy') }}">Syarat dan Ketentuan</a>, yang
                    dapat diakses di MiLink kecuali ditentukan lain dalam Kebijakan Privasi ini.</p>

                <h3 style="font-size: 20px;"><strong>Ketentuan Pengumpulan Informasi</strong></h3>

                <p>Untuk pengalaman yang lebih baik, saat menggunakan Layanan kami, kami mungkin meminta Anda untuk
                    memberikan informasi pengenal pribadi tertentu, termasuk namun tidak terbatas pada MiLink. Informasi
                    yang kami minta akan kami simpan dan gunakan sebagaimana dijelaskan dalam kebijakan privasi ini.</p>

                <p>Aplikasi ini menggunakan layanan pihak ketiga yang mungkin mengumpulkan informasi yang digunakan
                    untuk mengidentifikasi Anda.</p>

                <h5 style="font-size: 20px;"><strong>Data Log</strong></h5>

                <p>Ketika Anda menggunakan Layanan kami, kami secara otomatis mengumpulkan informasi seperti alamat IP perangkat Anda,
                    nama perangkat, versi sistem operasi, konfigurasi aplikasi, waktu dan tanggal penggunaan, serta statistik lainnya.
                     Tujuannya adalah untuk memantau dan meningkatkan kinerja Layanan serta mengidentifikasi masalah teknis.</p>

                <h5 style="font-size: 20px;"><strong>Cookie</strong></h5>

                <p>Cookie adalah file kecil yang disimpan di perangkat Anda ketika Anda mengunjungi Layanan kami. Mereka digunakan
                    untuk menyimpan preferensi pengguna, mengumpulkan data tentang interaksi pengguna, dan meningkatkan keamanan.
                     Anda dapat mengelola pengaturan cookie melalui peramban Anda.</p>
                <h5 style="font-size: 20px;"><strong>Penggunaan Informasi</strong></h5>

<p>Kami menggunakan informasi yang kami kumpulkan untuk berbagai tujuan, termasuk:</p>

<ul>
    <li>Memberikan dan memelihara Layanan</li>
    <li>Memperingatkan Anda tentang perubahan pada Layanan kami</li>
    <li>Memungkinkan Anda berpartisipasi dalam fitur-fitur interaktif Layanan kami ketika Anda memilih untuk
        melakukannya</li>
    <li>Mengawasi penggunaan Layanan</li>
    <li>Mengumpulkan analisis atau informasi berharga lainnya agar kami dapat meningkatkan Layanan</li>
</ul>
<h5 style="font-size: 20px;"><strong>Keamanan</strong></h5>

<p>Kami menghargai kepercayaan Anda dalam menyediakan Informasi Pribadi Anda, oleh karena itu kami berusaha
    untuk menggunakan cara yang dapat diterima secara komersial untuk melindungi informasi tersebut. Namun
    ingatlah bahwa tidak ada metode transmisi melalui internet, atau metode penyimpanan elektronik, yang
    100% aman dan andal, dan kami tidak dapat menjamin keamanan absolut.</p>

<h5 style="font-size: 20px;"><strong>Perubahan Kebijakan Privasi</strong></h5>

<p>Kami dapat memperbarui Kebijakan Privasi kami dari waktu ke waktu. Oleh karena itu, kami menyarankan Anda
    untuk meninjau halaman ini secara berkala untuk setiap perubahan. Kami akan memberi tahu Anda tentang
    perubahan dengan memposting Kebijakan Privasi baru di halaman ini.</p>

<h5 style="font-size: 20px;"><strong>Hubungi Kami</strong></h5>

<p>Jika Anda memiliki pertanyaan atau saran tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami
    melalui media sosial kami.</p>

<p>Halaman Kebijakan Privasi ini efektif sejak tanggal 19 Oktober 2023.</p>

            </div>
        </div><!--end col-->

    </div>
    <br>
    <br>
    <br>
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
