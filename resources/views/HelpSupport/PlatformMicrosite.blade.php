<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Link | Layanan Microsite</title>

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
        .navbar-expand-lg .navbar-nav .nav-link {
    padding: 5px 20px;
    font-weight: 500;
    font-family: 'Poppins', sans-serif; 
    color: var(--text-white);
}
.nav-link {
    display: block;
}
.a {
    text-decoration: none;
}
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{-- <a href="/HelpSupport" class="col-1 btn btn-info btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a> --}}
                    <p></p>
                    <div class="col-12">
                        <div class="accordion accordion-border-box" id="genques-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo"
                                        aria-expanded="false" aria-controls="genques-collapseTwo">
                                        Bagaimana cara menghapus microsite?
                                    </button>
                                </h2>
                                <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        <p>1. Login ke dalam akun Go.Link anda dan masuk ke Dashboard 
                                        </p>
                                        <p>2. Pilih Microsite yang ingin anda edit dengan pilih Edit
                                        </p>
                                        <p>3. Pilih pengaturan</p>
                                        <p>4. Scroll kebawah dan pilih Hapus Microsite</p>
                                        <p>5. Ketik nama microsite/alamat microsite nya dan klik Hapus
                                                Microsite</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#genques-collapseThree"
                                        aria-expanded="false" aria-controls="genques-collapseThree">
                                        Apakah ada batasan dalam membuat Microsite
                                    </button>
                                </h2>
                                <div id="genques-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        <p>Untuk saat ini, batas pembuatan microsite untuk</p>
                                        <p>Pengguna Gratis - 5 Microsite</p>
                                        <p>Pengguna Lite - 10 Microsite</p>
                                        <p>Pengguna Berlangganan - 30 Microsite</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#genques-collapsefour"
                                        aria-expanded="false" aria-controls="genques-collapsefour">
                                        Cara Membagikan Link Microsite
                                    </button>
                                </h2>
                                <div id="genques-collapsefour" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        <p>1. Di Dashboard Go.Link Anda Klik Microsite</p>
                                        <p>2. Kemudian pilih URL Microsite yang ingin Anda bagikan
                                        </p>
                                        <p>3. Klik Bagikan</p>
                                        <p>4. Pilih Media social yang ingin kamu bagikan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end accordion-->
                    </div>
                </div><!--end row-->
            </div>
        </div>
    </div>
    @auth
        <footer>
            <div class="top_footer" id="kontak">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="abt_side">
                                <div class="logo">
                                    <img src="https://i.postimg.cc/QxLvZmbf/linkbaru.png" alt="image"
                                        style="margin-top: -5%;">
                                    <ul style="margin-bottom: -50%; margin-right:10px;">
                                        <li style="color: white; font-size:14px;">{!! $data->description !!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Links -->

                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="links">
                                <h3>Dukungan</h3>
                                <ul style="padding: 0;">
                                    <li><a href="/HelpSupport">Bantuan dan Dukungan</a></li>
                                    <li><a href="/Privacy">Kebijakan Privasi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="links">
                                <h3>Peta Situs</h3>
                                <ul style="padding: 0;">
                                    <li><a href="/">Beranda</a></li>
                                    <li><a href="/Shortlink">Perpendek Link</a></li>
                                    <li><a href="/Microsite">Situs Mikro</a></li>
                                    <li><a href="/Subscribe">Berlanggaan</a></li>

                                </ul>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="links">
                                <h3>Hubungi Kami</h3>
                                <ul style="text-align: justify; padding:0;">
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}&text=Halo%2C%20saya%20pengguna%20LINKID"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                            Whatsapp
                                            {{-- {{ $data->whatsapp }} --}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                            Instagram
                                            {{-- {{ $data->instagram }} --}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/{{ $data->twitter }}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                            Twitter
                                            {{-- {{ $data->twitter }} --}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @auth
                            <!-- Comment Form -->
                            <div class="col-lg-3 col-md-6 col-12 mb-1">
                                <form action="/create/{{ Auth::user()->id }}" id="commentForm" method="POST"
                                    enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Tambahkan Komentar" name="isikomentar" style="font-size:12px ;"></textarea>
                                    @error('isikomentar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="text-start mt-2">
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="bottom_footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <p>© Go.Link Dikelola oleh PT. Hummatech</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Go Top Button -->
            <div class="go_top">
                <span><img src="https://i.postimg.cc/MZtYYpPg/go-top.png" alt="image"></span>
            </div>
        </footer>
        <!-- Footer-Section end -->
    @else
        <footer>
            <div class="top_footer" id="kontak">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="abt_side">
                                <div class="logo">
                                    <img src="https://i.postimg.cc/QxLvZmbf/linkbaru.png" alt="image"
                                        style="margin-top: -10%;">
                                    <ul style="margin-bottom: -50%; margin-right:10px;">
                                        <li style="color: white; font-size:14px;">{!! $data->description !!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Links -->

                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="links">
                                <h3>Dukungan</h3>
                                <ul style=" padding:0;">
                                    <li><a href="/HelpSupport">Bantuan dan Dukungan</a></li>
                                    <li><a href="/Privacy">Kebijakan Privasi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12" style="margin-left: 6%;">
                            <div class="links">
                                <h3>Peta Situs</h3>
                                <ul style=" padding:0;">
                                    <li><a href="/">Beranda</a></li>
                                    <li><a href="/Shortlink">Perpendek Link</a></li>
                                    <li><a href="/Microsite">Situs Mikro</a></li>
                                    <li><a href="/Subscribe">Berlanggaan</a></li>

                                </ul>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="links">
                                <h3>Hubungi Kami</h3>
                                <ul style="text-align: justify;  padding:0;">
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}&text=Halo%2C%20saya%20pengguna%20LINKID"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                            Whatsapp
                                            {{-- {{ $data->whatsapp }} --}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                            Instagram
                                            {{-- {{ $data->instagram }} --}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/{{ $data->twitter }}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                            Twitter
                                            {{-- {{ $data->twitter }} --}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @auth
                            <!-- Comment Form -->
                            <div class="col-lg-3 col-md-6 col-12 mb-1">
                                <form action="/create/{{ Auth::user()->id }}" id="commentForm" method="POST"
                                    enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Tambahkan Komentar" name="isikomentar" style="font-size:12px ;"></textarea>
                                    @error('isikomentar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="text-start mt-2">
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        @endauth

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
