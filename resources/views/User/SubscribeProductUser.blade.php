@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('style')
    <style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .custom {
            align-self: flex-end !important;
            border-radius: 20px;
            border: 2px solid #FFB000;
            background-color: transparent;
            color: #FFB000;
            padding: 6px 12px;
            font-size: 16px;
            cursor: pointer;
        }

        .custom:hover {
            background-color: #FFB000;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="col-sm-12 col-xl-12x`">
                <div class="card">
                    <div class="card-body"
                        style="background-image: linear-gradient(to bottom right, #104898, #104898); border-radius: 15px;">
                        <h4 class="card-title mb-2 mt-3 text-white">Hi {!! Auth::user()->name !!}!</h4>
                        <h6 class="card-subtitle font-14 text-white mb-3 mt-1">Silakan pilih paket berlangganan dan
                            nikmati fitur yang
                            kamu dapatkan </h6>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <div class="text-center mb-5">
                        <h4 class="fw-semibold fs-4xl">Berlangganan Yang Tersedia</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($subscribe as $subs)
                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-animate" style="border-radius: 20px 20px 0 0;">
                            <div class="card-body">
                                @if (strtolower(trim($subs->tipe)) === 'silver')
                                    <h4 class="card-title mb-2 text-center">Silver</h4>
                                @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                    <h4 class="card-title mb-2 text-center">Gold</h4>
                                @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                    <h4 class="card-title mb-2 text-center">Platinum</h4>
                                @else
                                    <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
                                @endif
                            </div>
                            <div class="card-body text-white"
                                style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;">
                                <center>
                                    <img class="mt-3 mb-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" style="width: 80%; height: 100px; object-fit: cover;" alt="Card image cap">
                                </center>
                                <h5 class="card-title text-center mb-2">
                                    Rp.{{ number_format($subs->price, 0, ',', '.') }}
                                    @if (strtolower(trim($subs->period)) === 'forever')
                                        /Selamanya
                                    @elseif (strtolower(trim($subs->period)) === '1_week')
                                        /Minggu
                                    @elseif (strtolower(trim($subs->period)) === '1_month')
                                        /Bulan
                                    @else
                                        /Tahun
                                    @endif
                                </h5>
                                <div class="d-flex">
                                    <div class="flex-grow-1 ms-2 text-white text-center" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        {{ strip_tags($subs->description) }}
                                    </div>
                                </div>
                                @if (strtolower(trim($subs->tipe)) === 'silver')
                                    <div class="d-flex mt-5">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Menyingkat tautan batas sebanyak 50×/bulan
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Membuat Microsite sebanyak 10×/bulan
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="#" type="button"
                                            class="btn custom col-12" style="margin-top:155px;">Segera Hadir...</a>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top: 30%;">Berlangganan
                                            Sekarang</a>
                                    </div>              
                                @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                    <div class="d-flex mt-5">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Menyingkat tautan batas sebanyak 100×/bulan
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Membuat Microsite sebanyak 20×/bulan
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="#" type="button"
                                            class="btn custom col-12" style="margin-top:155px;">Segera Hadir...</a>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top: 30%;">Berlangganan
                                            Sekarang</a>
                                    </div>
                                @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                    <div class="d-flex mt-5">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Menyingkat tautan tanpa batas
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Membuat Microsite tanpa batas
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Menggunakan semua tema tanpa terkunci
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Memantau tautan dengan terperinci
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-white">
                                            Memproteksi tautan dengan kata sandi
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="#" type="button"
                                            class="btn custom col-12" style="margin-top:155px;">Segera Hadir...</a>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top: 30%;">Berlangganan
                                            Sekarang</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- nouisliderribute js -->
    <script src="{{ asset('assets/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>

    <!-- ecommerce-product-grid-list js -->
    <script src="{{ asset('assets/js/pages/ecommerce-product-grid-list.init.js') }}"></script>
@endsection
