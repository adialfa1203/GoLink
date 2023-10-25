@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('style')
    <style>
        .page-content {
            background: #fff;
        }

        .scrol {
            overflow-y: scroll;
            height: 300px;
            scrollbar-color: #000 #00FF00;
            /* Track color Thumb color */
            scrollbar-width: thin;
            /* Auto, thin, thick */
        }

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
    <style>
        .btn.custom {
            display: block;
            margin: 0 auto;
        }
    </style>

<style>
    .bagcard {
       border-radius: 20px;
       background:linear-gradient(0deg, #0E2954, #104898);
       box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
   }
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
            /* text-align: center; */
        }

        .card1 {
            background: linear-gradient(to bottom, #ffffff, #ffffff);
            font-weight: bold;
            color: #000;
            /* Mengatur warna teks menjadi hitam */
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
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 col-12 mb-3 mb-md-0">
                                <img class="card-img-top img-fluid" src="{{ asset('tangan.png') }}" style="width: 100%;"
                                    alt="Card image cap">
                            </div>
                            <div class="col-lg-7 col-md-6 col-12">
                                <h1 class="card-title long-text mt-3" style="color: #ffff; font-size: 30px;">Hi
                                    {!! Auth::user()->name !!}!</h1>
                                <p class="card-text long-text" style="color: #ffff;">Jangan lewatkan kesempatan untuk
                                    mengambil yang terbaik!
                                    Berlangganan bersama kami untuk manfaatkan semua fitur canggih kami</p>
                            </div>
                        </div>
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
                {{-- @foreach ($subscribe as $subs)
            <div class="col-sm-6 col-xl-3 mt-4">
                <div class="card card-animate" style="border-radius: 20px;background: #FFF; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25); margin: 0;">
                    <div class="card-body">
                        @if (strtolower(trim($subs->tipe)) === 'free')
                        <h4 class="card-title mb-2 text-center">Gratis</h4>
                        @elseif (strtolower(trim($subs->tipe)) === 'silver')
                        <h4 class="card-title mb-2 text-center">Silver</h4>
                        @elseif (strtolower(trim($subs->tipe)) === 'gold')
                        <h4 class="card-title mb-2 text-center">Gold</h4>
                        @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                        <h4 class="card-title mb-2 text-center">Platinum</h4>
                        @else
                        <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
                        @endif
                    </div>
                    <div class="card-body text-white" style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;height: auto;display: inline-block; min-height: 200px;">
                        <div class="row">
                            <h5 class="card-title text-center mt-3">
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
                        </div>
                        <div data-simplebar data-simplebar-auto-hide="false" style="height: 300px;" class="px-3">
                            <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                {{ strip_tags($subs->description) }}
                            </div>
                            @if (strtolower(trim($subs->tipe)) === 'free')
                            <div class="d-flex mt-5">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Menyingkat tautan batas sebanyak 35/bulan
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Membuat Microsite sebanyak 3/bulan
                                </div>
                            </div>
                            <!-- <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan Sekarang</a>
                            </div> -->
                            @elseif (strtolower(trim($subs->tipe)) === 'silver')
                            <div class="d-flex mt-5">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Menyingkat tautan batas sebanyak 50x/bulan
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Membuat Microsite sebanyak 10x/bulan
                                </div>
                            </div>
                            <!-- <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                    Sekarang</a>
                            </div> -->
                            @elseif (strtolower(trim($subs->tipe)) === 'gold')
                            <div class="d-flex mt-5">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Menyingkat tautan batas sebanyak 100x/bulan
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Membuat Microsite sebanyak 20x/bulan
                                </div>
                            </div>
                            <!-- <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                    Sekarang</a>
                            </div> -->
                            @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                            <div class="d-flex mt-5">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Menyingkat tautan tanpa batas
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Membuat Microsite tanpa batas
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Menggunakan semua tema tanpa terkunci
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Memantau tautan dengan terperinci
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Memproteksi tautan dengan kata sandi
                                </div>
                            </div>
                            <!-- <div class="col-md-12 col-sm-12">
                                <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 65px;">Berlangganan
                                    Sekarang</a>
                            </div> -->
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12 mt-3">
                                <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" >Berlangganan
                                    Sekarang</a>
                            </div>
                    </div>
                </div>
            </div>
            @endforeach --}}

                @foreach ($subscribe as $subs)
                    <div class="col-md-4">
                        <div class="card1">
                            <h5 style="font-weight: bold; color: #0E2954;">
                                @if (strtolower(trim($subs->tipe)) === 'silver')
                                    Silver
                                @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                    Gold
                                @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                    Platinum
                                @else
                                    Data Tidak Valid
                                @endif
                            </h5>
                        </div>
                        <div class="card mb-3" style="background-color: #104898; height: 620px;">
                            <div class="text-center">
                                <img class="mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" width="260"
                                height="160" style="display: block; margin: 0 auto; object-fit: cover;"
                                alt="Card image cap">
                                <h5 class="card-title text-center mt-3">
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
                                <h6 style="color: #ffffff; font-size: 13px;">{{ strip_tags($subs->description) }}</h6>
                                {{-- <h6 style="color: #ffffff; font-size: 13px;">pengalaman pengguna</h6> --}}
                            </div>

                            <div class="container text-center" style="margin-top: 40px;">
                                {{-- <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                            {{ strip_tags($subs->description) }}
                                        </div> --}}
                                @if (strtolower(trim($subs->tipe)) === 'free')
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Menyingkat tautan batas sebanyak 35x/bulan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Membuat Microsite sebanyak 3x/bulan</p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12 col-sm-12 mt-5">
                                            <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan Sekarang</a>
                                        </div> -->
                                @elseif (strtolower(trim($subs->tipe)) === 'silver')
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Menyingkat tautan batas sebanyak 50x/bulan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Membuat Microsite sebanyak 10x/bulan</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top: 55%;">Berlangganan
                                            Sekarang</a>
                                    </div>
                                @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Menyingkat tautan batas sebanyak 100x/bulan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Membuat Microsite sebanyak 20x/bulan</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top:55%;">Berlangganan
                                            Sekarang</a>
                                    </div>
                                @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1">Membuat Tautan tanpa batas</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1">Membuat Microsite tanpa batas</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1">Menggunakan semua tema tanpa terkunci</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1">memantau tautan dengan terperinci</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1">Memproteksi tautan dengan kata sandi</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top:2%">Berlangganan
                                            Sekarang</a>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="col-12 col-sm-12 mt-5">
                                    <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12">Berlangganan Sekarang</a>
                                </div> --}}

                        </div>
                    </div>
                @endforeach



                <!-- @foreach ($subscribe as $subs)
    <div class="col-sm-6 col-xl-3">
                            <div class="card card-animate" style="border-radius: 20px 20px 0 0;">
                                <div class="card-body">
                                    @if (strtolower(trim($subs->tipe)) === 'free')
    <h4 class="card-title mb-2 text-center">Gratis</h4>
@elseif (strtolower(trim($subs->tipe)) === 'silver')
    <h4 class="card-title mb-2 text-center">Dasar</h4>
@elseif (strtolower(trim($subs->tipe)) === 'gold')
    <h4 class="card-title mb-2 text-center">Menengah</h4>
@elseif (strtolower(trim($subs->tipe)) === 'platinum')
    <h4 class="card-title mb-2 text-center">Premium</h4>
@else
    <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
    @endif
                                </div>
                                <div class="card-body text-white"
                                    style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;height: 453px;">
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
                                        <div class="flex-grow-1 ms-2 text-white text-center">
                                            {{ strip_tags($subs->description) }}
                                        </div>
                                    </div>
                                    @if (strtolower(trim($subs->tipe)) === 'free')
    <div class="d-flex mt-5">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Menyingkat tautan batas sebanyak 35/bulan
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Membuat Microsite sebanyak 3/bulan
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                                class="btn custom col-12" style="margin-top: 180px;">Berlangganan Sekarang</a>
                                        </div>
@elseif (strtolower(trim($subs->tipe)) === 'silver')
    <div class="d-flex mt-5">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Menyingkat tautan batas sebanyak 50×/bulan
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Membuat Microsite sebanyak 10×/bulan
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                                class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                                Sekarang</a>
                                        </div>
@elseif (strtolower(trim($subs->tipe)) === 'gold')
    <div class="d-flex mt-5">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Menyingkat tautan batas sebanyak 100×/bulan
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Membuat Microsite sebanyak 20×/bulan
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                                class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                                Sekarang</a>
                                        </div>
@elseif (strtolower(trim($subs->tipe)) === 'platinum')
    <div class="d-flex mt-5">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Menyingkat tautan tanpa batas
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Membuat Microsite tanpa batas
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Menggunakan semua tema tanpa terkunci
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Memantau tautan dengan terperinci
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2 text-white">
                                                Memproteksi tautan dengan kata sandi
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                                class="btn custom col-12" style="margin-top: 65px;">Berlangganan
                                                Sekarang</a>
                                        </div>
    @endif
                                </div>
                            </div>
                        </div>
    @endforeach -->
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
