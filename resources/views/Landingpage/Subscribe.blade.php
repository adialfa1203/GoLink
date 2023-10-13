<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiLink</title>

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
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}" style="width: 200px; height: 200px;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <style>
        input,
        textarea {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            outline: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        strong,
        b {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        img {
            border: 0;
            max-width: 100%;
        }



        /** page structure **/
        #wrapper {
            display: block;
            width: ;
            background: #104898;
            margin: 0 auto;
            padding: 10px 17px;
            -webkit-box-shadow: 2px 2px 3px -1px rgba(0, 0, 0, 0.35);
        }

        #keywords {
            margin: 0 auto;
            font-size: 1.2em;
            margin-bottom: 15px;
        }


        #keywords thead {
            cursor: pointer;
            background: #c9dff0;
        }

        #keywords thead tr th {
            font-weight: bold;
            padding: 12px 30px;
            padding-left: 42px;
        }

        #keywords thead tr th span {
            padding-right: 20px;
            background-repeat: no-repeat;
            background-position: 100% 100%;
        }

        #keywords thead tr th.headerSortUp,
        #keywords thead tr th.headerSortDown {
            background: #acc8dd;
        }

        #keywords thead tr th.headerSortUp span {
            background-image: url('https://i.imgur.com/SP99ZPJ.png');
        }

        #keywords thead tr th.headerSortDown span {
            background-image: url('https://i.imgur.com/RkA9MBo.png');
        }


        #keywords tbody tr {
            color: #555;
        }

        #keywords tbody tr td {
            text-align: center;
            padding: 15px 10px;
        }

        #keywords tbody tr td.lalign {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .subscribe-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .control-form {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px 0 0 10px;
        }
        .btn-primary {
            background-color: #fff;
        }

        .button_wrapper {
            margin-block-end: 2%;
        }

        header {
            height: 100px;
            /* Ganti dengan tinggi yang Anda inginkan */
        }

        header {
            padding: 20px 0;
            /* Atur padding sesuai kebutuhan Anda */
        }

        /* tbody tr td {
    color: #fff;
} */

    </style>
<style>
    .navbar-nav a.nav-link.active {
        background-color: #ffffff;
        color: #104898;
        border-start-end-radius: 10px;
        border-top-left-radius: 10px;
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
        <section class="banner_section" id="beranda">
            <!-- container start -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                    <!-- shape animation  -->
                    <span class="banner_shape1"> <img src="https://i.postimg.cc/3RVg0kJv/banner-shape1.png"
                            alt="image"> </span>
                    <span class="banner_shape2"> <img src="https://i.postimg.cc/rp6XjJnn/banner-shape2.png"
                            alt="image"> </span>
                    <span class="banner_shape3"> <img src="https://i.postimg.cc/wxrWDBbF/banner-shape3.png"
                            alt="image"> </span>
                    <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1500">
                        <!-- banner text -->
                        <div class="banner_text">
                            <!-- h1 -->
                            <h2 style="color: white">Jadilah Bagian dari Perubahan!</h2>
                            <!-- p -->
                            <span style="color: white;">Selangkah lebih dekat menuju kemudahan dan kebebasan. bergabung dengan kami sekarang dan niknati keuntungan berikut:</span>
                            <ul style="color: white;">
                                <li>- Mempersingkat URL sesuka hati.</li>
                                <li>- Akses eksklusif ke fitur-fitur canggih.</li>
                                <li>- Pengalaman pengguna yang tak terlupakan.</li>
                            </ul>
                            <p>Tunggu apa lagi? Mari berlangganan untuk masa depan yang lebih baik!</p>
                        </div>
                        <!-- app buttons -->

                        <!-- users -->
                    </div>
                    <!-- banner slides start -->
                    <div class="col-lg-6 col-md-12 aos-init aos-animate d-flex justify-content-start" data-aos="fade-in"
                        data-aos-duration="1500">
                        <div class="banner_image">
                            <img class="moving_animation" src="{{ asset('landing-page 3.png') }}"
                                alt="image">
                        </div>
                    </div>
                    <!-- banner slides end -->


                    <!-- row end -->
                </div>
            </div>

            <!-- container end -->

            <!-- wave animation start -->
            <div>
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                </svg>
            </div>
            <!-- wave animation end -->

        </section>
        <section class="row_am latest_story" id="blog">
            <!-- container start -->
            <div class="container">
                <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                    <h2 style="color: #104898;">Berlangganan Yang Tersedia</h2>
                </div>
                <!-- row start -->
                <div class="row d-flex justify-content-md-center" style="margin-top: 2%;">
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <img src="https://i.postimg.cc/xj3JMTgb/kucing.png" alt="Kode QR" width="300"
                                height="150" style="margin-top: 10%;">
                            <div class="story_text">
                                <h2 class="mb-3 fs-17"><b>Rp 0</b></h2>
                                <h5 class="mb-3 fs-17"><b>Gratis</b></h5>
                                <p class="text-muted">Paket Dasar untuk memulai perjalanan Anda bersama kami</p>
                                <p class="text-muted">Benar-benar gratis</p>
                                <p class="text-muted">Menyingkat Tautan 100/bln, bisa Kustomisasi nama tautan dan
                                    Mengubah nama tautan kustomisasi 5/bln</p>

                            </div>
                        </div>
                    </div>
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <img src="https://i.postimg.cc/Kc0cmKJQ/kucing2.png" alt="Kode QR" width="300"
                                height="150" style="margin-top: 10%;">
                            <div class="story_text">
                                <h2 class="mb-3 fs-17"><b>Rp. 100.000/bln</b></h2>
                                <h5 class="mb-3 fs-17"><b>Premium</b></h5>
                                <p class="text-muted">Paket Dasar untuk memulai perjalanan Anda bersama kami</p>
                                <p class="text-muted">Menyingkat Tautan tanpa batas, bisa Kustomisasi nama tautan,
                                    Mengubah nama tautan kustomisasi tanpa batas dan mengubah Tautan Asli tanpa batas
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
    </div>
    <!-- container end -->
    </section>
    <section class="row_am latest_story" id="blog">
        <div class="container">
            <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                <h2 style="color: #104898;">Fitur & Jenis berlangganan yang tersedia</h2>
            </div>
            <div class="row d-flex justify-content-md-center" style="margin-top: 2%;">
                <div class="col-12" style="margin-bottom: 2%;">
                    <div class="tabel_box" data-aos="fade-up" data-aos-duration="1500">
                        <div id="wrapper" class="table-responsive">
                            <table id="keywords" style="width: 80%">
                                <div class="row">
                                    {{-- <div class="col-lg-10 button_wrapper  d-flex justify-content-end" data-aos="fade-up" data-aos-duration="1500">
                            <a href="#" class="btn btn-white white-button">Gratis</a>
                          </div>
                          <div class="col-1 button_wrapper" data-aos="fade-up" data-aos-duration="1500">
                            <a href="#" class="btn btn-white white-button">Premium</a>
                          </div> --}}
                                </div>
                                <thead class="text-center">
                                    <tr style="font-size: 12px;">
                                        <th><span>Batasan Pengunjung Tautan MiLink</span></th>
                                        <th>Gratis</th>
                                        <th>Tingkatan Dasar</th>
                                        <th>Premium</th>
                                        <th>Premium</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px; background-color: white">
                                    <tr>
                                        <td class="lalign"><b>Menyingkat Tautan</b></td>
                                        <td>20/bln</td>
                                        <td>50/bln</td>
                                        <td>Tanpa batas</td>
                                    </tr>
                                    <tr>
                                        <td class="lalign">— Ubah Tautan Asli</td>
                                        <td><i class="fas fa-times"></i></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="lalign"><b>Membuat Microsite</b></td>
                                        <td>5/bln</td>
                                        <td>10/bln</td>
                                    </tr>
                                    <tr>
                                        <td class="lalign">— Komponen Microsite</td>
                                        <td>5/bln</td>
                                        <td>10/bln</td>
                                    </tr>
                                    <tr>
                                        <td class="lalign">— Mengubah nama tautan microsite</td>
                                        <td><i class="fas fa-times"></i></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="lalign">— Komponen terkunci</td>
                                        <td><i class="fas fa-times"></i></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="lalign">Kode QR</td>
                                        <td><i class="fas fa-check"></i></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="lalign"><b>Analitik</b></td>
                                        <td><i class="fas fa-check"></i></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="lalign">— Pengunjung Keseluruhan</td>
                                        <td><i class="fas fa-check"></i></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    @include('layout.landingPage.footer')

    <!-- Footer-Section end -->

    <!-- VIDEO MODAL -->
    <div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button id="close-video" type="button" class="button btn btn-default text-right"
                    data-dismiss="modal">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

    <script>
        // $(document).ready(function() {
        //     $('#commentForm').submit(function(event) {
        //         event.preventDefault();
        //         @if (auth()->check())
        //             this.action = '/create';
        //             this.submit();
        //         @else
        //         Swal.fire({
        //                 icon: 'error',
        //                 title: 'Maaf, Anda harus Login Terlebih dahulu',
        //                 confirmButtonText: '<a href="/login">Login disini</a>',
        //             });
        //         @endif
        //     });
        // });
    </script>
</body>


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:12:27 GMT -->

</html>
