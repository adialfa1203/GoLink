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
    <link rel="shortcut icon" href="{{ asset('template/themesbrand.com/steex/layouts/assets/images/Logo.png') }}" style="width: 200px; height: 200px;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    <style>
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
                            <h2 style="color: white;">Situs Mikro yang Dibuat Sesuai dengan kebutuhan Anda</h2>
                            <!-- p -->
                            <p style="color: white;">Tampilkan Identitas Anda dengan Lebih Personal</p>
                            <p>Dengan Go Link Microsite, Anda dapat dengan mudah membuat dan mengkustomisasi situs web mikro sesuai keinginan Anda.</p>
                        </div>
                        <!-- app buttons -->

                        <!-- users -->
                    </div>
                    <!-- banner slides start -->
                    <div class="col-lg-6 col-md-12 aos-init aos-animate d-flex justify-content-start" data-aos="fade-in"
                        data-aos-duration="1500">
                        <div class="banner_image m-0">
                            <img class="moving_animation" src="{{ asset('situs mikro.png') }}"
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
        <section class="bg-white overflow-hidden" id="home">
            <div class="container" data-aos="fade-in" data-aos-duration="1500">
                <div class="position-relative" style="z-index: 1;">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-6">
                            <div class="" >
                                <div>
                                    <h1 style="color: #1B5A6F; font-size:25px;">Jelajahi dengan Microsite</h1>
                                    <h6 class="" style="color: #1B5A6F;">Microsite adalah kanvas kreatif Anda,
                                        bukan hanya untuk menggabungkan banyak tautan menjadi satu URL. Di sini,
                                        Anda dapat menuangkan ide dan konten lebih bebas.</h6>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-1 offset-xl-1">
                            <div class="mt-lg-0 mt-5 d-flex justify-content-center">
                                <img src="{{ asset('landing-page 2.png') }}" alt="home04" class="home-img" width="300" height="200">
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end container-->
        </section>

        <section class="bg-white overflow-hidden mb-4" id="home" >
            <div class="container" data-aos="fade-in" data-aos-duration="1500">
                <div class="position-relative" style="z-index: 1;">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="mt-lg-0 mt-5 d-flex justify-content-center">
                                <img src="{{ asset('situs mikro.png') }}" alt="home04" class="home-img d-flex justify-content-start" width="350" height="200">
                            </div>
                        </div>
                        <div class="col-lg-6 offset-xl-1">
                            <div class="" >
                                <h1 style="color: #1B5A6F; font-size:25px;">Buat Acaramu Lebih Menarik!</h1>
                                <h6 style="color: #1B5A6F;">Kami hadir sebagai solusi untuk acaramu. Manfaatkan berbagai komponen yang telah kami sediakan, seperti hitungan mundur, peta, dan masih banyak lagi untuk membuat halaman acaramu menjadi lebih menarik, informatif, dan meyakinkan.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Trusted Section start -->

        <!-- Trusted Section ends -->


        <!-- Footer-Section start -->
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
        //             Swal.fire({
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
