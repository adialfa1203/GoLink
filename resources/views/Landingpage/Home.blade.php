<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:10:18 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Link</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Css -->
    <style>
        .swal-confirm-button {
            color: white !important;
        }
    </style>

</head>

<body>
    <style>
        body {
            margin: 0;
            /* Reset margin body */
        }

        .link-form {
            width: 100%;
            margin: 20px;
            /* Ubah margin dari auto ke nilai tetap */
            padding: 20px;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .swal-footer a {
            text-decoration: underline;
        }

        .input-icon {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon i {
            position: absolute;
            right: 10px;
            color: #00;
            margin-right: 17%;
            /* Margin kanan untuk jarak antara ikon dan input */
            margin-top: 1%;
            /* Margin bawah untuk jarak antara ikon dan teks */
        }

        input[type="text"] {
            width: 400px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 10px 0 0 10px;
        }

        button {
            background-color: #D9D9D9;
            color: #000;
            border: none;
            padding: 10px 15px;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
        }

        button:hover {
            background-color: #D9D9D9;
        }

        header {
            height: 100px;
            /* Ganti dengan tinggi yang Anda inginkan */
        }

        header {
            padding: 20px 0;
            /* Atur padding sesuai kebutuhan Anda */
        }

        .banner_image img {
            max-width: 100%;
            /* Maksimum lebar gambar adalah lebar kontainer */
            max-height: 100%;
            /* Maksimum tinggi gambar adalah tinggi kontainer */
            width: auto;
            /* Menjaga aspek rasio gambar */
            height: auto;
            /* Menjaga aspek rasio gambar */
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
                    <span class="banner_shape1"> <img src="{{ asset('banner-shape1.png') }}"
                            alt="image"> </span>
                    <span class="banner_shape2"> <img src="{{ asset('banner-shape2.png') }}"
                            alt="image"> </span>
                    <span class="banner_shape3"> <img src="{{ asset('banner-shape3.png') }}"
                            alt="image"> </span>
                    <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1500">
                        <!-- banner text -->
                        <div class="banner_text">
                            <!-- h1 -->
                            <h2 style="color: #ffffff;">Selamat datang di Go Link!</h2>
                            <!-- p -->
                            <p>Ingin membuat tautan lebih singkat dan lebih mudah diingat?</p>
                            <p>Go Link adalah solusi terbaik untuk Anda!</p>
                            <span style="color: #ffffff;">Sekarang, Anda dapat dengan mudah mengubah tautan panjang menjadi tautan yang simpel dan mudah diingat. Dengan Go Link, mempersingkat URL sesuai dengan keinginan Anda lebih cepat dan lebih sederhana dari sebelumnya.</span>
                        </div>
                    </div>
                    <!-- banner slides start -->
                    <div class="col-lg-6 col-md-12 aos-init aos-animate d-flex justify-content-start" data-aos="fade-in"
                        data-aos-duration="1500">
                        <div class="banner_image">
                            <img class="moving_animation" src="{{ asset('landingpage.png') }}"
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
                    <h2>Fitur Fitur <span>Go Link</span> Yang Dapat <br> Membantu Anda</h2>
                </div>
                <!-- row start -->
                <div class="row d-flex justify-content-md-center" style="margin-top: 2%;">
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                viewBox="0 0 640 512"
                                style="margin-top: 10%;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path fill="#104898"
                                    d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                            </svg>
                            <div class="story_text">
                                <h3>Pemotongan URL</h3>
                                <p>Dengan Go Link, Anda dapat dengan mudah memotong URL yang panjang
                                menjadi tautan yang singkat dan mudah diingat sesuai dengan keinginan
                                Anda. Tidak perlu lagi repot dengan tautan yang terlalu panjang.</p>
                            </div>
                        </div>
                    </div>
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg"width="80" height="80"
                                viewBox="0 0 576 512"
                                style="margin-top: 10%;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path fill="#104898"
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                            <div class="story_text">
                                <h3>Pembuatan Microsite</h3>
                                <p>Buat tautan Bio Anda sendiri dengan Go Link. Seringkali digunakan
                                di profil media sosial, resume online, CV, dan situs web jejaring
                                profesional. Tautan Bio Anda sekarang dapat terlihat lebih menarik
                                dan informatif.</p>
                            </div>
                        </div>
                    </div>

                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                viewBox="0 0 512 512"
                                style="margin-top: 10%;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path fill="#104898"
                                    d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z" />
                            </svg>
                            <div class="story_text">
                                <h3>Analitik</h3>
                                <p>Lacak kinerja tautan Go Link Anda dengan mudah. Identifikasi tren dan pola dalam penggunaan
                                tautan Anda, dan buat keputusan yang tepat untuk mengoptimalkan kinerja tautan Anda. Dengan
                                analitik Go Link, Anda dapat mengukur dampak kampanye Anda dengan lebih baik.</p>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- container end -->
        </section>
        <!-- Banner-Section-end -->
        <section class="row_am latest_story" id="blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <h3>Statistik Go Link</h3>
                        </div>
                    </div>
                </div>
                <!--end row-->

                <div class="row justify-content-center mt-5">
                    <!--end col-->
                    <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500" >
                            <div class="story_text">
                                <h4>
                                    <span class="counter_value" data-target="{{($url)}}">{{($url)}}</span><span>+</span>
                                </h4>
                                <p class="text-muted">
                                    {{($url)}} tautan panjang telah berhasil dipersingkat dengan Go Link.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500">
                            <div class="story_text">
                                <h4>
                                    <span class="counter_value" data-target="{{( $micrositeuuid )}}">{{( $micrositeuuid )}}</span><span>+</span>
                                </h4>
                                <p class="text-muted"> Sudah lebih dari {{ $micrositeuuid }} microsite yang berhasil dibuat dengan Go Link.</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500">
                            <div class="story_text">
                                <h4>
                                    <h3 class="counter_value" data-target="{{ $totalVisits }}">{{ $totalVisits }}</h3>
                                </h4>
                                <p class="text-muted">Ratusan tautan dan pengunjung mengakses situs mikro dengan Go Link</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <div class="story_text">
                                <h4>
                                    <h3 class="counter_value" data-target="{{ $totalVisits }}">{{ $totalVisits }}</h3>
                                </h4>
                                <p class="text-muted">Tautan dipantau untuk
                                    membuat aman & terjamin</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>


        <!-- Trusted Section start -->
        <section class="row_am trusted_section">
            <!-- container start -->
            <div class="container">
                <div class="section_title" data-aos="" data-aos-duration="1500" data-aos-delay="100">
                    <h2 style="color: #104898;">Dukungan Pembayaran</h2>
                </div>
                <!-- logos slider start -->
                <div class="company_logos">
                    <div id="company_slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('bri.png') }}" alt="image"
                                    style="object-fit: cover; width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="https://i.postimg.cc/65yPSYsF/Logo-Bank-BCA-1.png" alt="image"
                                    style="object-fit: cover;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="https://i.postimg.cc/3wFJ0YXV/bank-tabungan-negara-btn-removebg-preview.png"
                                    alt="image" style="object-fit: cover;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="https://i.postimg.cc/sxG0NPJW/Cube-Logo-Bank-Mega-removebg-preview.png"
                                    alt="image" style="object-fit: cover;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="https://i.postimg.cc/ht3rmQnQ/kisspng-logo-bank-bjb-syariah-portable-network-graphics-de-5c650ba45fb0d6-262763741550125988392-remo.png"
                                    alt="image" style="object-fit: cover;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="https://i.postimg.cc/g2xQXWhs/Cube-Logo-Bank-Danamon.png" alt="image"
                                    style="object-fit: cover;width: 160px; height: 80px;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- logos slider end -->
            </div>
            <!-- container end -->
        </section>
        <!-- Trusted Section ends -->
        <!-- Footer-Section start -->
        @include('layout.landingPage.footer')

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

</body>


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/03-app-landing-page-wave-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 May 2023 08:12:27 GMT -->

</html>
