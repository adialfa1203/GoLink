@extends('layout.user.app')

@section('title', 'Beranda')
@section('style')
    <style>
        .page-content {
            overflow-x: hidden;
        }

        .custom-icon-size {
            font-size: 24px;
            /* Ubah ukuran sesuai kebutuhan */
        }

        .custom-icon-size {
            font-size: 30px;
            /* Ubah ukuran font sesuai kebutuhan Anda */
            color: #fafafa;
            /* Warna merah muda */
        }

        .custom-card {
            background-color: #910000;
            /* Warna merah muda */
            border-color: #FF69B4;
            /* Warna border merah muda */
        }

        .form-label {
            display: block;
        }

        .unavailable-text {
            font-size: 10px;
            opacity: 0.5;
            /* Nilai opacity untuk membuat teks transparan */
        }

        .quota-reset {
            font-size: 12px;
            opacity: 0.5;
            /* Nilai opacity untuk membuat teks sedikit memudar */
        }

        .card-title {
            font-size: 13px;
            /* Anda bisa mengatur ukuran font sesuai keinginan */
        }

        .text-white {
            color: white !important;
        }

        .tooltip-icon {
            position: relative;
            cursor: pointer;
        }

        .tooltip-icon::before {
            content: attr(data-tooltip);
            position: absolute;
            top: -25px;
            left: 0;
            width: 200px;
            /* Sesuaikan dengan lebar tooltip yang Anda inginkan */
            background-color: #333;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 1;
            font-weight: normal;
        }

        .tooltip-icon:hover::before {
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('shortLink') }}" method="POST" id="shortlinkSubmit">
        @csrf
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Beranda</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-sm-6">


                        <div class="dropdown float-end">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted fs-lg"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>

                        <div class="card border-bottom border-2 card-animate" data-bs-toggle="modal"
                            data-bs-target="#addAmount">
                            <div class="card-body d-flex justify-content-between align-items-center"
                                style="background-color: #910000">
                                <div class="wrapper d-flex align-items-center">
                                    <i class="bi bi-link-45deg custom-icon-size"></i>
                                    <p class="text-muted fw-medium text-uppercase mb-0 mx-3 text-white">Buat Tautan Baru</p>
                                </div>
                                <i class="ri-arrow-right-s-line custom-icon-size"></i>
                            </div>
                        </div>

                        {{-- modal --}}
                        <div class="modal fade" id="addAmount" tabindex="-1" aria-labelledby="addAmountLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="addAmountLabel"
                                            style="margin-left: 35%; margin-right: auto;">Buat Tautan Baru</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body" id="short-link">
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="AmountInput" class="form-label">Tautan Panjang</label>
                                                    <input type="text" class="form-control" name="destination_url"
                                                        id="AmountInput"
                                                        placeholder="http://domain-mu.id/yang-paling-panjang-disini">
                                                    <span id="urlError" class="text-danger"></span>
                                                </div>
                                                <div>
                                                    @if ($errors->has('default_short_url'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('default_short_url') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="cardNumber" class="form-label">Judul (opsional)</label>
                                                    <input name="title" class="form-control" id="cardNumber"
                                                        placeholder="Judul">
                                                </div>
                                            </div>
                                            <br>
                                            {{-- modal panjang tautan terproteksi --}}
                                            {{-- <div class="container-fluid">
                                                    <div class="card">
                                                            <button type="button"
                                                                style="background-color: rgb(13, 13, 118); color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center;">
                                                                <i class="bi bi-lock"
                                                                    style="font-size: 12px; margin-right: 5px;"></i>Tautan
                                                                Terproteksi
                                                            </button>


                                                        <div class="collapse" id="collapseExample">
                                                            <div class="card card-body">
                                                                <div class="container">

                                                                    <div class="col-lg-12">

                                                                        <div class="col-lg-12">
                                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                                <label for="emailInput" class="form-label">Kata sandi</label>
                                                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                                                    <input name="password" type="password" class="form-control pe-5 password-input" placeholder="Kata sandi">
                                                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                                                                                        <i class="ri-eye-fill align-middle"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" id="resetButton" style="background-color: rgb(13, 13, 118); color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; justify-content: flex-end; float: right;">
                                                                                <span class="bi bi-arrow-clockwise"> Reset</span>
                                                                            </button>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                            aria-expanded="false" aria-controls="collapseExample"
                                                            id="toggleButton" style="background-color: rgb(13, 13, 118)">
                                                            Tampilkan lebih banyak <i class="fa-solid fa-angle-down"></i>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            {{-- end modal panjang --}}
                                            <br>
                                            {{-- modal panjang tautan berjangka --}}
                                            <div class="container-fluid mt-3">
                                                <div class="card">
                                                    <button type="button" class="bg-primary border border-0"
                                                        style="color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; width: 100%; text-align: left;">
                                                        <i class="bi bi-clock"
                                                            style="font-size: 12px; margin-right: 5px;"></i>Tautan
                                                        Berjangka (opsional)
                                                    </button>
                                                    <div class="collapse" id="tautanberjangka">
                                                        <div class="card card-body">
                                                            <div class="container">

                                                                <div class="col-lg-12">

                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="position-relative auth-pass-inputgroup mb-3">
                                                                            <label for="old_password"
                                                                                class="form-label">Tanggal dan Waktu</label>
                                                                            <input name="deactivated_at"
                                                                                type="datetime-local" id="old_password"
                                                                                class="form-control pe-5 time-input"
                                                                                min="{{ now()->format('Y-m-d\TH:i:s') }}">
                                                                            <button
                                                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                                type="button" id="password-addon">
                                                                            </button>
                                                                        </div>
                                                                        <button class="bg-primary border border-0"
                                                                            type="button" id="time-reset"
                                                                            style="color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; justify-content: flex-end; float: right;">
                                                                            <span class="bi bi-arrow-clockwise">
                                                                                Reset</span>
                                                                        </button>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary bg-primary" style="margin-top: 1px;"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#tautanberjangka" aria-expanded="false"
                                                        aria-controls="collapseExample" id="toggleButton">
                                                        Tampilkan lebih banyak <i class="fa-solid fa-angle-down"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- end modal tautan berjangka --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" style="width: 100%;"
                                                data-bs-toggle="modal" data-bs-target="">
                                                <i class="bi bi-link-45deg"></i> Singkatkan!
                                            </button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Modal singkatkan-->

                        <div class="modal fade" id="singkatkan" tabindex="-1" aria-labelledby="addAmountLabel"
                            aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="addAmountLabel">Buat tautan pemendek baru</h1>

                                        <button type="button" class="btn-close" id="close-singkatkan"
                                            data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-lg-12">

                                                <label type="button" class="btn btn-primary" style="width: 100%;">
                                                    Berhasil menyingkatkan tautan!
                                                </label>

                                            </div>
                                            <div class="col-lg-12">
                                                <label class="form-label">Judul</label>
                                                <input class="form-control" id="title">
                                            </div>
                                            <hr>
                                            <div class="col-lg-12">
                                                <div class="input-group align-items-center rounded"
                                                    style="background: #E9EEF5">
                                                    <input id="default_short_url" class="form-control" type="text"
                                                        id="salin">
                                                    {{-- salin --}}
                                                    <div id="successCopy" class="alert alert-success mt-3"
                                                        style="display: none; position: fixed; bottom: 570px; right: 560px; max-width: 500px;">
                                                        Tautan berhasil disalin ke clipboard
                                                    </div>
                                                    {{-- end salin --}}
                                                    <div class="wrapper end-0 position-absolute" style="z-index: 5">
                                                        <button type="button" id="button-email" data-bs-toggle="modal"
                                                            data-bs-target="#bagikan"
                                                            class="btn btn-sm btn-danger text-white m-1"><i
                                                                class="bi bi-share-fill"></i> Bagikan</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="countdown-input-subscribe">
                                                    <label for="cardNumber" class="form-label">URL asli</label>
                                                    <input class="form-control" id="destination_url">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pemberitahuan "Data berhasil disimpan" (atur posisi dan ukuran) -->
                            <div id="successAlert" class="alert alert-success mt-3"
                                style="display: none; position: fixed; bottom: 570px; right: 590px; max-width: 500px;">
                                Data berhasil disimpan.
                            </div>
                        </div>
                        <!-- end Modal singkatkan -->

                        <!-- Modal bagikan -->
                        <div class="modal fade" id="bagikan" tabindex="-1" aria-labelledby="addAmountLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addAmountLabel">Judul Modal</h5>
                                        <button id="close-bagikan" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3" id="body">
                                            <div class="countdown-input-subscribe">
                                                <label class="platform" data-platform="facebook"><i
                                                        class="bi bi-facebook"></i> &nbsp; Facebook</label>
                                            </div>
                                            <div class="countdown-input-subscribe">
                                                <label class="platform" data-platform="twitter"><i
                                                        class="bi bi-twitter"></i> &nbsp; Twitter</label>
                                            </div>
                                            <div class="countdown-input-subscribe">
                                                <label class="platform" data-platform="whatsapp"><i
                                                        class="bi bi-whatsapp"></i> &nbsp; WhatsApp</label>
                                            </div>
                                            <div class="countdown-input-subscribe">
                                                <label class="platform" data-platform="copy" id="copyButton"><i
                                                        class="bi bi-clipboard-fill"></i> &nbsp; Copy</label>
                                            </div>
                                            <div class="countdown-input-subscribe">
                                                <label class="platform" data-platform="qr"><i class="bi bi-qr-code"></i>
                                                    &nbsp; QR Code</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end Modal bagikan-->


                    </div><!--end col-->
                    <div class="col-xl-4 col-sm-6">


                        <div class="dropdown float-end">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted fs-lg"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>

                        <a href="{{ url('user/add-microsite') }}" class="card border-bottom border-2 card-animate">
                            <div class="card-body d-flex justify-content-between align-items-center"
                                style="background-color: rgb(13, 13, 118)">
                                <div class="wrapper d-flex align-items-center">
                                    <i class="bi bi-question-circle custom-icon-size"></i>
                                    <p class="text-muted fw-medium text-uppercase mb-0 mx-3 text-white"> Buat Microsite
                                        baru</p>
                                </div>
                                <i class="ri-arrow-right-s-line custom-icon-size"></i>
                            </div>
                        </a>


                    </div><!--end col-->


                    <div class="col-xl-4 col-sm-6">


                        <div class="dropdown float-end">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted fs-lg"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>

                        <a href="{{ url('landing-page/help-support') }}" class="card border-bottom border-2 card-animate">
                            <div class="card-body d-flex justify-content-between align-items-center"
                                style="background-color: rgb(224, 113, 34)">
                                <div class="wrapper d-flex align-items-center">
                                    <i class="bi bi-question-circle custom-icon-size"></i>
                                    <p class="text-muted fw-medium text-uppercase mb-0 mx-3 text-white"> Bantuan & Dukungan
                                    </p>
                                </div>
                                <i class="ri-arrow-right-s-line custom-icon-size"></i>
                            </div>
                        </a>

                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">

                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="d-flex flex-column h-100">
                                            <p class="fs-md text-muted mb-4">Pengunjung </p>
                                            <h3 class="mb-0 mt-auto"><span class="counter-value"
                                                    data-target="{{ $totalVisits }}">{{ $totalVisits }}</span></h3>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div id="property_sale" data-colors='["--tb-primary"]' dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="d-flex flex-column h-100">
                                            <p class="fs-md text-muted mb-4">Pengunjung Microsite</p>
                                            <h3 class="mb-0 mt-auto"><span class="counter-value"
                                                    data-target="{{ $totalVisitsMicrosite }}">{{ $totalVisitsMicrosite }}</span>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div id="property_sale" data-colors='["--tb-primary"]' dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex mb-4 pb-1">
                                <div class="flex-grow-1">
                                    <h6 class="card-title">
                                        Tautan dibuat
                                        <span class="tooltip-icon"
                                            data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                            <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <div class="progress" data-bs-toggle="tooltip"
                                data-bs-title="{{ $countURL }} Tautan dibuat">
                                <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated"
                                    role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ ($countURL / 35) * 100 }}%"></div>
                            </div>
                            <p class="text-muted mb-0"><b>{{ $countURL }} dari 35</p>
                            <br>
                            <h6 class="card-title">Microsite dibuat
                                <span class="tooltip-icon"
                                    data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                    <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                </span>
                            </h6>
                            <div class="progress" data-bs-toggle="tooltip"
                                data-bs-title="{{ $countMicrosite }} Nama diubah">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" id="total-microsite"
                                    role="progressbar" aria-valuenow="{{ $countMicrosite }}" aria-valuemin="0"
                                    aria-valuemax="3" style="width: {{ ($countMicrosite / 3) * 100 }}%"></div>
                            </div>
                            <p class="text-muted mb-0" id="microsite-total"><b>{{ $countMicrosite }} dari 3</b></p>
                        </div>
                        <div class="d-flex justify-content-end pe-3" data-bs-toggle="modal"
                            data-bs-target="#lihatlebihbanyak">
                            <p><a href="#"
                                    class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Lihat
                                    lebih banyak</a></p>
                        </div>
                        {{-- modal --}}
                        <div class="modal fade" id="lihatlebihbanyak" tabindex="-1" aria-labelledby="addAmountLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="addAmountLabel"
                                            style="margin-left: 32%; margin-right: auto;">Kuota nama pendek</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    Tautan dibuat
                                                    <span class="tooltip-icon"
                                                        data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                                        <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                    </span>
                                                </h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" aria-valuenow="{{ $countURL }}"
                                                        aria-valuemin="0" aria-valuemax="100"
                                                        style="width: {{ ($countURL / 35) * 100 }}%;">
                                                    </div>
                                                </div>
                                                <p class="text-muted mb-0"><b>{{ $countURL }} dari 35</p>
                                                <br>
                                                <h3 class="card-title">Microsite dibuat
                                                    <span class="tooltip-icon"
                                                        data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                                        <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                    </span>
                                                </h3>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        id="progress-bar" role="progressbar"
                                                        aria-valuenow="{{ $countMicrosite }}" aria-valuemin="0"
                                                        aria-valuemax="10"
                                                        style="width: {{ ($countMicrosite / 3) * 100 }}%;"></div>
                                                </div>
                                                <p class="text-muted mb-0"><b>{{ $countMicrosite }} dari 3</b></p>
                                                <br>
                                                @php
                                                    $userType = Auth::user()->subscribe;
                                                @endphp
                                                @if ($userType === 'yes')
                                                    <h6 class="card-title">Nama yang telah diubah
                                                        <span class="tooltip-icon"
                                                            data-tooltip="Kuota nama yang telah diubah berlaku untuk setiap kali pengguna melakukan pengubahan nama pendek tautan yang sebelumnya sudah diubah.">
                                                            <i
                                                                class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                        </span>
                                                    </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            id="progress-bar" role="progressbar"
                                                            aria-valuenow="{{ $countNameChanged }}" aria-valuemin="0"
                                                            aria-valuemax="5"
                                                            style="width: {{ ($countNameChanged / 5) * 100 }}%;"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><b>{{ $countNameChanged }} dari 5</b></p>
                                                    <br>
                                                    <h6 for="cardNumber" class="card-title">Tautan original
                                                        diubah/bulan
                                                        <span class="tooltip-icon"
                                                            data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                                            <i
                                                                class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                        </span>
                                                    </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            id="progress-bar" role="progressbar" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="5"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><b>0 dari 5</b></p>
                                            </div>
                                            <div class="card-body">
                                                {{-- @php
                                                    $userType = Auth::user()->subscribe; // Gantilah dengan logika yang sesuai dengan aplikasi Anda
                                                @endphp
                                                @if ($userType === 'yes') --}}
                                                <div>

                                                </div>
                                                <br>
                                                <div>

                                                </div>
                                                <br>
                                                {{-- <div class="quota-reset">
                                                    Kuota direset pada <span id="nextMonthDate"></span> pukul 00.00
                                                </div> --}}
                                            @else
                                                <div class="col-lg-12">
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="cardNumber" class="form-label">Tautan original
                                                                diubah/bulan</label>
                                                            <label for="AmountInput" class="unavailable-text"
                                                                style="color: red;"><i>Tidak
                                                                    tersedia pada layanan ini</i></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                @endif
                                                <div class="quota-reset">
                                                    Kuota direset pada <span id="nextMonthDate"></span> pukul 00.00
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="modal-footer">
                                            <a href="{{ url('user/subscribe-product-user') }}" type="button"
                                                class="btn btn-danger" style="width: 100%;">
                                                Langganan untuk mendapatkan kuota
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#close-bagikan").click(function() {
                $('#singkatkan').modal('show');
            });
        });
    </script>

    <script>
        const urlInput = document.getElementById('AmountInput');
        const urlError = document.getElementById('urlError');

        urlInput.addEventListener('input', validateURL);

        function validateURL() {
            const url = urlInput.value;
            const urlRegex = /^(http|https):\/\/[\w\-.]+\.[a-z]{2,}(\/\S*)?$/i;
            const isValidURL = urlRegex.test(url);

            urlError.textContent = '';

            if (!isValidURL) {
                urlError.textContent =
                    'Tautan tidak valid. Pastikan formatnya seperti http://domain-mu.id.';
            }
        }
    </script>

    <script>
        let edit = false;

        function statusEdit() {
            edit = !edit;
            console.log(edit);
        }

        $(document).ready(function() {
            $("#shortlinkSubmit").submit(function(event) {
                event.preventDefault();
                var destinationUrl = $("#AmountInput").val();
                if (!destinationUrl) {
                    Swal.fire({
                        icon: "error",
                        title: "Kesalahan!",
                        text: "Anda harus mengisi data terlebih dahulu.",
                    });
                    $("#addAmount").modal("hide");
                    $("#addAmount").modal("hide");
                    setTimeout(function() {
                        $('#close-singkatkan').click();
                    }, 1000);
                } else {
                    $('#singkatkan').modal('hide');
                    var countURL = {{ $countURL }};
                    if (countURL >= 35) {
                        Swal.fire({
                            icon: "error",
                            title: "Kesalahan!",
                            text: "Anda telah mencapai batas maksimum 35 link diperpendek.",
                        });
                    } else {
                        var formData = $(this).serialize();
                        $.ajax({
                            type: "POST",
                            url: "short-link",
                            data: formData,
                            success: function(response) {
                                if (response.status == 'gagal') {
                                    Swal.fire({
                                        title: 'Kesalahan...',
                                        icon: 'error',
                                        html: response.message +
                                            ' Klik <a href="/BillingSubscriptions">di sini</a> ' +
                                            'untuk info lebih lanjut tentang langganan premium.',
                                    });
                                    setTimeout(function() {
                                        $('#close-singkatkan').click();
                                    }, 1000);
                                }
                                console.log(response.default_short_url);
                                var defaultShort = response.default_short_url;
                                var title = response.title;
                                var url = response.destination_url;
                                $("#default_short_url").val(defaultShort);
                                $("#title").val(title);
                                $('#destination_url').val(url);

                                $("#copyButton").show();
                                $('#singkatkan').modal('show');
                            },
                            error: function(error) {
                                $("#addAmount").modal("hide");
                                $('#singkatkan').modal('hide');
                                Swal.fire({
                                    icon: "error",
                                    title: "Kesalahan!",
                                    text: "URL tidak valid",
                                });
                                console.error("Error:", error.responseJSON.message);
                            }
                        });
                    }
                }

                $("#AmountInput").val("");
                $("#cardNumber").val("");
                $(".password-input").val("");
                $(".time-input").val("");
                $(".close-edit").val("");
                $("#addAmount").modal("hide");
            });
        });

        $("#password-addon").click(function() {
            var passwordInput = $(".password-input");
            var passwordAddon = $("#password-addon");

            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                passwordAddon.html('<i class="ri-eye-off-fill align-middle"></i>');
            } else {
                passwordInput.attr("type", "password");
                passwordAddon.html('<i class="ri-eye-fill align-middle"></i>');
            }
        });
        // $("#copyButton").click(function() {
        //     var textToCopy = $('#default_short_url').val();
        //     var tempTextarea = document.createElement("textarea");
        //     tempTextarea.value = textToCopy;
        //     document.body.appendChild(tempTextarea);
        //     tempTextarea.select();
        //     console.log('Text to copy:', textToCopy);
        //     try {
        //         document.execCommand("copy");
        //         console.log('Teks telah disalin ke clipboard');
        //     } catch (err) {
        //         console.error('Gagal menyalin teks: ', err);
        //         alert('Gagal menyalin teks: ' + err);
        //     } finally {
        //         document.body.removeChild(tempTextarea);
        //     }
        // });

        $("#resetButton").click(function() {
            $(".password-input").val("");
        });
        $("#time-reset").click(function() {
            $(".time-input").val("");
        });
        $(".platform").click(function() {
            var platform = $(this).data("platform");
            var shortUrl = $("#default_short_url").val();

            switch (platform) {
                case "facebook":
                    window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(
                        shortUrl));
                    break;
                case "twitter":
                    window.open("https://twitter.com/intent/tweet?url=" + encodeURIComponent(shortUrl));
                    break;
                case "whatsapp":
                    window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(shortUrl));
                    break;
                case "copy":
                    var tempInput = $('<input>');
                    $('#body').append(tempInput);
                    console.log(shortUrl)
                    tempInput.val(shortUrl).select();
                    document.execCommand('copy');
                    tempInput.remove();
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: 'Tautan Berhasil Disalin ke clipboard'
                    })
                    console.log(shortUrl)
                    break;
                case "qr":
                    window.open(
                        `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${ encodeURIComponent(shortUrl)}`
                    );
                    break;
                default:
                    break;
            }
        });
        $("#simpanButton").click(function() {
            $("#successAlert").fadeIn();
            setTimeout(function() {
                $("#successAlert").fadeOut();
            }, 3000);
        });
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/jsvectormap/js/jsvectormap.min.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/jsvectormap/maps/world-merc.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/dashboard-analytics.init.js') }}">
    </script>

    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/app.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/password-addon.init.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
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
    </script> --}}
    <script>
        var countData = {{ $countURL }};
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / 35) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);
    </script>
    <script>
        var countData = {{ $countNameChanged }};
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / 5) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);

        var progressText = document.querySelector('.text-muted.mb-0 b');
        progressText.textContent = countData + " dari 5";
    </script>
    <script>
        var countData = {{ $countMicrosite }};
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / 3) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);
    </script>
    <script>
        var countURLValue = {{ $countURL }};

        // Calculate the percentage
        var percentage = (countURLValue / 35) * 100;

        var progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = percentage + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('.text-muted.mb-0 b');
        progressText.textContent = countURLValue + ' dari 35';
    </script>
    <script>
        var countURLValue = {{ $countMicrosite }};

        var progressBar = document.querySelector('#total-microsite');
        progressBar.style.width = ((countURLValue / 3) * 100) + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('#microsite-total');
        progressText.textContent = countURLValue + ' dari 3';
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#toggleButton").click(function() {
                $("#tautanberjangka").collapse('toggle');
                var buttonText = $(this).text();
                if (buttonText.trim() === "Tampilkan lebih banyak") {
                    $(this).html('Tampilkan lebih sedikit <i class="fa-solid fa-angle-up"></i>');
                } else {
                    $(this).html('Tampilkan lebih banyak <i class="fa-solid fa-angle-down"></i>');
                }
            });
        });
    </script>
    <script>
        var inputTanggal = document.getElementById('old_password');
        var today = new Date();
        var year = today.getFullYear();
        var month = String(today.getMonth() + 1).padStart(2, '0');
        var day = String(today.getDate()).padStart(2, '0');
        var waktuHariIni = year + '-' + month + '-' + day + 'T00:00';

        inputTanggal.setAttribute('min', waktuHariIni);
    </script>
    <script>
        var currentDate = new Date();
        var nextMonthDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
        var options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var formattedDate = nextMonthDate.toLocaleDateString('id-ID', options);
        document.getElementById('nextMonthDate').textContent = formattedDate;
    </script>
@endsection
