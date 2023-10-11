<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Link | Pengumuman</title>

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
        <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="p-3 mb-2 text-white text-center" style="background-color:#104898; height: 200px; margin-bottom: 10%; font-size:50px;">Memulai</div> --}}
                            {{-- <a href="/HelpSupport" class="col-1 btn btn-info btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a> --}}
                            <p></p>
        
                            <div kelas="col-xl-12">
                                <h5><strong>Kebijakan Privasi</strong></h5>
        
                                <p>Hummasoft Technology membangun aplikasi Go.Link sebagai aplikasi Komersial. LAYANAN ini
                                    adalah
                                    disediakan oleh Hummasoft Technology dan dimaksudkan untuk digunakan sebagaimana adanya.</p>
        
                                <p>Halaman ini digunakan untuk memberi tahu pengunjung mengenai kebijakan kami terkait
                                    pengumpulan, penggunaan, dan
                                    pengungkapan Informasi Pribadi jika ada yang memutuskan untuk menggunakan Layanan kami.</p>
        
                                <p>Jika Anda memilih untuk menggunakan Layanan kami, maka Anda menyetujui pengumpulan dan
                                    penggunaan informasi di
                                    kaitannya dengan kebijakan ini. Informasi Pribadi yang kami kumpulkan digunakan untuk
                                    menyediakan dan
                                    meningkatkan Layanan. Kami tidak akan menggunakan atau membagikan informasi Anda kepada
                                    siapa pun kecuali sebagai
                                    dijelaskan dalam Kebijakan Privasi ini.</p>
        
                                <p>Istilah yang digunakan dalam Kebijakan Privasi ini memiliki arti yang sama dengan <a
                                        style="color: #104898" href="{{ url ('landingpage/Privacy')}}">Syarat dan Ketentuan</a>, yang dapat diakses di
                                    Go.Link kecuali ditentukan lain dalam Kebijakan Privasi ini.</p>
        
                                <h3>
                                    <kuat></strong>
                                </h3>
        
                                <p>Untuk pengalaman yang lebih baik, saat menggunakan Layanan kami, kami mungkin meminta Anda
                                    untuk memberikannya kepada kami
                                    informasi pengenal pribadi tertentu, termasuk namun tidak terbatas pada
                                    Go.Link. Informasi yang kami minta akan kami simpan dan gunakan sebagai
                                    dijelaskan dalam kebijakan privasi ini.</p>
        
                                <p>Aplikasi ini menggunakan layanan pihak ketiga yang mungkin mengumpulkan informasi yang
                                    digunakan untuk mengidentifikasi Anda.</p>
        
                                <h5><strong>Data Log</strong></h5>
        
                                <p>Kami ingin memberi tahu Anda bahwa setiap kali Anda menggunakan Layanan kami, jika terjadi
                                    kesalahan pada aplikasi, kami
                                    mengumpulkan data dan informasi (melalui produk pihak ketiga) di ponsel Anda yang disebut
                                    Data Log.
                                    Data Log ini mungkin mencakup informasi seperti Protokol Internet (“IP”) perangkat Anda
                                    alamat, nama perangkat, versi sistem operasi, konfigurasi aplikasi saat digunakan
                                    Layanan kami, waktu dan tanggal penggunaan Layanan oleh Anda, dan statistik lainnya.</p>
        
                                <h5><strong>Cookie</strong></h5>
        
                                <p>Cookie adalah file dengan sejumlah kecil data yang biasanya digunakan sebagai unik anonim
                                    pengidentifikasi. Ini adalah</p>
                                <p>dikirim ke browser Anda dari situs web yang Anda kunjungi</p>
        
                            </div>
                        </div><!--end row-->
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
