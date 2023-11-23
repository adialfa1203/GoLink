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
    <link rel="shortcut icon" href="{{ asset('template/image/M-gelap.png') }}" style="width: 200px; height: 200px;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <style>
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

        @media only screen and (max-width: 600px) {
            .jud {
                font-size: 22px;
                text-align: initial;
            }

            .isi {
                font-size: 13px;
                text-align: initial;
            }

            .isi1 {
                font-size: 13px;
                text-align: initial;
                margin-top: -14px;
            }
        }

        @media (min-width: 601px) and (max-width: 1024px) {

            /* Atur gaya CSS khusus untuk perangkat tablet di sini */
            .jud {
                font-size: 22px;
                text-align: initial;
            }

            .isi {
                font-size: 13px;
                text-align: initial;
            }

            .isi1 {
                font-size: 13px;
                text-align: initial;
                margin-top: -14px;
            }
        }
    </style>
    <style>
        .navbar-nav a.nav-link.active {
            background-color: #ffffff;
            color: #104898;
            border-radius: 10px;

        }
    </style>
    <style>
        .story_box {
            border-radius: 20px;
            /* You can adjust the value as per your preference */
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            /* Adjust the values for your desired shadow */
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
                    <span class="banner_shape1"> <img src="https://i.postimg.cc/3RVg0kJv/banner-shape1.png" alt="image"> </span>
                    <span class="banner_shape2"> <img src="https://i.postimg.cc/rp6XjJnn/banner-shape2.png" alt="image"> </span>
                    <span class="banner_shape3"> <img src="https://i.postimg.cc/wxrWDBbF/banner-shape3.png" alt="image"> </span>
                    <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1500">
                        <!-- banner text -->
                        <div class="banner_text" style="margin-top: -8px;">
                            <!-- h1 -->
                            <h2 class="jud" style="color: white;">Buat dan kreasikan tautan Anda</h2>
                            <!-- p -->
                            <p class="isi" style="color: white;">Penyingkat tautan terbaik dan Terpendek
                                untuk kamu gunakan.</p>
                            <p class="isi1">Sesuaikan Penyingkat URL Anda dengan fitur yang memberi Anda pemendekan tautan berkualitas lebih baik.
                            </p>
                            <div class="col-12 mt-3" style="margin-right: 100%;">
                            </div>
                        </div>
                        <!-- app buttons -->

                        <!-- users -->
                    </div>
                    <!-- banner slides start -->
                    <div class="col-lg-6 col-md-12 aos-init aos-animate d-flex justify-content-start" data-aos="fade-in" data-aos-duration="1500">
                        <div class="banner_image">
                            <img class="moving_animation" src="{{ asset('landing-page 2.png') }}" alt="image">
                        </div>
                    </div>
                    <!-- banner slides end -->


                    <!-- row end -->
                </div>
            </div>

            <!-- container end -->

            <!-- wave animation start -->
            <div>
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
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
                <div class="row d-flex justify-content-md-center" style="margin-top: 7%;">
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <div class="rounded"  style="border-radius: 100%;">
                                <div class="text-center" style="background-color: #D9D9D9; margin-top:10%;  border-radius: 100%; display: inline-block; padding: 3%;">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M40.4795 10.8123C43.8966 7.39524 49.4368 7.39524 52.8539 10.8123L59.1876 17.1461C62.6047 20.5632 62.6047 26.1034 59.1876 29.5204L28.3124 60.3957C27.7654 60.9426 27.0235 61.2499 26.25 61.2499H11.6667C10.0558 61.2499 8.75 59.9441 8.75 58.3333V43.7499C8.75 42.9764 9.05729 42.2345 9.60427 41.6875L40.4795 10.8123ZM48.7291 14.9371C47.59 13.7981 45.7433 13.7981 44.6043 14.9371L42.0415 17.4999L52.5 27.9585L55.0628 25.3957C56.2019 24.2566 56.2018 22.4099 55.0628 21.2709L48.7291 14.9371ZM25.0419 55.4166L15.5 53.5V44.5L25.0419 55.4166Z" fill="#104898" />
                                    </svg>
    
                                </div>
                            </div>
                            <div class="story_text">
                                <h6 style="color: #104898;" class="mb-3 fs-17">Kustom Tautan</h6>
                                <p class="text-muted">Anda dapat dengan mudah mengganti atau mengkustom tautan yang sudah di perpendek sesuka hati</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" style="margin-top: 10%;">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9" />
                                <path d="M45.3101 22.9653C33.3092 22.9653 23.5859 32.6886 23.5859 44.6895C23.5859 56.6903 33.3092 66.4136 45.3101 66.4136C57.3109 66.4136 67.0342 56.6903 67.0342 44.6895C67.0342 32.6886 57.3109 22.9653 45.3101 22.9653ZM50.3119 53.6332L42.5858 48.0182C42.3142 47.8167 42.1566 47.5013 42.1566 47.1685V32.4258C42.1566 31.8477 42.6296 31.3747 43.2077 31.3747H47.4124C47.9906 31.3747 48.4636 31.8477 48.4636 32.4258V44.488L54.026 48.535C54.499 48.8766 54.5954 49.5336 54.2538 50.0066L51.7835 53.4054C51.4419 53.8697 50.7849 53.9748 50.3119 53.6332Z" fill="#104898" />
                            </svg>
                            <div class="story_text">
                                <h6 style="color: #104898;" class="mb-3 fs-17">Tautan Kadaluarsa</h6>
                                <p class="text-muted">Anda dapat membatasi akses ke tautan ini hanya untuk beberapa waktu.
                                    Memberikan keamanan dengan tautan yang hanya aktif untuk jangka waktu tertentu.</p>
                            </div>
                        </div>
                    </div>
                    <!-- story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" style="margin-top: 10%;">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9" />
                                <path d="M23.5859 41.586H42.2066V22.9653H23.5859V41.586ZM29.7928 29.1722H35.9997V35.3791H29.7928V29.1722ZM48.4135 22.9653V41.586H67.0342V22.9653H48.4135ZM60.8273 35.3791H54.6204V29.1722H60.8273V35.3791ZM23.5859 66.4136H42.2066V47.7929H23.5859V66.4136ZM29.7928 53.9998H35.9997V60.2067H29.7928V53.9998ZM63.9308 47.7929H67.0342V60.2067H57.7239V57.1033H54.6204V66.4136H48.4135V47.7929H57.7239V50.8964H63.9308V47.7929ZM63.9308 63.3102H67.0342V66.4136H63.9308V63.3102ZM57.7239 63.3102H60.8273V66.4136H57.7239V63.3102Z" fill="#104898" />
                            </svg>
                            <div class="story_text">
                                <h6 style="color: #104898;" class="mb-3 fs-17">Kode QR yang dapat disesuaikan</h6>
                                <p class="text-muted">Buat Kode QR yang sesuai dengan keinginan Anda dengan mudah.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" style="margin-top: 10%;">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9" />
                                <path d="M51.3023 38.6976C56.3724 43.773 56.3028 51.9101 51.3328 56.9077C51.3235 56.9178 51.3124 56.9289 51.3023 56.9391L45.5997 62.6416C40.57 67.6713 32.3871 67.6706 27.3582 62.6416C22.3285 57.6128 22.3285 49.429 27.3582 44.4002L30.507 41.2514C31.342 40.4164 32.78 40.9713 32.8232 42.1514C32.8781 43.6553 33.1478 45.1662 33.6454 46.6253C33.814 47.1193 33.6936 47.6658 33.3244 48.035L32.2139 49.1455C29.8356 51.5238 29.761 55.3963 32.1158 57.7978C34.494 60.223 38.4028 60.2375 40.7991 57.8411L46.5017 52.1394C48.894 49.7471 48.884 45.8804 46.5017 43.4981C46.1877 43.1847 45.8713 42.9411 45.6242 42.771C45.4494 42.6509 45.305 42.4917 45.2027 42.3059C45.1003 42.1202 45.0428 41.9131 45.0347 41.7012C45.0011 40.8045 45.3188 39.8805 46.0274 39.1719L47.814 37.3852C48.2825 36.9167 49.0175 36.8591 49.5608 37.2383C50.1829 37.6727 50.7657 38.161 51.3023 38.6976ZM63.262 26.7373C58.2331 21.7083 50.0501 21.7077 45.0205 26.7373L39.3179 32.4399C39.3077 32.4501 39.2967 32.4611 39.2874 32.4713C34.3175 37.4688 34.2478 45.606 39.3179 50.6813C39.8545 51.2179 40.4372 51.7062 41.0593 52.1406C41.6026 52.5197 42.3377 52.4621 42.8061 51.9937L44.5927 50.207C45.3013 49.4984 45.619 48.5744 45.5854 47.6776C45.5773 47.4657 45.5198 47.2586 45.4174 47.0729C45.315 46.8872 45.1707 46.7279 44.9959 46.6079C44.7488 46.4377 44.4324 46.1942 44.1184 45.8807C41.7361 43.4985 41.7261 39.6317 44.1184 37.2395L49.8209 31.5377C52.2173 29.1414 56.126 29.1558 58.5042 31.581C60.8591 33.9825 60.7846 37.855 58.4062 40.2333L57.2957 41.3439C56.9265 41.713 56.8061 42.2595 56.9746 42.7536C57.4722 44.2126 57.7419 45.7236 57.7969 47.2275C57.8401 48.4075 59.2781 48.9625 60.1131 48.1275L63.2619 44.9787C68.2916 39.95 68.2916 31.7661 63.262 26.7373Z" fill="#104898" />
                            </svg>
                            <div class="story_text">
                                <h6 style="color: #104898;" class="mb-3 fs-17">Pemotong URL dengan lebih mudah</h6>
                                <p class="text-muted">Pemotongan URL yang cepat dan sesuai dengan keinginan Anda menggunakan MiLink.id
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Story -->
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500" style="height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" style="margin-top: 10%;">
                                <circle cx="45" cy="45" r="45" fill="#D9D9D9" />
                                <path d="M43.4507 22.9656C31.4525 22.9656 21.7266 32.6915 21.7266 44.6897C21.7266 56.6879 31.4525 66.4139 43.4507 66.4139C55.4489 66.4139 65.1748 56.6879 65.1748 44.6897C65.1748 32.6915 55.4489 22.9656 43.4507 22.9656ZM50.6591 54.2904C50.3175 54.6303 49.9592 54.9868 49.6684 55.2785C49.4064 55.5413 49.2216 55.8654 49.1279 56.2166C48.9956 56.7124 48.8887 57.2135 48.71 57.6944L47.1867 61.7984C45.9814 62.0611 44.734 62.2092 43.4507 62.2092V59.8108C43.5987 58.7053 42.7815 56.6345 41.4684 55.3214C40.9428 54.7958 40.6476 54.0828 40.6476 53.3391V50.5351C40.6476 49.5155 40.0984 48.5782 39.2057 48.085C37.947 47.3886 36.1565 46.4154 34.9301 45.7978C33.9245 45.2915 32.9942 44.6468 32.1577 43.8926L32.0876 43.8295C31.4893 43.2895 30.9582 42.6795 30.5056 42.0127C29.6839 40.8065 28.3454 38.8224 27.4756 37.533C29.2687 33.5473 32.5002 30.3465 36.5156 28.6077L38.6188 29.6598C39.5509 30.1258 40.6476 29.4487 40.6476 28.4062V27.4164C41.3475 27.3034 42.0597 27.2316 42.7841 27.2044L45.2631 29.6834C45.8106 30.2309 45.8106 31.1183 45.2631 31.6657L44.8523 32.0757L43.9465 32.9815C43.6732 33.2548 43.6732 33.6989 43.9465 33.9722L44.3573 34.383C44.6306 34.6563 44.6306 35.1004 44.3573 35.3737L43.6566 36.0745C43.525 36.2058 43.3467 36.2796 43.1608 36.2795H42.3733C42.1911 36.2795 42.0159 36.3504 41.8845 36.4783L41.0155 37.3237C40.909 37.4274 40.8382 37.5623 40.8133 37.7088C40.7884 37.8554 40.8108 38.0061 40.8771 38.1392L42.2427 40.8713C42.4757 41.3374 42.1367 41.8857 41.6164 41.8857H41.1224C40.9533 41.8857 40.7904 41.8244 40.6634 41.714L39.8505 41.008C39.6665 40.8484 39.4442 40.7395 39.2053 40.6918C38.9665 40.6442 38.7194 40.6596 38.4883 40.7364L35.7579 41.6466C35.5494 41.7161 35.3681 41.8494 35.2397 42.0277C35.1113 42.206 35.0422 42.4202 35.0422 42.6399C35.0422 43.0368 35.2665 43.3985 35.6213 43.5764L36.5918 44.0616C37.4161 44.4742 38.3254 44.6888 39.2469 44.6888C40.1684 44.6888 41.2257 47.0794 42.05 47.492H47.8971C48.6408 47.492 49.353 47.7872 49.8795 48.3127L51.0787 49.5119C51.5797 50.0131 51.861 50.6928 51.8609 51.4014C51.8607 51.9384 51.7545 52.47 51.5482 52.9658C51.342 53.4616 51.0398 53.9117 50.6591 54.2904ZM58.2547 46.2884C57.7475 46.1614 57.3051 45.8504 57.0151 45.415L55.4401 43.0525C55.2097 42.7074 55.0867 42.3016 55.0867 41.8866C55.0867 41.4716 55.2097 41.0658 55.4401 40.7207L57.1562 38.1471C57.3594 37.8431 57.638 37.5961 57.9656 37.4332L59.1026 36.8646C60.2869 39.2228 60.9702 41.8752 60.9702 44.6897C60.9702 45.4492 60.9053 46.1929 60.8107 46.927L58.2547 46.2884Z" fill="#104898" />
                            </svg>
                            <div class="story_text">
                                <h6 style="color: #104898;" class="mb-3 fs-17">Tautan Dibagikan</h6>
                                <p class="text-muted">Anda dapat berbagi tautan yang telah Anda singkat kepada teman, keluarga, atau pengikut Anda. </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- container end -->
        </section>
        <!-- Banner-Section-end -->

        <!-- Trusted Section start -->

        <!-- Trusted Section ends -->


        <!-- Footer-Section start -->
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
                            <iframe id="youtubevideo" src="#" width="640" height="360" frameborder="0" allowfullscreen></iframe>
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
