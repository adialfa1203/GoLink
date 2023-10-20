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

        .hed {
            border-radius: 15px;
            background: linear-gradient(to right, #104898, #0E2954);
        }

        .mid {
            border-radius: 15px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        }

        @media (min-width: 1025px) {

            /* Atur gaya CSS khusus untuk perangkat laptop di sini */
            .low {
                /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }

        @media (min-width: 1025px) {

            /* Atur gaya CSS khusus untuk perangkat laptop di sini */
            .up {
                /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }

        @media (min-width: 601px) and (max-width: 1024px) {

            /* Atur gaya CSS khusus untuk perangkat tablet di sini */
            .im {
                display: none;
            }
        }

        @media (max-width: 768px) {

            /* Atur gaya CSS khusus untuk perangkat tablet di sini */
            .im {
                display: none;
            }
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('shortLink') }}" method="POST" id="shortlinkSubmit">
        @csrf
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="card hed">
                    <div class="card-body" style="padding: 0;">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="up">
                                    <div class="" style="color: #fff;padding:20px;margin-top:1%">
                                        <div class="conte" style="margin-left: 5%;">
                                            <h4 style="color: #fff;">Selamat Datang {{ Auth::user()->name }}!</h4>
                                            <p style="margin: 0;">Ayo buat tautan pendekmu sekarang!</p>
                                            <p>Jangan lupakan fitur Micosite dan buat Microsite pribadimu!</p>
                                        </div>
                                    </div>
                                    <div class="im " style="padding: 20px;">
                                        <img src="{{ asset('template/image/dasboard.png') }} " width="170"
                                            style="object-fit: contain;float: right;margin-right: 5%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-xl-4 col-sm-6">
                        <div class="card mid card-animate" data-bs-toggle="modal" data-bs-target="#addAmount">
                            <div class="card-body mid d-flex justify-content-between align-items-center"
                                style="background-color: #F0F0F0;height: 84px; ">
                                <div class="wrapper d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                                        viewBox="0 0 29 29" fill="none">
                                        <path
                                            d="M18.4995 10.5007C21.8836 13.8883 21.8372 19.3195 18.5199 22.6552C18.5137 22.662 18.5063 22.6693 18.4995 22.6761L14.6933 26.4824C11.3362 29.8394 5.8744 29.839 2.51782 26.4824C-0.839273 23.1258 -0.839273 17.6634 2.51782 14.3069L4.61953 12.2052C5.17687 11.6479 6.1367 12.0183 6.16548 12.8059C6.20218 13.8097 6.38218 14.8182 6.71432 15.7921C6.82681 16.1218 6.74644 16.4866 6.50005 16.733L5.7588 17.4742C4.17138 19.0617 4.1216 21.6464 5.69338 23.2493C7.28067 24.868 9.88965 24.8777 11.4891 23.2782L15.2954 19.4725C16.8921 17.8758 16.8855 15.2949 15.2954 13.7048C15.0858 13.4956 14.8746 13.333 14.7097 13.2195C14.593 13.1393 14.4966 13.0331 14.4283 12.9091C14.36 12.7851 14.3216 12.6469 14.3162 12.5055C14.2937 11.9069 14.5058 11.2902 14.9788 10.8172L16.1713 9.62467C16.484 9.31196 16.9745 9.27355 17.3372 9.52662C17.7524 9.81659 18.1414 10.1425 18.4995 10.5007ZM26.4822 2.51764C23.1256 -0.838988 17.6638 -0.839441 14.3067 2.51764L10.5005 6.32389C10.4937 6.33068 10.4863 6.33805 10.4801 6.34484C7.16286 9.68052 7.11636 15.1117 10.5005 18.4993C10.8586 18.8575 11.2475 19.1834 11.6628 19.4733C12.0254 19.7264 12.516 19.6879 12.8287 19.3753L14.0212 18.1827C14.4941 17.7098 14.7062 17.093 14.6838 16.4945C14.6784 16.353 14.64 16.2148 14.5716 16.0909C14.5033 15.9669 14.407 15.8606 14.2903 15.7805C14.1254 15.6669 13.9142 15.5043 13.7046 15.2951C12.1145 13.7051 12.1078 11.1242 13.7046 9.52742L17.5108 5.72174C19.1103 4.12227 21.7192 4.1319 23.3066 5.75063C24.8784 7.35355 24.8286 9.93829 23.2412 11.5257L22.4999 12.2669C22.2535 12.5133 22.1731 12.8781 22.2856 13.2079C22.6178 14.1817 22.7978 15.1902 22.8345 16.194C22.8633 16.9816 23.8231 17.3521 24.3804 16.7947L26.4821 14.693C29.8393 11.3366 29.8393 5.87416 26.4822 2.51764Z"
                                            fill="#0E2954" />
                                    </svg>
                                    <h5 class="text-uppercase mb-0 mx-3" style="color: #0E2954;">Buat Tautan Baru</h5>
                                </div>
                                <svg class="custom-icon-size" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="22" viewBox="0 0 16 22" fill="none">
                                    <path
                                        d="M14.5798 12.1684L4.64816 21.5155C3.96171 22.1615 2.8517 22.1615 2.17255 21.5155L0.522143 19.9622C-0.164309 19.3162 -0.164309 18.2715 0.522143 17.6323L7.55463 11L0.514841 4.37457C-0.171612 3.72852 -0.171612 2.68385 0.514841 2.04467L2.16525 0.484535C2.8517 -0.161514 3.96171 -0.161514 4.64086 0.484535L14.5725 9.83161C15.2663 10.4777 15.2663 11.5223 14.5798 12.1684Z"
                                        fill="#0E2954" />
                                </svg>
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
                                                    <input type="hidden" id="default_short_url_id">
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
                                            <div class="container-fluid mt-3">
                                                <div class="card">
                                                    <button type="button" class=" border border-0"
                                                        style="background: #0E2954;color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; width: 100%; text-align: left;height: 40px">
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
                                                                                class="form-label">Tanggal dan
                                                                                Waktu</label>
                                                                            <input name="deactivated_at"
                                                                                type="datetime-local" id="old_password"
                                                                                class="form-control pe-5 time-input"
                                                                                min="{{ now()->format('Y-m-d\TH:i:s') }}">
                                                                            <button
                                                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                                type="button" id="password-addon">
                                                                            </button>
                                                                        </div>
                                                                        <button class=" border border-0" type="button"
                                                                            id="time-reset"
                                                                            style="background: #0E2954;color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; justify-content: flex-end; float: right;">
                                                                            <span class="bi bi-arrow-clockwise">
                                                                                Reset</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn"
                                                        style="background: #0E2954;color: #fff; margin-top: 1px;"
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
                                            <button type="submit" class="btn"
                                                style="width: 100%; background: #FF2323; color: #fff ;"
                                                data-bs-toggle="modal" data-bs-target="">
                                                <i class="bi bi-link-45deg"></i> Singkatkan!
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                <label type="button" class="btn"
                                                    style="background: #0E2954;color: #fff; width: 100%;">
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
                                                    <input id="default_short_url" name="new_url_key" class="form-control"
                                                        type="text" id="salin">
                                                    <div id="successCopy" class="alert alert-success mt-3"
                                                        style="display: none; position: fixed; bottom: 570px; right: 560px; max-width: 500px;">
                                                        Tautan berhasil disalin ke clipboard
                                                    </div>
                                                    <div class="wrapper end-0 position-absolute" style="z-index: 5">
                                                        <button class="btn btn-transparent btn-sm m-0 p-1" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#edit"
                                                            id="editclose" onclick="statusEdit()">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <button type="button" id="button-email" data-bs-toggle="modal"
                                                            data-bs-target="#bagikan"
                                                            class="btn btn-danger bg-gradient btn-sm m-1"><i
                                                                class="fa-solid fa-square-share-nodes"></i>
                                                            Bagikan</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="collapse" id="edit">
                                                <div class="card">
                                                    <div class="container">
                                                        <button class=" border bg-gradient border-0 me-2" type="button"
                                                            id="submitKustom"
                                                            style="background: #0E2954;color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; justify-content: flex-end; float: right;">
                                                            <span class="bi bi-check mr-2">
                                                                Simpan</span>
                                                        </button>
                                                        <button class="btn btn-danger bg-gradient border border-0 me-2"
                                                            type="button" id="keluarButton"
                                                            style="color: white; font-size: 13px; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; justify-content: flex-end; float: right;"
                                                            onclick="closeEdit()">
                                                            <span class="bi bi-arrow-clockwise">
                                                                Batal</span>
                                                        </button>
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
                        <a href="{{ url('user/add-microsite') }}" class="card mid card-animate">
                            <div class="card-body mid d-flex justify-content-between align-items-center"
                                style="background-color: #F0F0F0;height: 84px;">
                                <div class="wrapper d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30"
                                        viewBox="0 0 29 30" fill="none">
                                        <path
                                            d="M20.4579 0H8.37635C3.12852 0 0 3.14807 0 8.4287V20.5713C0 25.8664 3.12852 29.0145 8.37635 29.0145H20.4435C25.6913 29.0145 28.8198 25.8664 28.8198 20.5858V8.4287C28.8342 3.14807 25.7057 0 20.4579 0ZM21.6257 22.1235H7.20856C6.61746 22.1235 6.12728 21.6303 6.12728 21.0355C6.12728 20.4407 6.61746 19.9474 7.20856 19.9474H21.6257C22.2168 19.9474 22.707 20.4407 22.707 21.0355C22.707 21.6303 22.2168 22.1235 21.6257 22.1235ZM21.6257 15.5953H7.20856C6.61746 15.5953 6.12728 15.102 6.12728 14.5072C6.12728 13.9124 6.61746 13.4192 7.20856 13.4192H21.6257C22.2168 13.4192 22.707 13.9124 22.707 14.5072C22.707 15.102 22.2168 15.5953 21.6257 15.5953ZM21.6257 9.06702H7.20856C6.61746 9.06702 6.12728 8.57377 6.12728 7.97898C6.12728 7.38418 6.61746 6.89093 7.20856 6.89093H21.6257C22.2168 6.89093 22.707 7.38418 22.707 7.97898C22.707 8.57377 22.2168 9.06702 21.6257 9.06702Z"
                                            fill="#0E2954" />
                                    </svg>
                                    <h5 class="text-uppercase mb-0 mx-3" style="color: #0E2954;"> Buat Microsite
                                        baru</h5>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22"
                                    viewBox="0 0 16 22" fill="none">
                                    <path
                                        d="M14.5798 12.1684L4.64816 21.5155C3.96171 22.1615 2.8517 22.1615 2.17255 21.5155L0.522143 19.9622C-0.164309 19.3162 -0.164309 18.2715 0.522143 17.6323L7.55463 11L0.514841 4.37457C-0.171612 3.72852 -0.171612 2.68385 0.514841 2.04467L2.16525 0.484535C2.8517 -0.161514 3.96171 -0.161514 4.64086 0.484535L14.5725 9.83161C15.2663 10.4777 15.2663 11.5223 14.5798 12.1684Z"
                                        fill="#0E2954" />
                                </svg>
                            </div>
                        </a>

                    </div><!--end col-->

                    <div class="col-xl-4 col-sm-6">
                        <a href="{{ url('id/help-support') }}" class="card mid card-animate">
                            <div class="card-body mid d-flex justify-content-between align-items-center"
                                style="background-color: #F0F0F0;height: 84px;">
                                <div class="wrapper d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31"
                                        viewBox="0 0 32 31" fill="none">
                                        <mask id="path-1-inside-1_1182_11467" fill="white">
                                            <path
                                                d="M10.0465 30.7051C9.62977 30.7051 9.19811 30.6009 8.81113 30.3925C7.96276 29.946 7.44186 29.053 7.44186 28.1004V25.9871C2.94698 25.5257 0 22.2213 0 17.4883V8.55814C0 3.43814 3.43814 0 8.55814 0H23.4419C28.5619 0 32 3.43814 32 8.55814V17.4883C32 22.6083 28.5619 26.0465 23.4419 26.0465H17.8307L11.4902 30.2736C11.0586 30.5564 10.5526 30.7051 10.0465 30.7051ZM8.55814 2.21766C4.71814 2.21766 2.23256 4.70324 2.23256 8.54324V17.4736C2.23256 21.3136 4.71814 23.7992 8.55814 23.7992C9.16837 23.7992 9.67442 24.3052 9.67442 24.9154V28.0857C9.67442 28.2792 9.79349 28.3685 9.86791 28.4131C9.94234 28.4578 10.0912 28.5024 10.2549 28.3982L16.8781 23.9926C17.0567 23.8736 17.28 23.7992 17.5033 23.7992H23.4567C27.2967 23.7992 29.7823 21.3136 29.7823 17.4736V8.54324C29.7823 4.70324 27.2967 2.21766 23.4567 2.21766H8.55814Z" />
                                        </mask>
                                        <path
                                            d="M10.0465 30.7051C9.62977 30.7051 9.19811 30.6009 8.81113 30.3925C7.96276 29.946 7.44186 29.053 7.44186 28.1004V25.9871C2.94698 25.5257 0 22.2213 0 17.4883V8.55814C0 3.43814 3.43814 0 8.55814 0H23.4419C28.5619 0 32 3.43814 32 8.55814V17.4883C32 22.6083 28.5619 26.0465 23.4419 26.0465H17.8307L11.4902 30.2736C11.0586 30.5564 10.5526 30.7051 10.0465 30.7051ZM8.55814 2.21766C4.71814 2.21766 2.23256 4.70324 2.23256 8.54324V17.4736C2.23256 21.3136 4.71814 23.7992 8.55814 23.7992C9.16837 23.7992 9.67442 24.3052 9.67442 24.9154V28.0857C9.67442 28.2792 9.79349 28.3685 9.86791 28.4131C9.94234 28.4578 10.0912 28.5024 10.2549 28.3982L16.8781 23.9926C17.0567 23.8736 17.28 23.7992 17.5033 23.7992H23.4567C27.2967 23.7992 29.7823 21.3136 29.7823 17.4736V8.54324C29.7823 4.70324 27.2967 2.21766 23.4567 2.21766H8.55814Z"
                                            fill="#0E2954" />
                                        <path
                                            d="M8.81113 30.3925L10.7075 26.8706L10.6909 26.8616L10.6741 26.8528L8.81113 30.3925ZM7.44186 25.9871H11.4419V22.3766L7.85031 22.008L7.44186 25.9871ZM17.8307 26.0465V22.0465H16.6196L15.6119 22.7183L17.8307 26.0465ZM11.4902 30.2736L13.6823 33.6194L13.6957 33.6106L13.709 33.6018L11.4902 30.2736ZM9.86791 28.4131L7.80992 31.8431L7.81023 31.8433L9.86791 28.4131ZM10.2549 28.3982L12.4024 31.7729L12.4365 31.7511L12.4702 31.7287L10.2549 28.3982ZM16.8781 23.9926L19.0935 27.3232L19.0969 27.3209L16.8781 23.9926ZM10.0465 26.7051C10.2807 26.7051 10.502 26.76 10.7075 26.8706L6.91473 33.9144C7.89419 34.4418 8.97885 34.7051 10.0465 34.7051V26.7051ZM10.6741 26.8528C11.1815 27.1199 11.4419 27.6154 11.4419 28.1004H3.44186C3.44186 30.4906 4.74406 32.7721 6.94815 33.9322L10.6741 26.8528ZM11.4419 28.1004V25.9871H3.44186V28.1004H11.4419ZM7.85031 22.008C6.50643 21.87 5.60825 21.3447 5.03794 20.6967C4.46201 20.0424 4 19.01 4 17.4883H-4C-4 20.6997 -2.98852 23.6859 -0.967238 25.9824C1.05965 28.2852 3.8824 29.6427 7.03341 29.9662L7.85031 22.008ZM4 17.4883V8.55814H-4V17.4883H4ZM4 8.55814C4 6.91445 4.53449 5.8405 5.1875 5.1875C5.8405 4.53449 6.91445 4 8.55814 4V-4C5.08183 -4 1.87671 -2.81542 -0.469358 -0.469357C-2.81542 1.87671 -4 5.08183 -4 8.55814H4ZM8.55814 4H23.4419V-4H8.55814V4ZM23.4419 4C25.0856 4 26.1595 4.53449 26.8125 5.1875C27.4655 5.8405 28 6.91445 28 8.55814H36C36 5.08183 34.8154 1.87671 32.4694 -0.469357C30.1233 -2.81542 26.9182 -4 23.4419 -4V4ZM28 8.55814V17.4883H36V8.55814H28ZM28 17.4883C28 19.132 27.4655 20.206 26.8125 20.859C26.1595 21.512 25.0856 22.0465 23.4419 22.0465V30.0465C26.9182 30.0465 30.1233 28.8619 32.4694 26.5158C34.8154 24.1697 36 20.9646 36 17.4883H28ZM23.4419 22.0465H17.8307V30.0465H23.4419V22.0465ZM15.6119 22.7183L9.27134 26.9454L13.709 33.6018L20.0495 29.3746L15.6119 22.7183ZM9.29808 26.9277C9.5215 26.7814 9.77807 26.7051 10.0465 26.7051V34.7051C11.327 34.7051 12.5956 34.3314 13.6823 33.6194L9.29808 26.9277ZM8.55814 -1.78234C5.75901 -1.78234 3.09788 -0.858932 1.12692 1.11202C-0.844034 3.08298 -1.76744 5.74411 -1.76744 8.54324H6.23256C6.23256 7.50237 6.55194 7.00071 6.78378 6.76888C7.01561 6.53704 7.51727 6.21766 8.55814 6.21766V-1.78234ZM-1.76744 8.54324V17.4736H6.23256V8.54324H-1.76744ZM-1.76744 17.4736C-1.76744 20.2727 -0.844034 22.9338 1.12692 24.9048C3.09788 26.8758 5.75901 27.7992 8.55814 27.7992V19.7992C7.51727 19.7992 7.01561 19.4798 6.78378 19.2479C6.55194 19.0161 6.23256 18.5144 6.23256 17.4736H-1.76744ZM8.55814 27.7992C6.95923 27.7992 5.67442 26.5143 5.67442 24.9154H13.6744C13.6744 22.0961 11.3775 19.7992 8.55814 19.7992V27.7992ZM5.67442 24.9154V28.0857H13.6744V24.9154H5.67442ZM5.67442 28.0857C5.67442 30.3795 7.27946 31.5248 7.80992 31.8431L11.9259 24.9831C12.0773 25.074 12.5328 25.358 12.9433 25.9052C13.4039 26.5194 13.6744 27.2848 13.6744 28.0857H5.67442ZM7.81023 31.8433C8.79424 32.4336 10.6177 32.9086 12.4024 31.7729L8.1074 25.0236C8.75419 24.612 9.50933 24.4265 10.2498 24.4676C10.9298 24.5054 11.4968 24.7257 11.9256 24.983L7.81023 31.8433ZM12.4702 31.7287L19.0935 27.3231L14.6628 20.6621L8.03955 25.0677L12.4702 31.7287ZM19.0969 27.3209C18.6746 27.6024 18.1346 27.7992 17.5033 27.7992V19.7992C16.4254 19.7992 15.4389 20.1448 14.6593 20.6644L19.0969 27.3209ZM17.5033 27.7992H23.4567V19.7992H17.5033V27.7992ZM23.4567 27.7992C26.2559 27.7992 28.917 26.8758 30.888 24.9048C32.8589 22.9338 33.7823 20.2727 33.7823 17.4736H25.7823C25.7823 18.5144 25.4629 19.0161 25.2311 19.2479C24.9993 19.4798 24.4976 19.7992 23.4567 19.7992V27.7992ZM33.7823 17.4736V8.54324H25.7823V17.4736H33.7823ZM33.7823 8.54324C33.7823 5.74411 32.8589 3.08298 30.888 1.11202C28.917 -0.858932 26.2559 -1.78234 23.4567 -1.78234V6.21766C24.4976 6.21766 24.9993 6.53704 25.2311 6.76888C25.4629 7.00071 25.7823 7.50237 25.7823 8.54324H33.7823ZM23.4567 -1.78234H8.55814V6.21766H23.4567V-1.78234Z"
                                            fill="#0E2954" mask="url(#path-1-inside-1_1182_11467)" />
                                        <mask id="path-3-inside-2_1182_11467" fill="white">
                                            <path
                                                d="M16.001 15.5088C15.3907 15.5088 14.8847 15.0027 14.8847 14.3925V14.0799C14.8847 12.3534 16.1498 11.505 16.6261 11.1776C17.1768 10.8055 17.3554 10.5525 17.3554 10.1655C17.3554 9.42134 16.7452 8.81105 16.001 8.81105C15.2568 8.81105 14.6466 9.42134 14.6466 10.1655C14.6466 10.7758 14.1405 11.2818 13.5303 11.2818C12.9201 11.2818 12.4141 10.7758 12.4141 10.1655C12.4141 8.18599 14.0214 6.57849 16.001 6.57849C17.9805 6.57849 19.588 8.18599 19.588 10.1655C19.588 11.8623 18.3377 12.7106 17.8763 13.0232C17.2959 13.4102 17.1173 13.6632 17.1173 14.0799V14.3925C17.1173 15.0176 16.6112 15.5088 16.001 15.5088Z" />
                                        </mask>
                                        <path
                                            d="M16.001 15.5088C15.3907 15.5088 14.8847 15.0027 14.8847 14.3925V14.0799C14.8847 12.3534 16.1498 11.505 16.6261 11.1776C17.1768 10.8055 17.3554 10.5525 17.3554 10.1655C17.3554 9.42134 16.7452 8.81105 16.001 8.81105C15.2568 8.81105 14.6466 9.42134 14.6466 10.1655C14.6466 10.7758 14.1405 11.2818 13.5303 11.2818C12.9201 11.2818 12.4141 10.7758 12.4141 10.1655C12.4141 8.18599 14.0214 6.57849 16.001 6.57849C17.9805 6.57849 19.588 8.18599 19.588 10.1655C19.588 11.8623 18.3377 12.7106 17.8763 13.0232C17.2959 13.4102 17.1173 13.6632 17.1173 14.0799V14.3925C17.1173 15.0176 16.6112 15.5088 16.001 15.5088Z"
                                            fill="#0E2954" />
                                        <path
                                            d="M16.6261 11.1776L14.3867 7.86325L14.3733 7.87229L14.36 7.88144L16.6261 11.1776ZM17.8763 13.0232L20.0951 16.3514L20.1075 16.3432L20.1197 16.3349L17.8763 13.0232ZM16.001 11.5088C17.5999 11.5088 18.8847 12.7936 18.8847 14.3925H10.8847C10.8847 17.2119 13.1816 19.5088 16.001 19.5088V11.5088ZM18.8847 14.3925V14.0799H10.8847V14.3925H18.8847ZM18.8847 14.0799C18.8847 14.1504 18.8694 14.2602 18.8228 14.3811C18.7792 14.4945 18.7267 14.5699 18.6979 14.6059C18.6718 14.6384 18.6635 14.6408 18.6932 14.6164C18.728 14.5878 18.7611 14.5639 18.8922 14.4738L14.36 7.88144C13.9157 8.1869 10.8847 10.0989 10.8847 14.0799H18.8847ZM18.8655 14.492C19.2521 14.2308 19.9119 13.7549 20.447 13.0094C21.1055 12.0918 21.3554 11.0921 21.3554 10.1655H13.3554C13.3554 9.94978 13.3809 9.63833 13.4896 9.27838C13.6008 8.91021 13.7673 8.59611 13.9475 8.34493C14.2556 7.91564 14.5508 7.75234 14.3867 7.86325L18.8655 14.492ZM21.3554 10.1655C21.3554 7.21243 18.9545 4.81105 16.001 4.81105V12.811C14.5358 12.811 13.3554 11.6302 13.3554 10.1655H21.3554ZM16.001 4.81105C13.0474 4.81105 10.6466 7.21243 10.6466 10.1655H18.6466C18.6466 11.6302 17.4662 12.811 16.001 12.811V4.81105ZM10.6466 10.1655C10.6466 8.56662 11.9314 7.28181 13.5303 7.28181V15.2818C16.3497 15.2818 18.6466 12.9849 18.6466 10.1655H10.6466ZM13.5303 7.28181C15.1294 7.28181 16.4141 8.56676 16.4141 10.1655H8.41406C8.41406 12.9848 10.7108 15.2818 13.5303 15.2818V7.28181ZM16.4141 10.1655C16.4141 10.395 16.2308 10.5785 16.001 10.5785V2.57849C11.8121 2.57849 8.41406 5.97703 8.41406 10.1655H16.4141ZM16.001 10.5785C15.7713 10.5785 15.588 10.395 15.588 10.1655H23.588C23.588 5.97694 20.1897 2.57849 16.001 2.57849V10.5785ZM15.588 10.1655C15.588 10.085 15.6052 9.9695 15.6527 9.84618C15.6972 9.73064 15.7505 9.65367 15.7805 9.61619C15.8078 9.58196 15.8188 9.57659 15.7952 9.59606C15.7696 9.61715 15.7401 9.63891 15.6329 9.71153L20.1197 16.3349C20.5891 16.0169 23.588 14.1115 23.588 10.1655H15.588ZM15.6575 9.695C15.2692 9.95389 14.5795 10.4398 14.0267 11.212C13.3406 12.1703 13.1173 13.1907 13.1173 14.0799H21.1173C21.1173 14.2629 21.0975 14.5598 20.9938 14.915C20.8861 15.2836 20.72 15.6057 20.5316 15.8689C20.2132 16.3136 19.903 16.4795 20.0951 16.3514L15.6575 9.695ZM13.1173 14.0799V14.3925H21.1173V14.0799H13.1173ZM13.1173 14.3925C13.1173 12.7738 14.4369 11.5088 16.001 11.5088V19.5088C18.7855 19.5088 21.1173 17.2614 21.1173 14.3925H13.1173Z"
                                            fill="#0E2954" mask="url(#path-3-inside-2_1182_11467)" />
                                        <path
                                            d="M15.9991 17.2151C16.4959 17.2151 16.8828 17.6219 16.8828 18.0988C16.8828 18.5932 16.4934 18.9825 15.9991 18.9825C15.5048 18.9825 15.1154 18.5932 15.1154 18.0988C15.1154 17.6219 15.5023 17.2151 15.9991 17.2151Z"
                                            fill="#0E2954" stroke="#0E2954" stroke-width="4" />
                                    </svg>
                                    <h5 class="text-uppercase mb-0 mx-3" style="color: #0E2954;"> Bantuan & Dukungan
                                    </h5>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22"
                                    viewBox="0 0 16 22" fill="none">
                                    <path
                                        d="M14.5798 12.1684L4.64816 21.5155C3.96171 22.1615 2.8517 22.1615 2.17255 21.5155L0.522143 19.9622C-0.164309 19.3162 -0.164309 18.2715 0.522143 17.6323L7.55463 11L0.514841 4.37457C-0.171612 3.72852 -0.171612 2.68385 0.514841 2.04467L2.16525 0.484535C2.8517 -0.161514 3.96171 -0.161514 4.64086 0.484535L14.5725 9.83161C15.2663 10.4777 15.2663 11.5223 14.5798 12.1684Z"
                                        fill="#0E2954" />
                                </svg>
                            </div>
                        </a>

                    </div><!--end col-->
                </div><!--end row-->
                <div class="low mt-3">
                    @if ($user->subscribe !== 'platinum')
                        <div class="">
                            <div class="card mid" style="background-color: #F0F0F0;">
                                <div class="card-body">
                                    <p
                                        style="color: #0E2954;font-family: Poppins;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">
                                        Kuota</p>
                                    <hr>
                                    <div class="d-flex pb-1">
                                        <div class="flex-grow-1">
                                            <h6 class="card-title" style="color: #0E2954;">
                                                Tautan dibuat/Bulan
                                                <span class="tooltip-icon"
                                                    data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                                    <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="progress" data-bs-toggle="tooltip"
                                        data-bs-title="{{ $countURL }} Tautan dibuat">
                                        <div id="progress-bar"
                                            class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ ($countURL / $urlStatus) * 100 }}%"></div>
                                    </div>
                                    <p class="mb-0" style="color: #0E2954;"><b>{{ $countURL }} dari
                                            {{ $urlStatus }}
                                    </p>
                                    <br>
                                    <h6 class="card-title" style="color: #0E2954;">Microsite dibuat/Bulan
                                        <span class="tooltip-icon"
                                            data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                            <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                        </span>
                                    </h6>
                                    <div class="progress" data-bs-toggle="tooltip"
                                        data-bs-title="{{ $countMicrosite }} Nama diubah">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            id="total-microsite" role="progressbar"
                                            aria-valuenow="{{ $countMicrosite }}" aria-valuemin="0" aria-valuemax="3"
                                            style="width: {{ ($countMicrosite / $micrositeStatus) * 100 }}%"></div>
                                    </div>
                                    <p class="mb-0" style="color: #0E2954;" id="microsite-total">
                                        <b>{{ $countMicrosite }}
                                            dari {{ $micrositeStatus }}</b>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end pe-3" data-bs-toggle="modal"
                                    data-bs-target="#lihatlebihbanyak">
                                    <p><a href="#"
                                            class="link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover"
                                            style="color: #0E2954;">Lihat
                                            lebih banyak</a></p>
                                </div>
                                {{-- modal --}}
                                <div class="modal fade" id="lihatlebihbanyak" tabindex="-1"
                                    aria-labelledby="addAmountLabel" aria-hidden="true">
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
                                                                <i
                                                                    class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                            </span>
                                                        </h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="{{ $countURL }}"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{ ($countURL / $urlStatus) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <p class="text-muted mb-0"><b>{{ $countURL }} dari
                                                                {{ $urlStatus }}</p>
                                                        <br>
                                                        <h3 class="card-title">Microsite dibuat/Bulan
                                                            <span class="tooltip-icon"
                                                                data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                                                <i
                                                                    class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                id="progress-bar" role="progressbar"
                                                                aria-valuenow="{{ $countMicrosite }}" aria-valuemin="0"
                                                                aria-valuemax="10"
                                                                style="width: {{ ($countMicrosite / $micrositeStatus) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <p class="text-muted mb-0"><b>{{ $countMicrosite }} dari
                                                                {{ $micrositeStatus }}</b></p>
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
                                                                    aria-valuenow="{{ $countNameChanged }}"
                                                                    aria-valuemin="0" aria-valuemax="5"
                                                                    style="width: {{ ($countNameChanged / 5) * 100 }}%;">
                                                                </div>
                                                            </div>
                                                            <p class="text-muted mb-0"><b>{{ $countNameChanged }} dari
                                                                    5</b>
                                                            </p>
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
                                                                    id="progress-bar" role="progressbar"
                                                                    aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="5"></div>
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
                                                                    <label for="cardNumber" class="form-label">Tautan
                                                                        original
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
                <a href="{{ url('user/subscribe-product-user') }}" type="button" class="btn btn-danger"
                    style="width: 100%;">
                    Langganan untuk mendapatkan kuota
                </a>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    @else
        <div class="card mid" style="background-color: #F0F0F0;">
            <div class="d-flex">
                <div class="card-body" id="chart"></div>
            </div>
        </div>
        @endif
        <div class="">
            <div class="">
                <div class="card mid" style="background-color: #F0F0F0;">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex flex-column h-100">
                                    <p class="fs-md"
                                        style="color: #0E2954;font-family: Poppins;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">
                                        Pengunjung Tautan</p>
                                    <h3 class="mb-0 mt-auto"><span class="counter-value"
                                            data-target="{{ $totalVisits }}">{{ $totalVisits }}</span></h3>
                                </div>
                            </div>
                            <img src="{{ asset('template/image/user.png') }} " width="50" height="50"
                                style="margin-right: -2%; margin-top: 2%;">
                            <div class="flex-shrink-0">
                                <div id="property_sale" data-colors='["--tb-primary"]' dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card mid" style="background-color: #F0F0F0;">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex flex-column h-100">
                                    <p class="fs-md"
                                        style="color: #0E2954;font-family: Poppins;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">
                                        Pengunjung Microsite</p>
                                    <h3 class="mb-0 mt-auto"><span class="counter-value"
                                            data-target="{{ $totalVisitsMicrosite }}">{{ $totalVisitsMicrosite }}</span>
                                    </h3>
                                </div>
                            </div>
                            <img src="{{ asset('template/image/user.png') }} " width="50" height="50"
                                style="margin-right: -2%; margin-top: 2%;">
                            <div class="flex-shrink-0">
                                <div id="property_sale" data-colors='["--tb-primary"]' dir="ltr"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(document).ready(function() {
            var selectId = $('#new_url_key').val();
            // console.log(selectId);
            console.log(selectId);
            // Mendapatkan token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan kode berikut di bawahnya
            $('#submitKustom').click(function() {
                var url = $('#default_short_url').val();
                // alert('masuk')
                var parts = url.split('/'); // Membagi URL menjadi potongan-potongan dengan karakter '/'
                var newUrlKey = parts[parts.length - 1]; // Mengambil bagian terakhir dari potongan
                $.ajax({
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: "/user/update-short-link-id/" + $("#default_short_url_id").val(),
                    method: 'POST',
                    data: {
                        newUrlKey: newUrlKey
                    },
                    dataType: 'JSON',
                    error: function(e) {
                        console.log(e.responseJSON)
                        Swal.fire(e.responseJSON.newUrlKey[0])
                    },
                    success: function(e) {
                        Swal.fire({
                            icon: "success",
                            title: "Nama tautan berhasil diubah",
                        });
                        // location.reload()
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
            fetchData();
        });

        function fetchData() {
            $.ajax({
                url: '{{ route('getChartDataa') }}',
                method: 'GET',
                success: function(response) {
                    var countURL = response.countURL;
                    var countMicrosite = response.countMicrosite;
                    updateChart(countURL, countMicrosite);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function updateChart(countURL, countMicrosite) {
            var options = {
                series: [{
                    name: 'Total URL',
                    data: countURL.map(item => item.count)
                }, {
                    name: 'Total Microsite',
                    data: countMicrosite.map(item => item.count)
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                        barWidth: '50%'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                colors: ['#104898','#337CCF']
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#close-bagikan").click(function() {
                $('#singkatkan').modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var selectId = $('#new_url_key').val();
            console.log(selectId);
            // Mendapatkan token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan kode berikut di bawahnya
            $('#submitKustom').click(function() {
                var url = $('#default_short_url').val();
                // alert('masuk')
                var parts = url.split('/'); // Membagi URL menjadi potongan-potongan dengan karakter '/'
                var newUrlKey = parts[parts.length - 1]; // Mengambil bagian terakhir dari potongan
                $.ajax({
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: "/user/update-short-link-id/" + $("#default_short_url_id").val(),
                    method: 'POST',
                    data: {
                        newUrlKey: newUrlKey
                    },
                    dataType: 'JSON',
                    error: function(e) {
                        console.log(e.responseJSON)
                        Swal.fire(e.responseJSON.newUrlKey[0])
                    },
                    success: function(e) {
                        Swal.fire({
                            icon: "success",
                            title: "Nama tautan berhasil diubah",
                        });
                        // location.reload()
                    }
                })
            });
        });

        $('.edit-link').click(function() {
            var link = $(this).data('link');

            $('#new_url_key').val(link);
            $('#new_url_key').attr("data-original", link);

        }); <
        /> <
        script >
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
                    if (countURL >= 15) {
                        Swal.fire({
                            icon: "error",
                            title: "Kesalahan!",
                            text: "Anda telah mencapai batas maksimum 15 link diperpendek.",
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
                                console.log(response.url_key);
                                $("#default_short_url_id").val(response.id);
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
    <script>
        var countData = {{ $countURL }};
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / 15) * 100;
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
        var progressBarWidth = (countData / {{ $micrositeStatus }}) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);
    </script>
    <script>
        var countURLValue = {{ $countURL }};

        // Calculate the percentage
        var percentage = (countURLValue / {{ $urlStatus }}) * 100;

        var progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = percentage + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('.text-muted.mb-0 b');
        progressText.textContent = countURLValue + ' dari {{ $urlStatus }}';
    </script>
    <script>
        var countURLValue = {{ $countMicrosite }};

        var progressBar = document.querySelector('#total-microsite');
        progressBar.style.width = ((countURLValue / {{ $micrositeStatus }}) * 100) + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('#microsite-total');
        progressText.textContent = countURLValue + ' dari {{ $micrositeStatus }}';
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
    <script>
        function closeEdit() {
            var editCollapse = document.getElementById('edit');
            $(editCollapse).collapse('hide');
        }

        $(document).ready(function() {
            $('#addAmount').on('hidden.bs.modal', function(e) {
                var editCollapse = document.getElementById('edit');
                $(editCollapse).collapse('hide');
            });
        });
    </script>
@endsection
