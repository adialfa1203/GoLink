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
            background-color: #0E2954;
            color: #000;
            border: none;
            padding: 10px 15px;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
        }

        button:hover {
            background-color: #0E2954;
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
        //active

    </style>
<style>
    .navbar-nav a.nav-link.active {
        background-color: #ffffff;
        color: #0E2954;
        border-radius: 10px;
        }
        .section_title h2 {
    margin-top: -20px; /* Sesuaikan dengan jumlah margin yang Anda butuhkan */
  }

</style>
<style>
    .story_box {
        border-radius: 20px; /* You can adjust the value as per your preference */
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); /* Adjust the values for your desired shadow */
    }
</style>
<style>
    .custom-title h2 {
        font-size: 20px; /* Ganti 24px dengan ukuran font yang Anda inginkan */
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
                            <h2 style="color: #ffffff;">Selamat datang di MiLink.id</h2>
                            <!-- p -->
                            <p>Ingin membuat tautan lebih singkat dan lebih mudah diingat?</p>
                            <p>MiLink.id adalah solusi terbaik untuk Anda !</p>
                        </div>
                    </div>
                    <!-- banner slides start -->
                    <div class="col-lg-6 col-md-12 aos-init aos-animate d-flex justify-content-start" data-aos="fade-in"
                        data-aos-duration="1500">
                        <div class="banner_image">
                            <img class="moving_animation" src="{{ asset('landing-page.png') }}"
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
                <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100" style="margin-top: 5%;">
                    <h2 class="custom-title"><span>Fitur fitur</span> <span>Mi</span>Link.id <span><br>Yang Dapat Membantu Anda</span></h2>
                </div>
                
                <!-- row start -->
                <div class="row d-flex justify-content-md-center" style="margin-top: 7%;">
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" style="margin-top: 10%;">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9"/>
                                <path d="M51.3023 38.6976C56.3724 43.773 56.3028 51.9101 51.3328 56.9077C51.3235 56.9178 51.3124 56.9289 51.3023 56.9391L45.5997 62.6416C40.57 67.6713 32.3871 67.6706 27.3582 62.6416C22.3285 57.6128 22.3285 49.429 27.3582 44.4002L30.507 41.2514C31.342 40.4164 32.78 40.9713 32.8232 42.1514C32.8781 43.6553 33.1478 45.1662 33.6454 46.6253C33.814 47.1193 33.6936 47.6658 33.3244 48.035L32.2139 49.1455C29.8356 51.5238 29.761 55.3963 32.1158 57.7978C34.494 60.223 38.4028 60.2375 40.7991 57.8411L46.5017 52.1394C48.894 49.7471 48.884 45.8804 46.5017 43.4981C46.1877 43.1847 45.8713 42.9411 45.6242 42.771C45.4494 42.6509 45.305 42.4917 45.2027 42.3059C45.1003 42.1202 45.0428 41.9131 45.0347 41.7012C45.0011 40.8045 45.3188 39.8805 46.0274 39.1719L47.814 37.3852C48.2825 36.9167 49.0175 36.8591 49.5608 37.2383C50.1829 37.6727 50.7657 38.161 51.3023 38.6976ZM63.262 26.7373C58.2331 21.7083 50.0501 21.7077 45.0205 26.7373L39.3179 32.4399C39.3077 32.4501 39.2967 32.4611 39.2874 32.4713C34.3175 37.4688 34.2478 45.606 39.3179 50.6813C39.8545 51.2179 40.4372 51.7062 41.0593 52.1406C41.6026 52.5197 42.3377 52.4621 42.8061 51.9937L44.5927 50.207C45.3013 49.4984 45.619 48.5744 45.5854 47.6776C45.5773 47.4657 45.5198 47.2586 45.4174 47.0729C45.315 46.8872 45.1707 46.7279 44.9959 46.6079C44.7488 46.4377 44.4324 46.1942 44.1184 45.8807C41.7361 43.4985 41.7261 39.6317 44.1184 37.2395L49.8209 31.5377C52.2173 29.1414 56.126 29.1558 58.5042 31.581C60.8591 33.9825 60.7846 37.855 58.4062 40.2333L57.2957 41.3439C56.9265 41.713 56.8061 42.2595 56.9746 42.7536C57.4722 44.2126 57.7419 45.7236 57.7969 47.2275C57.8401 48.4075 59.2781 48.9625 60.1131 48.1275L63.2619 44.9787C68.2916 39.95 68.2916 31.7661 63.262 26.7373Z" fill="#104898"/>
                              </svg>
                           
                            <div class="story_text">
                                <h3 style="color: #104898;">Pemotongan URL</h3>
                                <p>Dengan MiLink.id, Anda dapat dengan mudah memotong URL yang panjang menjadi tautan yang singkat dan mudah diingat sesuai dengan keinginan Anda. </p>
                            </div>
                        </div>
                    </div>
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" style="margin-top: 10%;">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9"/>
                                <rect x="21" y="31" width="47.6981" height="32" rx="5" fill="#104898"/>
                                <circle cx="34.2816" cy="43.0756" r="5.43396" fill="white"/>
                                <path d="M28.8508 55.151C28.8508 54.4374 28.9914 53.7308 29.2645 53.0715C29.5375 52.4122 29.9378 51.8132 30.4424 51.3086C30.947 50.804 31.546 50.4038 32.2053 50.1307C32.8646 49.8576 33.5712 49.717 34.2848 49.717C34.9984 49.717 35.705 49.8576 36.3643 50.1307C37.0236 50.4038 37.6226 50.804 38.1272 51.3086C38.6318 51.8132 39.032 52.4122 39.3051 53.0715C39.5782 53.7308 39.7188 54.4374 39.7187 55.151L34.2848 55.151H28.8508Z" fill="white"/>
                                <path d="M46.3594 39.7549H60.2462" stroke="white" stroke-width="3" stroke-linecap="round"/>
                                <path d="M46.3594 46.6982H60.2462" stroke="white" stroke-width="3" stroke-linecap="round"/>
                                <path d="M46.3594 53.9434H60.2462" stroke="white" stroke-width="3" stroke-linecap="round"/>
                              </svg>
                            <div class="story_text">
                                <h3 style="color: #104898;">Pembuatan Microsite</h3>
                                <p>Buat tautan Bio Anda sendiri dengan MiLink.id. Tautan Bio Anda sekarang dapat terlihat lebih menarik dan informatif.</p>
                            </div>
                        </div>
                    </div>

                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                              <svg width="90" height="90" viewBox="0 0 90 90"  style="margin-top: 10%;" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9"/>
                                <path d="M63.75 55.1667H30V32.2083C30 31.5407 29.4406 31 28.75 31H26.25C25.5594 31 25 31.5407 25 32.2083V57.5833C25 58.9178 26.1195 60 27.5 60H63.75C64.4406 60 65 59.4593 65 58.7917V56.375C65 55.7074 64.4406 55.1667 63.75 55.1667ZM61.25 33.4167H52.0266C50.3563 33.4167 49.5195 35.3689 50.7008 36.5108L53.232 38.9576L47.5 44.4994L41.768 38.9584C40.7914 38.0144 39.2086 38.0144 38.2328 38.9584L32.8664 44.1459C32.3781 44.6179 32.3781 45.3829 32.8664 45.855L34.6336 47.5632C35.1219 48.0352 35.9133 48.0352 36.4016 47.5632L40 44.084L45.732 49.6249C46.7086 50.569 48.2914 50.569 49.2672 49.6249L56.7672 42.3749L59.2984 44.8218C60.4797 45.9637 62.4992 45.1549 62.4992 43.5402V34.625C62.5 33.9574 61.9406 33.4167 61.25 33.4167Z" fill="#104898"/>
                                </svg>
                                
                            <div class="story_text">
                                <h3 style="color: #104898;">Analitik</h3>
                                <p>Lacak kinerja tautan MiLink.id Anda dengan mudah. Identifikasi tren dan pola dalam penggunaan tautan Anda. Dengan analitik Anda dapat mengukur dampak kampanye Anda dengan lebih baik.</p>
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
                            <div class="section_title" data-aos="" data-aos-duration="1500" data-aos-delay="100" >
                            <h2 style="color: #104898;">Statistik MiLink.id</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->

                <div class="row justify-content-center mt-5">
                    <!--end col-->
                    <div class="col-md-3" style="margin-bottom: 2%; margin-top: 2%;">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500" >
                            <div class="story_text">
                                <h4 style="color: #104898;">
                                    <span class="counter_value"  data-target="{{($url)}}"></span>{{($url)}}</span><span>+</span>
                                </h4>
                                <p class="text-muted">
                                    {{($url)}} tautan panjang telah berhasil dipersingkat dengan MiLink.id
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin-bottom: 2%; margin-top: 2%;"">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500">
                            <div class="story_text">
                                <h4 style="color: #104898;">
                                    <span class="counter_value" data-target="{{( $micrositeuuid )}}">{{( $micrositeuuid )}}</span><span>+</span>
                                </h4>
                                <p class="text-muted"> Sudah lebih dari {{ $micrositeuuid }} microsite yang berhasil dibuat dengan MiLink.id</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-3" style="margin-bottom: 2%; margin-top: 2%;"">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500">
                            <div class="story_text">
                                <h4 style="color: #104898;">
                                    <h3 style="color: #104898;" class="counter_value" data-target="{{ $totalVisits }}">{{ $totalVisits }}</h3>
                                </h4>
                                <p class="text-muted">Ratusan tautan dan pengunjung mengakses situs mikro dengan MiLink.id</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-3" style="margin-bottom: 2%; margin-top: 2%;"">
                        <div class="story_box" style="min-height:220px" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <div class="story_text">
                                <h4 style="color: #104898;">
                                    <h3 style="color: #104898;" class="counter_value" data-target="{{ $totalVisits }}">{{ $totalVisits }}</h3>
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
        <section class="row_am trusted_section" >
            <!-- container start -->
            <div class="container">
                <div class="section_title" data-aos="" data-aos-duration="1500" data-aos-delay="100">
                    <h2 style="color: #104898;" >Dukungan Pembayaran</h2>
                </div>
                <!-- logos slider start -->
                <div class="company_logos" style="margin-top: 5%;">
                    <div id="company_slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('bri.png') }}" alt="image"
                                    style="object-fit: contain; width: auto; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('logo-bank-btn.png') }}"
                                    alt="image" style="object-fit: contain;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('bank-mega.png') }}"
                                    alt="image" style="object-fit: contain;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('Logo BCA_Biru.png') }}"
                                    alt="image" style="object-fit: contain;width: 160px; height: 80px;">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('bni.png') }}" alt="image"
                                    style="object-fit: contain;width: auto; height: 50px;margin-top:10px;">
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
