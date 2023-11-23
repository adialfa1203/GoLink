@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('style')
    <style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 10px 10px 0 0;
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

        .p1 {
            text-align: left;
            margin-top: 0;
            margin-bottom: 1rem;
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
                        <div class="card card-animate" style="border-radius: 10px 10px;">
                            <div class="card-body" style="position: relative; background-color:#F0F0F0;">
                                <div class="card-body " style="color: #0E2954; font-size: 16px; font-weight: bold; ">
                                    @if (strtolower(trim($subs->tipe)) === 'silver')
                                        <span class="text-center">Silver</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                        <span class="text-center">Gold</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                        <span class="text-center">Platinum</span>
                                    @else
                                        <span class="text-center">Data Tidak Valid</span>
                                    @endif
                                </div>
                            </div>


                            <div class="card-body text-white"
                                style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 10px 10px;">
                                <img class="mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" width="260"
                                    height="190" style="display: block; margin: 0 auto; object-fit: cover;"
                                    alt="Card image cap">
                                <br>
                                <div class="text-center">
                                    <h2 class="mb-2" style="color: #ffffff;">
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

                                    </h2>

                                    @if (strtolower(trim($subs->description)))
                                        <h6 style="color: #ffffff; font-size: 13px;">Paket dasar untuk meningkatkan</h6>
                                        <h6 style="color: #ffffff; font-size: 13px;">pengalaman pengguna</h6>
                                    @endif
                                </div>
                                <div data-simplebar data-simplebar-auto-hide="false" style="height: 300px;" class="px-3">
                                    <div class="flex-grow-1 ms-2 text-white text-center"
                                        style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        {{ strip_tags($subs->description) }}
                                    </div>
                                    @if (strtolower(trim($subs->tipe)) === 'silver')
                                        <div class="d-flex mt-4">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1">Menyingkat tautan batas sebanyak 25×/bulan</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Membuat Microsite sebanyak 5×/bulan</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <a @if (Auth::user()->subscribe == 'silver' || Auth::user()->subscribe == 'free') href="{{ route('subscribe.now', ['id' => $subs->id]) }}" @elseif (Auth::user()->subscribe != 'silver') onclick="showAlert('silver')" @endif
                                                id="subscribeBtn{{ $subs->id }}" class="btn custom col-12"
                                                style="margin-top: 12%;">Berlangganan
                                                Sekarang
                                            </a>
                                        </div>
                                    @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                        <div class="d-flex mt-4">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Membuat Microsite batas sebanyak 35×/bulan</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Membuat Microsite sebanyak 10×/bulan</p>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="" type="button"
                                        class="btn custom col-12" style="margin-top:155px;">Segera Hadir...</a>
                                    </div> --}}
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <a @if (Auth::user()->subscribe == 'gold' || Auth::user()->subscribe == 'silver' || Auth::user()->subscribe == 'free') href="{{ route('subscribe.now', ['id' => $subs->id]) }}" @elseif (Auth::user()->subscribe != 'gold') onclick="showAlert('gold')" @endif
                                                id="subscribeBtn{{ $subs->id }}" class="btn custom col-12"
                                                style="margin-top: 12%;">Berlangganan
                                                Sekarang
                                            </a>
                                        </div>
                                    @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                        <div class="d-flex mt-4">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Menyingkat tautan tanpa batas</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Membuat Microsite tanpa batas</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Menggunakan semua tema tanpa terkunci</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Memantau tautan dengan terperinci </p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-1 align-self-start" style="color: #fff">
                                                <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                            </div>
                                            <div class="col-11 text-white">
                                                <p class="p1"> Memproteksi tautan dengan kata sandi</p>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12 col-sm-12 mt-5">
                                    <a href="" type="button"
                                    class="btn custom col-12" style="margin-top: 65px;">Segera Hadir...</a>
                                </div> --}}
                                        <div class="col-md-12 col-sm-12 mt-12 mb-3 ">
                                            <a @if (Auth::user()->subscribe == 'platinum' ||
                                                    Auth::user()->subscribe == 'gold' ||
                                                    Auth::user()->subscribe == 'silver' ||
                                                    Auth::user()->subscribe == 'free') href="{{ route('subscribe.now', ['id' => $subs->id]) }}" @elseif (Auth::user()->subscribe != 'platinum') onclick="showAlert('platinum')" @endif
                                                id="subscribeBtn{{ $subs->id }}" class="btn custom col-12"
                                                style="margin-top: 12%;">Berlangganan
                                                Sekarang
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function showAlert(tipe) {
            Swal.fire({
                icon: 'info',
                title: 'Peringatan!',
                text: "Tidak dapat membeli paket " + tipe + " karena langganan saat ini {{ Auth::user()->subscribe }}. Beli langganan lebih tinggi atau tunggu masa berakhir."
            })
        }
    </script>
@endsection
