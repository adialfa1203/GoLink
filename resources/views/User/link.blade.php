@extends('layout.user.app')

@section('title', 'Tautan')
@section('style')
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
            border: 2px solid #7B7B7B;
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
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-sm-row">
                <div class="col-12 col-sm-4">
                    <h5 class="mb-2">Tautan yang Dihasilkan Terbaru</h5>
                    <p id="clickCount" hidden>0 klik</p>
                </div>
                <div class="col-12 col-sm-8 mb-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-sm-end">
                        <div class="search-box mb-2 mb-sm-0">
                            <input type="text" class="form-control search" placeholder="Cari...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills animation-nav nav-justified gap-2 mb-3" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" data-bs-toggle="tab" href="#animation-home" role="tab">
                                    Tautan Aktif
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" data-bs-toggle="tab" href="#animation-settings" role="tab">
                                    Riwayat
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="animation-home" role="tabpanel">
                                <div class="row">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @if ($urlshort->isEmpty())
                                        <div class="card d-flex flex-column align-items-center">
                                            <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.jpg') }}"
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
                                                    <div class="card"
                                                        style="border: 1px solid var(--tb-border-color-translucent); padding: 0px;"
                                                        id="card{{ $row->id }}">
                                                        <div class="card-body">
                                                            <h6 class="col-lg-3 col-md-4 col-sm-12">{{ $row->title }}</h6>
                                                            <div
                                                                class="col-lg-12 col-md-12 col-sm-9 d-flex flex-row justify-content-end">
                                                                <button type="button" id="button-email"
                                                                    class="btn btn-primary me-3 btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#bagikan{{ $i }}"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fa-solid fa-share-nodes"></i>
                                                                    &nbsp;Bagikan</button>

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
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#tombol-modal-{{ $row->id }}"
                                                                    data-id="{{ $row->id }}">
                                                                    <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                                        title="Kode QR"><i
                                                                            class="fa-solid fa-qrcode"></i></span>
                                                                </button>

                                                                <button type="button" class="btn btn-light me-3 btn-sm edit-link"
                                                                data-bs-toggle="modal" data-bs-target="#zoomInModal"
                                                                    data-link="{{ $row->url_key }}">
                                                                    <span><i class="fa-solid fa-pen-to-square"></i>&nbsp;Kustom</span>
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
                                                                    class="col-12 col-sm-7 d-flex flex-row justify-content-end mt-2 mt-sm-0">
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
                                                                                <a href="{{ url('user/subscribe-product-user') }}"
                                                                                    style="color: red;"> Mulai
                                                                                    Berlangganan? </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                        </div>
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
                                                            <div id="zoomInModal" class="modal fade zoomIn" tabindex="-1"
                                                                aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="zoomInModalLabel"><i
                                                                                    class="fa-solid fa-pen-to-square"></i>&nbsp;Kustom Tautan
                                                                            </h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body d-flex" style="background-color: #D9D9D9;">
                                                                                <p><i class="fa-solid fa-pen-to-square"></i></p>
                                                                                &nbsp;
                                                                                <p>Kustom tautan adalah fitur yang memungkinkan
                                                                                    pengguna untuk membuat tautan pendek yang disesuaikan dengan
                                                                                    keinginan mereka.
                                                                                    Pengguna dapat mengganti atau menentukan bagian akhir dari tautan
                                                                                    pendek
                                                                                    untuk mencerminkan kata kunci, nama merek, atau informasi yang
                                                                                    relevan dengan tautan tersebut.</p>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="new_url_key">Kustom Nama</label>
                                                                                <input type="text" class="form-control" name="new_url_key"
                                                                                    id="new_url_key" placeholder="Kustom nama">
                                                                            </div>
                                                                            <div class="col-lg-12 mb-3">
                                                                                <label for="new_url_key"></label>
                                                                                <input type="hidden" class="form-control" name="custom_name"
                                                                                    id="new_url_key" placeholder="Kustom nama">
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
                                                                        <div class="modal-footer">
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
                                                        <div class="collapse" id="collapseExample{{ $row->id }}">
                                                            <div class="card-footer">
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
                                                    {{ $urlshort->links('pagination::bootstrap-5') }}
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
                                                src="{{ asset('images/Empty.jpg') }}" alt="Gambar">
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
                                                        style="border: 1px solid var(--tb-border-color-translucent); padding: 0px;"
                                                        id="card{{ $url->id }}">
                                                        <div class="card-body">
                                                            <h6 class="col-lg-3 col-md-4 col-sm-12">{{ $url->title }}
                                                            </h6>
                                                            <div
                                                                class="col-lg-12 col-md-12 col-sm-9 d-flex flex-url justify-content-end">
                                                                <button disabled type="button" id="button-email"
                                                                    class="btn btn-primary me-3 btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#bagikan{{ $i }}"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fa-solid fa-share-nodes"></i>
                                                                    &nbsp;Bagikan</button>

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
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#tombol-modal-{{ $url->id }}"
                                                                    data-id="{{ $url->id }}">
                                                                    <span data-bs-toggle="tooltip"
                                                                        data-bs-placement="left" title="Kode QR"><i
                                                                            class="fa-solid fa-qrcode"></i></span>
                                                                </button>

                                                                <button disabled type="button"
                                                                    class="btn btn-light me-3 btn-sm edit-link"
                                                                    data-bs-toggle="modal" data-bs-target="#zoomInModal"
                                                                    data-link="{{ $url->url_key }}">
                                                                    <span><i
                                                                            class="fa-solid fa-pen-to-square"></i>&nbsp;Kustom</span>
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
                                                hingga <span class="fw-semibold">{{ $history->lastItem() }}</span>
                                                dari total <span class="fw-semibold">{{ $history->total() }}</span> Hasil
                                            </div>
                                        </div>
                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <div
                                                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                <div class="page-item">
                                                    {{ $history->links('pagination::bootstrap-5') }}
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
                    data: {!! json_encode($result['series'][$i]) !!},
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
                    text: 'Link dikunjungi perbulan',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: {!! json_encode($result['labels']) !!},
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
