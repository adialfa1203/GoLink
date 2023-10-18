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
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}"
        style="width: 200px; height: 200px;">
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
        .warna {
            color: #104898 !important;
        }
        .card {
        background: linear-gradient(0deg, #0E2954, #104898);
        color: #ffffff;
        padding: 20px;
        border-radius: 0 0 10px 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        }

    .card1 {
        background: linear-gradient(to bottom, #ffffff, #ffffff);
        font-weight: bold;
        color: #000; /* Mengatur warna teks menjadi hitam */
        padding: 10px;
        border-radius: 10px 10px 0 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .p1 {
    text-align: left;
    margin-top: 0;
    margin-bottom: 1rem;
}
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
                            <span style="color: white;">Selangkah lebih dekat menuju kemudahan dan kebebasan. Gabung
                                dengan kami sekarang dan nikmati keuntungannya</span>
                        </div>
                        <!-- app buttons -->

                        <!-- users -->
                    </div>
                    <!-- banner slides start -->
                    <div class="col-lg-6 col-md-12 aos-init aos-animate d-flex justify-content-start" data-aos="fade-in"
                        data-aos-duration="1500">
                        <div class="banner_image">
                            <img class="moving_animation" src="{{ asset('landing-page 3.png') }}" alt="image">
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
        {{-- <section class="row_am latest_story" id="blog">
            <!-- container start -->
            <div class="container">
                <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                    <h2 style="color: #104898;">Berlangganan Yang Tersedia</h2>
                </div>
                <!-- row start -->
                <div class="row d-flex justify-content-md-center" style="margin-top: 2%;">
                    <!-- story -->
                    <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <img src="https://i.postimg.cc/xj3JMTgb/kucing.png" alt="Kode QR" width="300"
                                height="150" style="margin-top: 10%;">
                            <div class="story_text">
                                <h2 class="mb-3 fs-17"><b>Rp 0</b></h2>
                                <h5 class="mb-3 fs-17"><b>Gratis</b></h5>
                                <p class="text-muted">Paket Gratis untuk memulai perjalanan Anda bersama kami.</p>
                                <p class="text-muted">Benar-benar gratis</p>
                                <p class="text-muted">Menyingkat Tautan 20/bln, bisa Kustomisasi nama tautan dan
                                    Mengubah nama tautan kustomisasi 5/bln</p>

                            </div>
                        </div>
                    </div>
                    <!-- story -->
                    <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <img src="https://i.postimg.cc/Kc0cmKJQ/kucing2.png" alt="Kode QR" width="300"
                                height="150" style="margin-top: 10%;">
                            <div class="story_text">
                                <h2 class="mb-3 fs-17"><b>Rp. 16.000/bln</b></h2>
                                <h5 class="mb-3 fs-17"><b>Tingkatan Dasar</b></h5>
                                <p class="text-muted">Paket Dasar untuk meningkatkan pengalaman pengguna. </p>
                                <p class="text-muted">Menyingkat tautan batas sebanyak 50 kali per bulan dan membuat microsite sebanyak 10 kali per bulan.

                                </p>

                            </div>
                        </div>
                    </div>
                     <!-- story -->
                     <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <img src="https://i.postimg.cc/Kc0cmKJQ/kucing2.png" alt="Kode QR" width="300"
                                height="150" style="margin-top: 10%;">
                            <div class="story_text">
                                <h2 class="mb-3 fs-17"><b>Rp. 29.000/bln</b></h2>
                                <h5 class="mb-3 fs-17"><b>Tingkatan Menengah</b></h5>
                                <p class="text-muted">Paket Menengah untuk menawarkan atau memberikan fitur-fitur yang lebih canggih.</p>
                                <p class="text-muted">Menyingkat Tautan batas sebanyak 100 kali per bulan dan membuat microsite sebanyak 20 kali per bulan.

                                </p>

                            </div>
                        </div>
                    </div>
                     <!-- story -->
                     <div class="col-md-3" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <img src="https://i.postimg.cc/Kc0cmKJQ/kucing2.png" alt="Kode QR" width="300"
                                height="150" style="margin-top: 10%;">
                            <div class="story_text">
                                <h2 class="mb-3 fs-17"><b>Rp. 75.000/bln</b></h2>
                                <h5 class="mb-3 fs-17"><b>Tingkatan Premium</b></h5>
                                <p class="text-muted">fitur premium yang menawarkan fitur-fitur eksklusif.</p>
                                <p class="text-muted">Menyingkat tautan tanpa batas, membuat microsite tanpa batas, menggunakan semua tema tanpa ada yang terkunci, memantau tautan dengan terperinci, dan memproteksi tautan dengan mengatur kata sandi. 
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
            
            </div>
        
        </section> --}}
    <section class="row_am latest_story" id="blog">
            <!-- container start -->
            <div class="container">
                <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                    <h2 style="color: #104898;">Layanan Gratis yang Anda Dapatkan</h2>
                    <h6 style="color: #104898;">Mulai perjalanan Anda bersama kami !</h6>
                </div>
                <br>
                <!-- row start -->
                <div class="row text-center">
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="rounded" data-aos="fade-up" data-aos-duration="1500" style="border-radius: 100%;">
                            <div class="text-center"
                                style="background-color: #D2E0FB;  border-radius: 100%; display: inline-block; padding: 8%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                    viewBox="0 0 640 512"
                                    style="margin-top: 10%;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path fill="#104898"
                                        d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                                </svg>
                            </div>
                        </div>
                        <div class="story_text text-center">
                            <br>
                            <p class="text-muted warna">Menyingkat</p>
                            <p class="text-muted warna">20 Tautan/Bulan</p>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="rounded" data-aos="fade-up" data-aos-duration="1500"
                            style="border-radius: 100%;">
                            <div class="text-center"
                                style="background-color: #D2E0FB;  border-radius: 100%; display: inline-block; padding: 8%;">
                                <svg width="89" height="89" viewBox="0 0 89 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M80.4695 49.5064L76.7612 53.2147L69.1591 45.6127L72.8674 41.9043C73.6462 41.1256 74.9441 41.1256 75.7229 41.9043L80.4695 46.651C81.2483 47.4297 81.2483 48.7277 80.4695 49.5064ZM44.4987 70.236L66.9712 47.7635L74.5733 55.3656L52.1379 77.8752H44.4987V70.236ZM44.4987 51.9168C28.1079 51.9168 14.832 58.5547 14.832 66.7502V74.1668H37.082V67.1581L51.9154 52.3247C49.4679 52.0281 46.9833 51.9168 44.4987 51.9168ZM44.4987 14.8335C40.5647 14.8335 36.7917 16.3963 34.0099 19.1781C31.2282 21.9599 29.6654 25.7328 29.6654 29.6668C29.6654 33.6009 31.2282 37.3738 34.0099 40.1556C36.7917 42.9374 40.5647 44.5002 44.4987 44.5002C48.4327 44.5002 52.2057 42.9374 54.9874 40.1556C57.7692 37.3738 59.332 33.6009 59.332 29.6668C59.332 25.7328 57.7692 21.9599 54.9874 19.1781C52.2057 16.3963 48.4327 14.8335 44.4987 14.8335Z" fill="#104898"/>
                                    </svg>
                                    
                            </div>
                        </div>
                        <div class="story_text text-center">
                            <br>
                            <p class="text-muted warna">Kustominasi</p>
                            <p class="text-muted warna">Nama Tautan</p>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="rounded" data-aos="fade-up" data-aos-duration="1500"
                            style="border-radius: 100%;">
                            <div class="text-center"
                                style="background-color: #D2E0FB;  border-radius: 100%; display: inline-block; padding: 8%;">
                               <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.4795 10.8123C43.8966 7.39524 49.4368 7.39524 52.8539 10.8123L59.1876 17.1461C62.6047 20.5632 62.6047 26.1034 59.1876 29.5204L28.3124 60.3957C27.7654 60.9426 27.0235 61.2499 26.25 61.2499H11.6667C10.0558 61.2499 8.75 59.9441 8.75 58.3333V43.7499C8.75 42.9764 9.05729 42.2345 9.60427 41.6875L40.4795 10.8123ZM48.7291 14.9371C47.59 13.7981 45.7433 13.7981 44.6043 14.9371L42.0415 17.4999L52.5 27.9585L55.0628 25.3957C56.2019 24.2566 56.2018 22.4099 55.0628 21.2709L48.7291 14.9371ZM25.0419 55.4166L15.5 53.5V44.5L25.0419 55.4166Z" fill="#104898"/>
                                </svg>

                            </div>
                        </div>
                        <div class="story_text text-center">
                            <br>
                            <p class="text-muted warna">Mengubah</p>
                            <p class="text-muted warna"> 5 Nama Tautan </p>
                            <p class="text-muted warna"> Kustomisasi / Bulan </p>
                        </div>
                    </div>

                </div>
            </div>

    </section>
    <section class="row_am latest_story" id="blog">
            <!-- container start -->
        <div class="container">
            <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                    <h2 style="color: #104898;">Berlangganan Yang Tersedia</h2>
                <br>
                <!-- row start -->
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="card1">
                            <h5 style="font-weight: bold;">Dasar</h5>
                        </div>
                        <div class="card mb-3" style="background-color: #104898">
                            <h5 style="color: #ffffff; font-weight: bold;">Rp.16.000/Bulan</h5>
                            <h6 style="color: #ffffff; font-size: 13px;">Paket dasar untuk meningkatkan pengalaman pengguna</h6>
                            <div class="container text-center">
                                <p class="p1"><i class="fa-solid fa-circle-check"></i> Menyingkat tautan batas sebanyak 50x/bulan</p>
                                <p class="p1"><i class="fa-solid fa-circle-check"></i> Membuat Microsite sebanyak 10x/bulan</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card1">
                            <h5 style="font-weight: bold;">Menengah</h5>
                        </div>
                        <div class="card mb-3" style="background-color: #104898">
                            <h5 style="color: #ffffff; font-weight:bold;">Rp.29.000/Bulan</h5>
                            <h6 style="color: #ffffff; font-size:13px;">Paket menengah untuk menawarkan atau memberikan fitur-fitur yang lebih canggih</h6>
                            <div class="container text-center">
                                <p class="p1" style="color: #ffffff"><i class="fa-solid fa-circle-check"></i> Menyingkat tautan batas sebanyak 100x/bulan</p>
                                <p class="p1" style="color: #ffffff"><i class="fa-solid fa-circle-check"></i> Membuat Microsite sebanyak 20x/bulan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card1">
                            <h5 style="font-weight: bold;">Premium</h5>
                        </div>
                        <div class="card" style="background-color: #104898">
                            <h5 style="color: #ffffff; font-weight:bold;">Rp 75.000/Bulan</h5>
                            <h6 style="color: #ffffff; font-size:13px;">Paket premium yang menawarkan fitur-fitur ekslusif</h6>
                            <div class="container text-center">
                                <p class="p1" style="color: #ffffff"><i class="fa-solid fa-circle-check"></i> Membuat Microsite tanpa batas</p>
                                <p class="p1" style="color: #ffffff"><i class="fa-solid fa-circle-check"></i> Menggunakan semua tema tanpa terkunci</p>
                                <p class="p1" style="color: #ffffff"><i class="fa-solid fa-circle-check"></i> Memantau tautan dengan terperinci</p>
                                <p class="p1" style="color: #ffffff"><i class="fa-solid fa-circle-check"></i> Memproteksi tautan dengan kata sandi</p>
                            </div>
                        </div>
                    </div>

                </div>
                 </div>
        </div>

    </section>

        {{-- <section class="row_am latest_story" id="blog">
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
                                    </div>
                                    <thead class="text-center">
                                        <tr style="font-size: 12px;">
                                            <th><span>Batasan Pengunjung Tautan MiLink</span></th>
                                            <th>Gratis</th>
                                            <th>Tingkatan Dasar</th>
                                            <th>Tingkatan Menengah</th>
                                            <th>Tingkatan Premium</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px; background-color: white">
                                        <tr>
                                            <td class="lalign"><b>Menyingkat Tautan</b></td>
                                            <td>20/bln</td>
                                            <td>50/bln</td>
                                            <td>100/bln</td>
                                            <td>Tanpa batas</td>
                                        </tr>
                                        <tr>
                                            <td class="lalign">— Ubah Tautan Asli</td>
                                            <td><i class="fas fa-times"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lalign"><b>Membuat Microsite</b></td>
                                            <td>5/bln</td>
                                            <td>10/bln</td>
                                            <td>20/bln</td>
                                            <td>Tanpa Batas</td>
                                        </tr>
                                        <tr>
                                            <td class="lalign">— Komponen Microsite</td>
                                            <td>5/bln</td>
                                            <td>10/bln</td>
                                            <td><i class="fas fa-times"></i></td>
                                            <td>Tanpa Batas</td>
                                        </tr>
                                        <tr>
                                            <td class="lalign">— Mengubah nama tautan microsite</td>
                                            <td><i class="fas fa-times"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>

                                        </tr>
                                        <tr>
                                            <td class="lalign">— Komponen terkunci</td>
                                            <td><i class="fas fa-times"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>

                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lalign">Kode QR</td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lalign"><b>Analitik</b></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>

                                        </tr>
                                        <tr>
                                            <td class="lalign">— Pengunjung Keseluruhan</td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>
                                            <td><i class="fas fa-check"></i></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section> --}}

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
