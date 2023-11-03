@extends('layout.user.app')

@section('title', 'Tautan')
@section('style')
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        .card-header .col-12 {
            margin-bottom: 0.25rem;
            /* Sesuaikan jarak vertikal sesuai kebutuhan */
        }

        .card-header h6,
        .card-header h5,
        .card-header p {
            margin: 0;
            /* Hapus margin bawaan */
        }

        .card-header h6 {
            margin-right: 0.5rem;
            /* Jarak kanan untuk h6 */
        }

        .isi {
            /* border: 2px solid #7B7B7B; */
            border-radius: 10px;
            padding-top: 5px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .card-footer {
            padding-top: 10px;
            padding-bottom: 5px;
            border-top: 1px solid var(--tb-border-color-translucent)
        }

        /* Gaya untuk tag <a> saat cursor di atasnya */
        .garisbawah:hover {
            text-decoration: underline;
            /* Menambahkan garis bawah saat cursor di atasnya */
        }

        a:hover {
            text-decoration: underline;
            /* Menambahkan garis bawah saat cursor di atasnya */
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem;
        }

        .nav-link:focus,
        .nav-link:hover {
            text-decoration: none;
        }

        .nav-link.disabled {
            color: #6c757d;
            pointer-events: none;
            cursor: default;
        }

        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        }

        .nav-tabs .nav-link {
            margin-bottom: -1px;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            border-color: #e9ecef #e9ecef #dee2e6;
        }

        .nav-tabs .nav-link.disabled {
            color: transparent;
            background-color: transparent;
            border-color: transparent;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: transparent;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-tabs .dropdown-menu {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .nav-pills .nav-link {
            border-radius: 0.25rem;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #0E2954;
            border-bottom: 3px solid #0E2954;
            border-radius: 0;
            background-color: transparent;
        }

        .icon-white {
            color: white;
            /* Atur warna teks ikon menjadi putih */
        }

        .icon-abu {
            color: #0E2954;
        }

        #pagination-element .pagination-block .page-item .page-link {
            color: #0E2954;
            /* Warna teks paginate 2-3 */
            color: #ffffff;
            /* Warna teks paginate halaman saat ini */
        }

        #pagination-element .pagination-block .page-item.active .page-link {
            background-color: #0E2954;
            /* Warna latar belakang paginate halaman saat ini */
            border-color: #0E2954;
            /* Warna border */
            color: #ffffff;
            /* Warna teks paginate halaman saat ini */
        }

        #pagination-element .pagination-block .page-item:first-child .page-link,
        #pagination-element .pagination-block .page-item:last-child .page-link {
            color: inherit;
            /* Menggunakan warna teks default */
        }

        .page-content {
            background: #ffffff;
        }

        .aa {
            padding: 0;
        }

        @media screen and (min-width: 1200px) {
            .tabss {
                display: inline;
            }
        }

        @media screen and (min-width: 768px) {


            /* Atur gaya CSS khusus untuk perangkat laptop di sini */
            .tabss {
                display: flex;
            }
        }

        .but {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-sm-row">
                <div class="col-12 col-sm-2 isi tabss">
                    <p class="text-muted flex-grow-1 mb-xl-0"></p>
                    <div class="flex-shrink-0">
                        <ul class="nav nav-pills card-header-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#animation-home"
                                    role="tab" data-pagination="activePagination">
                                    Tautan Aktif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" data-bs-toggle="tab" href="#animation-settings" role="tab"
                                    data-pagination="historyPagination">
                                    Riwayat
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- end col -->

                <div class="col-12 col-sm-10 mb-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-sm-end"
                        style="margin-top: 20px">
                        <div class="search-box mb-2 mb-sm-0">
                            <input type="text" class="form-control search" placeholder="Cari...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="animation-home" role="tabpanel">
                                <div class="row">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @if ($urlshort->isEmpty())
                                        <div class="card d-flex flex-column align-items-center">
                                            <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.png') }}"
                                                alt="Gambar">
                                            <div class="d-flex justify-content-center align-items-center mt-2 mb-4">
                                                <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                                <h5 class="mt-2">Maaf! Belum Ada Data Yang Ditemukan</h5>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($urlshort as $row)
                                            @php
                                                $i++;
                                            @endphp
                                            <form>
                                                @csrf
                                                <div class="col-lg-12">
                                                    <div class="card aa"
                                                        style="border: 1px solid var(--tb-border-color-translucent); box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);"
                                                        id="card{{ $row->id }}">
                                                        <div class="card-body" style="">
                                                            <h6 class="col-lg-3 col-md-4 col-sm-12">{{ $row->title }}</h6>
                                                            <div
                                                                class="col-lg-12 col-md-12 col-sm-9 d-flex flex-row justify-content-end">
                                                                <button type="button" id="button-email"
                                                                    class="btn me-3 btn-sm"
                                                                    style="background-color: #0E2954;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#bagikan{{ $i }}"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fa-solid fa-share-nodes icon-white"></i>
                                                                </button>

                                                                <!-- Modal bagikan -->
                                                                <div class="modal fade" id="bagikan{{ $i }}"
                                                                    tabindex="-1" aria-labelledby="addAmountLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div class="row g-3">
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(`https://www.facebook.com/sharer/sharer.php?u=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-facebook"></i>
                                                                                            &nbsp; Facebook</label>
                                                                                    </div>
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(`https://twitter.com/intent/tweet?url=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-twitter"></i>
                                                                                            &nbsp; Twitter</label>
                                                                                    </div>
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(`https://api.whatsapp.com/send?text=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-whatsapp"></i>
                                                                                            &nbsp; WhatsApp</label>
                                                                                    </div>
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            data-platform="copy"
                                                                                            id="copyButton{{ $i }}"
                                                                                            data-url="{{ $row->default_short_url }}"
                                                                                            data-id-copy="{{ $i }}">
                                                                                            <i
                                                                                                class="bi bi-clipboard-fill"></i>
                                                                                            &nbsp; Copy
                                                                                        </label>
                                                                                    </div>

                                                                                    <div class="countdown-input-subscribe">
                                                                                        <a id="tombol-modal"
                                                                                            onclick="tombolmodal('{{ $row->id }}')"
                                                                                            type="button"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#tombol-modal-{{ $row->id }}"
                                                                                            data-id="{{ $row->id }}"><i
                                                                                                class="bi bi-qr-code"></i>
                                                                                            &nbsp; QR
                                                                                            Code</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- end Modal bagikan-->
                                                                <button id="tombol-modal"
                                                                    onclick="tombolmodal('{{ $row->id }}')"
                                                                    type="button"
                                                                    class="btn btn-light me-3 btn-sm clickButton"
                                                                    style="background-color: #CED2D9"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#tombol-modal-{{ $row->id }}"
                                                                    data-id="{{ $row->id }}">
                                                                    <span data-bs-toggle="tooltip"
                                                                        data-bs-placement="left" title="Kode QR"><i
                                                                            class="fa-solid fa-qrcode icon-abu"></i></span>
                                                                </button>

                                                                <button type="button"
                                                                    class="btn btn-light me-3 btn-sm edit-link"
                                                                    style="background-color: #CED2D9;"
                                                                    data-bs-toggle="modal" data-bs-target="#zoomInModal"
                                                                    data-link="{{ $row->url_key }}">
                                                                    <span><i
                                                                            class="fa-solid fa-pen-to-square icon-abu"></i></span>
                                                                </button>

                                                                <button type="button"
                                                                    class="btn btn-light me-3 btn-sm custom-destination-url"
                                                                    style="background-color: #CED2D9"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#customDestinationModal-{{$row->id}}"
                                                                    data-link="{{ $row->url_key }}">
                                                                    <span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="13" height="15"
                                                                            viewBox="0 0 20 20" fill="none">
                                                                            <path
                                                                                d="M4.58464 1.66602C4.0321 1.66602 3.5022 1.88551 3.1115 2.27621C2.7208 2.66691 2.5013 3.19681 2.5013 3.74935V4.16602C2.28029 4.16602 2.06833 4.25381 1.91205 4.41009C1.75577 4.56637 1.66797 4.77834 1.66797 4.99935V8.33268C1.66797 8.5537 1.75577 8.76566 1.91205 8.92194C2.06833 9.07822 2.28029 9.16602 2.5013 9.16602H6.66797C6.88898 9.16602 7.10094 9.07822 7.25722 8.92194C7.4135 8.76566 7.5013 8.5537 7.5013 8.33268V4.99935C7.5013 4.77834 7.4135 4.56637 7.25722 4.41009C7.10094 4.25381 6.88898 4.16602 6.66797 4.16602V3.74935C6.66797 3.19681 6.44848 2.66691 6.05777 2.27621C5.66707 1.88551 5.13717 1.66602 4.58464 1.66602ZM4.58464 2.49935C4.91616 2.49935 5.2341 2.63105 5.46852 2.86547C5.70294 3.09989 5.83464 3.41783 5.83464 3.74935V4.16602H3.33464V3.74935C3.33464 3.41783 3.46633 3.09989 3.70075 2.86547C3.93517 2.63105 4.25311 2.49935 4.58464 2.49935ZM16.3846 2.49935C16.168 2.49935 15.968 2.57435 15.8096 2.73268L14.2763 4.27435L17.4013 7.39935L18.9346 5.85768C19.2596 5.53268 19.2596 4.99935 18.9346 4.69102L16.9846 2.73268C16.818 2.57435 16.593 2.49935 16.3846 2.49935ZM13.3846 5.15768L4.16797 14.3743V17.4993H7.29297L16.5096 8.28268L13.3846 5.15768Z"
                                                                                fill="#0E2954" />
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <br>
                                                            <a href="{{ $row->default_short_url }}" target="_blank"
                                                                class="garisbawah card-title mb-2">
                                                                <h4>{{ $row->default_short_url }}</h4>
                                                            </a>
                                                            <a href="{{ $row->destination_url }}"
                                                                class="card-subtitle font-14 text-muted">{{ $row->destination_url }}</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div
                                                                class="d-flex flex-column flex-sm-row justify-content-between">
                                                                <div class="d-flex col-12 col-sm-5 ">
                                                                    <p style="margin-top: 10px;">
                                                                        {{ \Carbon\Carbon::parse($row->deactivated_at)->format('F j, Y, h:i A') }}
                                                                    </p>
                                                                    &nbsp
                                                                    <?php
                                                                    $deactivatedAt = $row->deactivated_at; // Ambil nilai deactivated_at dari data
                                                                    $now = \Carbon\Carbon::now();

                                                                    if ($deactivatedAt === null) {
                                                                        echo '<p style="margin-top: 10px;"><a href="#" class="access-link">Tautan Aktif</a></p>';
                                                                    } elseif (\Carbon\Carbon::parse($deactivatedAt) >= $now) {
                                                                        echo '<p style="margin-top: 10px;"><a href="#" class="access-link">Tautan Aktif</a></p>';
                                                                    } else {
                                                                        echo '<p class="text-danger" style="margin-top: 10px;">Tautan kadaluarsa</p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div
                                                                    class="col-12 col-sm-7 d-flex flex-row justify-content-end mt-2 mb-3 mt-sm-0">
                                                                    <button type="button"
                                                                        class="btn btn-light  me-3 btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#TimeModal-{{ $row->id }}"
                                                                        data-link="{{ $row->url_key }}"><span
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="left"
                                                                            title="Tautan berbasis waktu"><i
                                                                                class="fa-solid fa-clock"></i>&nbsp;Atur
                                                                            waktu</span></button>
                                                                    <button type="button"
                                                                        class="btn btn-light me-3 btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#zoomInModal1"><span
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="left"
                                                                            title="Tautan terlindungi"><i
                                                                                class="fa-solid fa-lock"></i>&nbsp;kata
                                                                            sandi</span></button>
                                                                    <button type="button" class="btn btn-light btn-sm"
                                                                        data-bs-toggle="collapse"
                                                                        href="#collapseExample{{ $row->id }}"
                                                                        role="button" aria-expanded="true"
                                                                        aria-controls="collapseExample{{ $row->id }}">
                                                                        <i class="bi bi-bar-chart-line-fill"></i> statistik
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @if ($user->subscribe !== 'platinum')
                                                            <div id="zoomInModal1" class="modal fade zoomIn"
                                                                tabindex="-1" aria-labelledby="zoomInModalLabel"
                                                                aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="col-lg-12">
                                                                            <div class="card">
                                                                                <div class="card-header fw-bold">
                                                                                    <div class="avatar-sm mx-auto mb-3">
                                                                                        <div
                                                                                            class="avatar-title bg-custom text-primary fs-xl rounded">
                                                                                            <i
                                                                                                class="fa-solid fa-lock"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body text-center">
                                                                                    <h4 class="card-title">Anda Tidak Bisa
                                                                                        Mengakses Fitur Ini!</h4>
                                                                                    <p class="card-text text-muted">Anda
                                                                                        perlu
                                                                                        Beralih ke Berlangganan
                                                                                        Untuk Bisa Menikmati Fitur Ini</p>
                                                                                </div>
                                                                                <div class="card-footer text-center">
                                                                                    <a href="{{ url('user/subscribe-product-user') }}"
                                                                                        style="color: red;"> Mulai
                                                                                        Berlangganan? </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /.modal-dialog -->
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div id="zoomInModal1" class="modal fade zoomIn"
                                                                tabindex="-1" aria-labelledby="zoomInModalLabel"
                                                                aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <center>
                                                                                <h5 class="modal-title text-center"
                                                                                    id="TimeModalLabel">Tautan Terproteksi
                                                                                </h5>
                                                                                <p>Lindungi tautan anda dengan menambahkan
                                                                                    kata sandi</p>
                                                                                <img class="mt-3 mb-3"
                                                                                    src="{{ asset('template/image/password.png') }} "
                                                                                    width="97" height="69">
                                                                            </center>
                                                                            <div class="col-lg-12 mb-3 mt-3">
                                                                                <label
                                                                                    style="color: #000; font-family: Poppins;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;"
                                                                                    for="deactivated_at">Masukkan kata
                                                                                    sandi</label>
                                                                                <div
                                                                                    class="position-relative auth-pass-inputgroup mb-3">
                                                                                    <input style="background: #F0F0F0;"
                                                                                        type="password"
                                                                                        class="form-control pe-5 password-input"
                                                                                        name="password"
                                                                                        placeholder="Masukkan Kata Sandi"
                                                                                        id="password-input"
                                                                                        value="{{ old('password') }}">
                                                                                    <button
                                                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                                        type="button"
                                                                                        id="password-addon"><i
                                                                                            class="ri-eye-fill align-middle"></i></button>
                                                                                    <div>
                                                                                        @if ($errors->has('password'))
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('password') }}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="but">
                                                                                <button type="button" class="btn"
                                                                                    style="border-radius: 5px;border: 1px solid #FF2323;background: #FFF;"
                                                                                    data-bs-dismiss="modal"><span
                                                                                        style="color: #FF2323;font-family: Poppins;font-size: 14px;font-style: normal;font-weight: 700;line-height: normal;">Hapus</span></button>
                                                                                <button type="button"
                                                                                    class="btn-submit submitKustom"
                                                                                    style="border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.10);background: #0E2954; color: #fff;">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                        @endif
                                                        <!-- /.modal -->
                                                        <div id="tombol-modal-{{ $row->id }}"
                                                            class="modal fade zoomIn modal-sm" tabindex="-1"
                                                            aria-labelledby="zoomInModalLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="zoomInModalLabel">
                                                                            Gambar
                                                                            Kode QR</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="visible-print text-center">
                                                                            {!! QrCode::size(200)->generate($row->destination_url) !!}
                                                                        </div>
                                                                        <br>
                                                                        <div class="text-center">
                                                                            <p>{{ $row->default_short_url }}</p>
                                                                        </div>
                                                                        <!-- <center>
                                                                                                                                                                        <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/qr.png') }}" alt="" width="100%">
                                                                                                                                                                        </center> -->
                                                                    </div>
                                                                    {{-- <center>
                                                                    <button type="button" class="btn btn-danger">Download</button>
                                                                    <button type="button" class="btn btn-light  me-3"><span><i
                                                                                class="fa-solid fa-pen-to-square"></i>&nbsp;Ganti</span></button>
                                                                </center> --}}
                                                                    <div class="modal-footer"></div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                        <p class="d-none" id="default_short_url{{ $i }}">
                                                            {{ $row->default_short_url }}
                                                        </p>
                                                        <form id="formKustom">
                                                            <div id="zoomInModal" class="modal fade zoomIn"
                                                                tabindex="-1" aria-labelledby="zoomInModalLabel"
                                                                aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="zoomInModalLabel">
                                                                                <i
                                                                                    class="fa-solid fa-pen-to-square"></i>&nbsp;Kustom
                                                                                Tautan
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body d-flex"
                                                                                style="background-color: #D9D9D9;">
                                                                                <p><i
                                                                                        class="fa-solid fa-pen-to-square"></i>
                                                                                </p>
                                                                                &nbsp;
                                                                                <p>Kustom tautan adalah fitur yang
                                                                                    memungkinkan
                                                                                    pengguna untuk membuat tautan pendek
                                                                                    yang disesuaikan dengan
                                                                                    keinginan mereka.
                                                                                    Pengguna dapat mengganti atau menentukan
                                                                                    bagian akhir dari tautan
                                                                                    pendek
                                                                                    untuk mencerminkan kata kunci, nama
                                                                                    merek, atau informasi yang
                                                                                    relevan dengan tautan tersebut.</p>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="new_url_key">Kustom
                                                                                    Nama</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="new_url_key" id="new_url_key"
                                                                                    placeholder="Kustom nama">
                                                                            </div>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="new_url_key"></label>
                                                                                <input type="hidden" class="form-control"
                                                                                    name="custom_name" id="new_url_key"
                                                                                    placeholder="Kustom nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex justify-content-end mb-3" style="margin-right: 4%; gap: 0.5rem;">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button id="submitKustom" type="button"
                                                                                class="btn btn-primary submitKustom">Simpan</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </form>
                                                        <form id="updateTime">
                                                            <div id="TimeModal-{{ $row->id }}"
                                                                class="modal fade Time" tabindex="-1"
                                                                aria-labelledby="TimeModalLabel" aria-hidden="true"
                                                                style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="TimeModalLabel"><i
                                                                                    class="fa-solid fa-clock"></i>&nbsp;Atur
                                                                                Waktu</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                                data-id="{{ $row->id }}"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body d-flex"
                                                                                style="background-color: #D9D9D9;">
                                                                                <p><i class="fa-solid fa-clock"></i></p>
                                                                                &nbsp;
                                                                                <p>Tautan berbasis waktu adalah jenis tautan
                                                                                    yang hanya berlangsung
                                                                                    selama periode waktu tertentu.
                                                                                    Ketika tautan telah kedaluwarsa, maka
                                                                                    tautan
                                                                                    tersebut tidak
                                                                                    dapat
                                                                                    diakses lagi.</p>
                                                                            </div>
                                                                            <div class="col-lg-12 mb-3 mt-3">
                                                                                <label for="deactivated_at">Ubah
                                                                                    Tanggal</label>
                                                                                <input type="datetime-local"
                                                                                    class="form-control"
                                                                                    name="deactivated_at"
                                                                                    @if (!is_null($row->deactivated_at)) value="{{ \Carbon\Carbon::parse($row->deactivated_at)->format('Y-m-d\TH:i') }}" @endif
                                                                                    data-id="{{ $row->id }}"
                                                                                    id="deactivated_at-{{ $row->id }}"
                                                                                    data-key="{{ $row->url_key }}"
                                                                                    min="{{ now()->format('Y-m-d\TH:i') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex justify-content-end mb-3" style="margin-right: 4%; gap: 0.5rem;">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button id="submitTime"
                                                                                data-key="{{ $row->url_key }}"
                                                                                data-id="{{ $row->id }}"
                                                                                type="button"
                                                                                class="btn-submit btn btn-primary submitKustom">Simpan</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </form>
                                                        <form id="customDestinationUrl">
                                                            <div id="customDestinationModal-{{$row->id}}" class="modal fade"
                                                                tabindex="-1" aria-labelledby="customDestinationUrl"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <h5 class="modal-title"
                                                                            id="customDestinationUrlTitle"
                                                                            style="text-align: center; display: block; width: 100%;">
                                                                            Ubah Nama Tautan Asli</h5>
                                                                        <div class="modal-body">
                                                                            <div class="card-body d-flex"
                                                                                style="background-color: #D9D9D9;">
                                                                                <p><svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="20" height="16"
                                                                                        viewBox="0 0 12 12"
                                                                                        fill="none">
                                                                                        <path
                                                                                            d="M5.5 4.5H6.5V3.5H5.5V4.5ZM6 10C3.795 10 2 8.205 2 6C2 3.795 3.795 2 6 2C8.205 2 10 3.795 10 6C10 8.205 8.205 10 6 10ZM6 1C5.34339 1 4.69321 1.12933 4.08658 1.3806C3.47995 1.63188 2.92876 2.00017 2.46447 2.46447C1.52678 3.40215 1 4.67392 1 6C1 7.32608 1.52678 8.59785 2.46447 9.53553C2.92876 9.99983 3.47995 10.3681 4.08658 10.6194C4.69321 10.8707 5.34339 11 6 11C7.32608 11 8.59785 10.4732 9.53553 9.53553C10.4732 8.59785 11 7.32608 11 6C11 5.34339 10.8707 4.69321 10.6194 4.08658C10.3681 3.47995 9.99983 2.92876 9.53553 2.46447C9.07124 2.00017 8.52005 1.63188 7.91342 1.3806C7.30679 1.12933 6.65661 1 6 1ZM5.5 8.5H6.5V5.5H5.5V8.5Z"
                                                                                            fill="#555555" />
                                                                                    </svg>
                                                                                </p>
                                                                                &nbsp;
                                                                                <p>Ubah nama tautan asli anda dan sesuaikan
                                                                                    dengan keinginan anda. Mengubah nama
                                                                                    tautan dapat membantu menghindari
                                                                                    konflik dengan tautan lain di situs web
                                                                                    Anda atau mengurangi risiko duplikasi
                                                                                    tautan yang sama. Tautan yang lebih
                                                                                    menarik dan relevan dapat mendorong
                                                                                    pengunjung untuk mengkliknya.</p>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-lg-12 mb-2">
                                                                                <label class="mb-2" for="destination_url"
                                                                                    style="
                                                                                font-weight: bold;">Ubah
                                                                                    Nama</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="destination_url" id="destination_url-{{$row->id}}"
                                                                                    data-key="{{ $row->url_key }}" placeholder="Ubah Nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex justify-content-end mb-3" style="margin-right: 4%; gap: 0.5rem;">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button id="submitDestination" data-key="{{ $row->url_key }}"
                                                                                data-id="{{ $row->id }}" type="button"
                                                                                class="submitDestination btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </form>
                                                        <div class="collapse" id="collapseExample{{ $row->id }}">
                                                            <div class="card-body">
                                                                <div class="d-flex">
                                                                    <div class="col-10">
                                                                        <h5><i class="bi bi-bar-chart-line-fill"></i>
                                                                            statistik
                                                                        </h5>
                                                                    </div>
                                                                    {{-- <div class="col-2 d-flex flex-row justify-content-end">
                                                                    <button type="button" class="btn btn-light "><span>Lihat
                                                                            Detail</span>&nbsp;<i class="fa-solid fa-arrow-right"></i></button>
                                                                </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div id="chart{{ $row->id }}"></div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    @endif
                                    <div class="row align-items-center mb-4 justify-content-between text-center text-sm-start"
                                        id="pagination-element">
                                        <div class="col-sm">
                                            <div class="text-muted">
                                                Menampilkan <span class="fw-semibold">{{ $urlshort->firstItem() }}</span>
                                                hingga <span class="fw-semibold">{{ $urlshort->lastItem() }}</span>
                                                dari total <span class="fw-semibold">{{ $urlshort->total() }}</span> Hasil
                                            </div>
                                        </div>
                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <div
                                                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                <div class="page-item">
                                                    {{ $urlshort->appends(['page_history' => $history->currentPage()])->links('pagination::bootstrap-5') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                            <div class="tab-pane" id="animation-settings" role="tabpanel">
                                <div class="row">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @if ($history->isEmpty())
                                        <div class="card d-flex flex-column align-items-center">
                                            <img style="width: 300px; height: 300px;"
                                                src="{{ asset('images/Empty.png') }}" alt="Gambar">
                                            <div class="d-flex justify-content-center align-items-center mt-2 mb-4">
                                                <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                                <h5 class="mt-2">Maaf! Belum Ada Data Yang Ditemukan</h5>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($history as $url)
                                            @php
                                                $i++;
                                            @endphp
                                            <form action="/archive/{{ $url->id }}">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <div class="card"
                                                        style="border: 1px solid var(--tb-border-color-translucent); padding: 0px; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);"
                                                        id="card{{ $url->id }}">
                                                        <div class="card-body">
                                                            <h6 class="col-lg-3 col-md-4 col-sm-12">{{ $url->title }}
                                                            </h6>
                                                            <div
                                                                class="col-lg-12 col-md-12 col-sm-9 d-flex flex-url justify-content-end">
                                                                <button disabled type="button" id="button-email"
                                                                    class="btn me-3 btn-sm"
                                                                    style="background-color: #0E2954;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#bagikan{{ $i }}"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fa-solid fa-share-nodes"
                                                                        style="color: #fff"></i>
                                                                </button>

                                                                <!-- Modal bagikan -->
                                                                <div class="modal fade" id="bagikan{{ $i }}"
                                                                    tabindex="-1" aria-labelledby="addAmountLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div class="url g-3">
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(`https://www.facebook.com/sharer/sharer.php?u=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-facebook"></i>
                                                                                            &nbsp; Facebook</label>
                                                                                    </div>
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(`https://twitter.com/intent/tweet?url=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-twitter"></i>
                                                                                            &nbsp; Twitter</label>
                                                                                    </div>
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(`https://api.whatsapp.com/send?text=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-whatsapp"></i>
                                                                                            &nbsp; WhatsApp</label>
                                                                                    </div>
                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            data-platform="copy"
                                                                                            id="copyButton{{ $i }}"
                                                                                            data-url="{{ $url->default_short_url }}"
                                                                                            data-id-copy="{{ $i }}">
                                                                                            <i
                                                                                                class="bi bi-clipboard-fill"></i>
                                                                                            &nbsp; Copy
                                                                                        </label>
                                                                                    </div>

                                                                                    <div class="countdown-input-subscribe">
                                                                                        <label class="platform"
                                                                                            onclick="window.open(` https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${document.getElementById('default_short_url{{ $i }}').innerText}`)"><i
                                                                                                class="bi bi-qr-code"></i>
                                                                                            &nbsp; QR Code</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- end Modal bagikan-->
                                                                <button disabled id="tombol-modal"
                                                                    onclick="tombolmodal('{{ $url->id }}')"
                                                                    type="button"
                                                                    class="btn btn-light me-3 btn-sm clickButton"
                                                                    style="background-color: #CED2D9"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#tombol-modal-{{ $url->id }}"
                                                                    data-id="{{ $url->id }}">
                                                                    <span data-bs-toggle="tooltip"
                                                                        data-bs-placement="left" title="Kode QR"><i
                                                                            class="fa-solid fa-qrcode icon-abu"></i></span>
                                                                </button>

                                                                <button disabled type="button"
                                                                    class="btn btn-light me-3 btn-sm edit-link"
                                                                    style="background-color: #CED2D9"
                                                                    data-bs-toggle="modal" data-bs-target="#zoomInModal"
                                                                    data-link="{{ $url->url_key }}">
                                                                    <span><i
                                                                            class="fa-solid fa-pen-to-square icon-abu"></i></span>
                                                                </button>
                                                            </div>
                                                            <br>
                                                            @if ($url->deactivated_at == null)
                                                                <a href="{{ $url->default_short_url }}" target="_blank">
                                                                    <h3 class="garisbawah card-title mb-2">
                                                                        {{ $url->default_short_url }}
                                                                    </h3>
                                                                </a>
                                                            @else
                                                            
                                                                <h3 class="garisbawah text-muted card-title mb-2">
                                                                    {{ $url->default_short_url }}
                                                                </h3>
                                                            @endif
                                                            <a href="{{ $url->destination_url }}"
                                                                class="card-subtitle font-14 text-muted">{{ $url->destination_url }}</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div
                                                                class="d-flex flex-column flex-sm-row justify-content-between">
                                                                <div class="d-flex col-12 col-sm-5 ">
                                                                    <p style="margin-top: 10px;">
                                                                        {{ \Carbon\Carbon::parse($url->deactivated_at)->format('F j, Y, h:i A') }}
                                                                    </p>
                                                                    &nbsp
                                                                    <?php
                                                                    $deactivatedAt = $url->deactivated_at; // Ambil nilai deactivated_at dari data
                                                                    $now = \Carbon\Carbon::now();

                                                                    if ($deactivatedAt === null) {
                                                                        echo '<p style="margin-top: 10px;"><a href="#" class="access-link">Tautan Aktif</a></p>';
                                                                    } elseif (\Carbon\Carbon::parse($deactivatedAt) >= $now) {
                                                                        echo '<p style="margin-top: 10px;"><a href="#" class="access-link">Tautan Aktif</a></p>';
                                                                    } else {
                                                                        echo '<p class="text-danger" style="margin-top: 10px;">Tautan kadaluarsa</p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div
                                                                    class="col-12 col-sm-7 d-flex flex-row justify-content-end mt-2 mt-sm-0">
                                                                    <button disabled type="button"
                                                                        class="btn btn-light  me-3 btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#TimeModal-{{ $url->id }}"
                                                                        data-link="{{ $url->url_key }}"><span
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="left"
                                                                            title="Tautan berbasis waktu"><i
                                                                                class="fa-solid fa-clock"></i>&nbsp;Atur
                                                                            waktu</span></button>
                                                                    <button disabled type="button"
                                                                        class="btn btn-light me-3 btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#zoomInModal1"><span
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="left"
                                                                            title="Tautan terlindungi"><i
                                                                                class="fa-solid fa-lock"></i>&nbsp;kata
                                                                            sandi</span></button>
                                                                    <button disabled type="button"
                                                                        class="btn btn-light btn-sm"
                                                                        data-bs-toggle="collapse"
                                                                        href="#collapseExample{{ $url->id }}"
                                                                        role="button" aria-expanded="true"
                                                                        aria-controls="collapseExample{{ $url->id }}">
                                                                        <i class="bi bi-bar-chart-line-fill"></i> statistik
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div id="zoomInModal1" class="modal fade zoomIn" tabindex="-1"
                                                            aria-labelledby="zoomInModalLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="col-lg-12">
                                                                        <div class="card">
                                                                            <div class="card-header fw-bold">
                                                                                <div class="avatar-sm mx-auto mb-3">
                                                                                    <div
                                                                                        class="avatar-title bg-custom text-primary fs-xl rounded">
                                                                                        <i class="fa-solid fa-lock"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body text-center">
                                                                                <h4 class="card-title">Anda Tidak Bisa
                                                                                    Mengakses Fitur Ini!</h4>
                                                                                <p class="card-text text-muted">Anda perlu
                                                                                    Beralih ke Berlangganan
                                                                                    Untuk Bisa Menikmati Fitur Ini</p>
                                                                            </div>
                                                                            <div class="card-footer text-center">
                                                                                <a href="/subscribe-product-user"
                                                                                    style="color: red;"> Mulai
                                                                                    Berlangganan? </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                        </div>
                                                        <!-- /.modal -->
                                                        <div id="tombol-modal-{{ $url->id }}"
                                                            class="modal fade zoomIn modal-sm" tabindex="-1"
                                                            aria-labelledby="zoomInModalLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="zoomInModalLabel">
                                                                            Gambar
                                                                            Kode QR</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="visible-print text-center">
                                                                            {!! QrCode::size(200)->generate($url->destination_url) !!}
                                                                        </div>
                                                                        <br>
                                                                        <div class="text-center">
                                                                            <p>{{ $url->default_short_url }}</p>
                                                                        </div>
                                                                        <!-- <center>
                                                                                                                                                                                                                            <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/qr.png') }}" alt="" width="100%">
                                                                                                                                                                                                                        </center> -->
                                                                    </div>
                                                                    {{-- <center>
                                                                    <button type="button" class="btn btn-danger">Download</button>
                                                                    <button type="button" class="btn btn-light  me-3"><span><i
                                                                                class="fa-solid fa-pen-to-square"></i>&nbsp;Ganti</span></button>
                                                                </center> --}}
                                                                    <div class="modal-footer"></div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                        <p class="d-none" id="default_short_url{{ $i }}">
                                                            {{ $url->default_short_url }}
                                                        </p>

                                                        <form id="formKustom">
                                                            <div id="zoomInModal" class="modal fade zoomIn"
                                                                tabindex="-1" aria-labelledby="zoomInModalLabel"
                                                                aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="zoomInModalLabel">
                                                                                <i
                                                                                    class="fa-solid fa-pen-to-square"></i>&nbsp;Kustom
                                                                                Tautan
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body d-flex"
                                                                                style="background-color: #D9D9D9;">
                                                                                <p><i
                                                                                        class="fa-solid fa-pen-to-square"></i>
                                                                                </p>
                                                                                &nbsp;
                                                                                <p>Kustom tautan adalah fitur yang
                                                                                    memungkinkan
                                                                                    pengguna untuk membuat tautan pendek
                                                                                    yang
                                                                                    disesuaikan dengan
                                                                                    keinginan mereka.
                                                                                    Pengguna dapat mengganti atau menentukan
                                                                                    bagian akhir dari
                                                                                    tautan
                                                                                    pendek
                                                                                    untuk mencerminkan kata kunci, nama
                                                                                    merek,
                                                                                    atau informasi yang
                                                                                    relevan dengan tautan tersebut.</p>
                                                                            </div>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="new_url_key">Kustom
                                                                                    Nama</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="new_url_key" id="new_url_key"
                                                                                    placeholder="Kustom nama">
                                                                            </div>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="new_url_key"></label>
                                                                                <input type="hidden" class="form-control"
                                                                                    name="custom_name" id="new_url_key"
                                                                                    placeholder="Kustom nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button id="submitKustom" type="button"
                                                                                class="btn btn-primary submitKustom">Simpan</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </form>
                                                        <form id="updateTime">
                                                            <div id="TimeModal-{{ $url->id }}"
                                                                class="modal fade Time" tabindex="-1"
                                                                aria-labelledby="TimeModalLabel" aria-hidden="true"
                                                                style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="TimeModalLabel"><i
                                                                                    class="fa-solid fa-clock"></i>&nbsp;Atur
                                                                                Waktu</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                                data-id="{{ $url->id }}"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body d-flex"
                                                                                style="background-color: #D9D9D9;">
                                                                                <p><i class="fa-solid fa-clock"></i></p>
                                                                                &nbsp;
                                                                                <p>Tautan berbasis waktu adalah jenis tautan
                                                                                    yang hanya berlangsung
                                                                                    selama periode waktu tertentu.
                                                                                    Ketika tautan telah kedaluwarsa, maka
                                                                                    tautan
                                                                                    tersebut tidak
                                                                                    dapat
                                                                                    diakses lagi.</p>
                                                                            </div>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="deactivated_at">Ubah
                                                                                    Tanggal</label>
                                                                                <input type="datetime-local"
                                                                                    class="form-control"
                                                                                    name="deactivated_at"
                                                                                    @if (!is_null($url->deactivated_at)) value="{{ \Carbon\Carbon::parse($url->deactivated_at)->format('Y-m-d\TH:i') }}" @endif
                                                                                    data-id="{{ $url->id }}"
                                                                                    id="deactivated_at-{{ $url->id }}"
                                                                                    data-key="{{ $url->url_key }}"
                                                                                    min="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button id="submitTime"
                                                                                data-key="{{ $url->url_key }}"
                                                                                data-id="{{ $url->id }}"
                                                                                type="button"
                                                                                class="btn-submit btn btn-primary submitKustom">Simpan</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </form>
                                                        <div class="collapse" id="collapseExample{{ $url->id }}">
                                                            <div class="card-footer">
                                                                <div class="d-flex">
                                                                    <div class="col-10">
                                                                        <h5><i class="bi bi-bar-chart-line-fill"></i>
                                                                            statistik
                                                                        </h5>
                                                                    </div>
                                                                    {{-- <div class="col-2 d-flex flex-url justify-content-end">
                                                                    <button type="button" class="btn btn-light "><span>Lihat
                                                                            Detail</span>&nbsp;<i class="fa-solid fa-arurl-right"></i></button>
                                                                </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div id="chart{{ $url->id }}"></div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    @endif
                                    <div class="row align-items-center mb-4 justify-content-between text-center text-sm-start"
                                        id="pagination-element">
                                        <div class="col-sm">
                                            <div class="text-muted">
                                                Menampilkan <span class="fw-semibold">{{ $history->firstItem() }}</span>
                                                hingga <span class="fw-semibold">{{ $history->lastItem() }}</span> dari
                                                total
                                                <span class="fw-semibold">{{ $history->total() }}</span> Hasil
                                            </div>
                                        </div>
                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <div
                                                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                <div class="page-item">
                                                    {{ $history->appends(['page_urlshort' => $urlshort->currentPage()])->links('pagination::bootstrap-5') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- container-fluid -->
    </div>
    @php
        use Carbon\Carbon;
    @endphp
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @foreach ($urlshort as $i => $row)
        <script>
            var options = {
                series: [{
                    name: "jumlah data",
                    data: <?= json_encode($result['series'][$i]) ?>,
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Data Perbulan',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: <?= json_encode($result['labels']) ?>,
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart{{ $row->id }}"), options);
            chart.render();
        </script>
    @endforeach
   <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/password-addon.init.js') }}"></script>
    <script type="text/javascript" src="./jquery.qrcode.js"></script>
    <script type="text/javascript" src="./qrcode.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#copyButton").click(function() {
                let id = $(this).data('id-copy');
                let data = $("#default_short_url" + id);

                data.select();
                data.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(data.value);

            })
            $("#resetButton").click(function() {
                $(".password-input").val("");
            });
            $("#time-reset").click(function() {
                $(".time-input").val("");
            });

            $('.btn-qr').click(function() {

                alert($(this).data('link'))
                $(".demo").qrcode({
                    mode: 1,
                    label: 'jQueryScript.Net',
                    fontname: 'sans',
                    fontcolor: '#000'

                });
                $('#zoomInModal2').modal({
                    show: true
                })
            })
        });
        $("#button-email").click(function() {
            var linkToCopy = $("#link-to-copy").text();

            $("#default_short_url").val(linkToCopy);

            $("#copyButton").attr("data-clipboard-text", linkToCopy);
        });
        $(".platform").click(function() {
            var platform = $(this).data("platform");
            var shortUrl = $("#default_short_url").text();

            switch (platform) {
                case "facebook":
                    window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(shortUrl));
                    break;
                case "twitter":
                    window.open("https://twitter.com/intent/tweet?url=" + encodeURIComponent(shortUrl));
                    break;
                case "whatsapp":
                    console.log(shortUrl)
                    window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(shortUrl));
                    break;
                case "copy":
                    var copyText = $(this).data('url')
                    console.log()
                    try {
                        navigator.clipboard.writeText(copyText);
                        console.log('Content copied to clipboard');
                    } catch (err) {
                        console.error('Failed to copy: ', err);
                        alert('gagal ' + err)
                    }
                    break;

                case "qr":
                    window.open(
                        " https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${document.getElementById('default_short_url{{ $i }}').innerText}" +
                        encodeURIComponent(shortUrl));
                    break;
                default:
                    break;
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#resetButton").click(function() {
                $(".password-input").val("");
            });

            $("#time-reset").click(function() {
                $(".time-input").val("");
            });
        });
    </script>
    <script>
        // Fungsi untuk membuka modal
        function bukaModal() {
            var modal = document.getElementById("modal");
            modal.style.display = "block";
        }

        var qrcodeSrc = 1;

        var tombolModal = document.getElementById("tombol-modal");

        function tombolmodal(id) {
            console.log(id);
            var qrcodeSrcString = qrcodeSrc.toString();

            if (qrcodeSrcString !== null && qrcodeSrcString !== undefined) {
                var dataToSend = {
                    id: id,
                    qrcodeSrc: qrcodeSrcString,
                    _token: $('meta[name="csrf-token"]').attr('content')
                };
                $.ajax({
                    url: "/qr",
                    type: "POST",
                    dataType: "json",
                    data: dataToSend,
                    success: function(response) {
                        qrcodeSrc++;
                    },
                    error: function(response) {
                        console.log(response)
                    }
                });
            }
        }
        tombolModal.addEventListener("click", function() {

        });
    </script>

    <script>
        function copyToClipboard(text) {
            if (!navigator.clipboard) {
                var dummy = document.createElement("textarea");
                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand("copy");
                document.body.removeChild(dummy);
            } else {
                navigator.clipboard.writeText(text)
                    .then(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Link berhasil disalin!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tidak dapat menyalin link.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
            }
        }

        document.querySelectorAll('.platform').forEach(function(element) {
            element.addEventListener('click', function() {
                var dataUrl = this.getAttribute('data-url');
                copyToClipboard(dataUrl);
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var selectId = $('#new_url_key').val();
            // console.log(selectId);
            // Mendapatkan token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan kode berikut di bawahnya
            $('#submitKustom').click(function() {
                var newUrlKey = $('#new_url_key').val();
                // alert('masuk')
                $.ajax({
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: "/user/update-short-link/" + $('#new_url_key').data("original"),
                    method: 'POST',
                    data: {
                        newUrlKey: newUrlKey
                    },
                    dataType: 'JSON',
                    error: function(e) {
                        console.log(e.responseJSON)
                        //    alert(e.responseJSON.newUrlKey[0])
                        Swal.fire(e.responseJSON.newUrlKey[0])
                    },
                    success: function(e) {
                        location.reload()
                    }
                })
            });
        });

        $('.edit-link').click(function() {
            var link = $(this).data('link');

            $('#new_url_key').val(link);
            $('#new_url_key').attr("data-original", link);

        });
    </script>
    <script>
        $(document).ready(function() {
            var selectId = $('#deactivated_at').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $(document).on('click', '.btn-submit', function() {
                var id = $(this).data('id');
                var key = $(this).data('key');
                var newTime = $('#deactivated_at-' + id).val();
                if (newTime == null || newTime == "") {
                    Swal.fire('Isi Data Terlebih Dahulu')
                    return
                }

                $.ajax({
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: "/user/update-deactivated/" + key,
                    method: 'POST',
                    data: {
                        newTime: newTime
                    },
                    dataType: 'JSON',
                    success: function(e) {
                        location.reload()
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
    <script>
        //anjay
        $(document).ready(function() {
            var selectId = $('#destination_url').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $(document).on('click', '.submitDestination', function() {
                var id = $(this).data('id');
                var key = $(this).data('key');
                var newDestination = $('#destination_url-' + id).val();
                console.log(newDestination);
                if (newDestination == null || newDestination == "") {
                    Swal.fire('Isi Data Terlebih Dahulu')
                    return
                }

                $.ajax({
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: "/user/update-destination/" + key,
                    method: 'POST',
                    data: {
                        newDestination: newDestination
                    },
                    dataType: 'JSON',
                    success: function(e) {
                        location.reload()
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
    <script>
        var links = document.querySelectorAll('.access-link');

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                if (!link.classList.contains('inactive')) {
                    return;
                }

                event.preventDefault();

                alert('Tautan sudah tidak dapat diakses.');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.search').keyup(function() {
                var searchText = $(this).val().toLowerCase();
                $('.card').each(function() {
                    var cardText = $(this).text().toLowerCase();
                    if (cardText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#toggleButton").click(function() {
                $("#tautanberjangka").collapse('toggle');
                var buttonText = $(this).text();
                if (buttonText.trim() === "Tampilkan lebih banyak") {
                    $(this).html('Tampilkan lebih sedikit <i class="fa-solid fa-angle-up"></i>');
                } else {
                    $(this).hide();
                }
            });
        });
    </script>
    <script>
        var links = document.querySelectorAll('.access-link');

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                if (!link.classList.contains('inactive')) {
                    return;
                }

                event.preventDefault();

                alert('Tautan sudah tidak dapat diakses.');
            });
        });
    </script>
    <script>
        var inputTanggal = document.querySelector('input[name="deactivated_at"]');
        var today = new Date();
        var year = today.getFullYear();
        var month = String(today.getMonth() + 1).padStart(2, '0');
        var day = String(today.getDate()).padStart(2, '0');
        var waktuHariIni = year + '-' + month + '-' + day + 'T00:00';

        inputTanggal.setAttribute('min', waktuHariIni);
    </script>

@endsection
@endsection
