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
            scrollbar-width: thin;
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

        /* Coming soon btn */
        .custom:hover {
            background-color: transparent;
            color: #FFB000;
            border: 2px solid #FFB000;
        }

        .btn.custom {
            display: block;
            margin: 0 auto;
        }

        .bagcard {
            border-radius: 20px;
            background: linear-gradient(0deg, #0E2954, #104898);
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .warna {
            color: #104898 !important;
        }

        .card {
            background: linear-gradient(0deg, #0E2954, #104898);
            color: #ffffff;
            padding: 20px;
            border-radius: 10px 10px 10px 10px;
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
                        <div class="card mb-20" style="background-color: #104898; height: 630px;">
                            <div class="text-center">
                                <img class="mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" style="width: 80%; height: 45%; object-fit: cover;"
                                    alt="Card image cap">
                                <h2 class="mb-3 " style="color: #ffffff; margin-top: 6%;">
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
                                <h6 style="color: #ffffff; font-size: 13px;">{{ strip_tags($subs->description) }}</h6>
                            </div>
                            <!-- Below this section, you can include the "nomor" section. -->


                            <div class="container text-center" style="margin-top: 1%;">
                                {{-- <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                            {{ strip_tags($subs->description) }}
                                        </div> --}}

                                @if (strtolower(trim($subs->tipe)) === 'silver')
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Menyingkat tautan batas sebanyak 25x/bulan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1"> Membuat Microsite sebanyak 5x/bulan</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-sm-12 mt-5">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top: 30%;">Berlangganan
                                            Sekarang</a>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 mt-5">
                                        <a type="button" class="btn custom col-12" style="margin-top: 50%;">Segera
                                            Hadir...</a>
                                    </div>
                                @elseif (strtolower(trim($subs->tipe)) === 'gold')
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
                                            <p class="p1"> Membuat Microsite sebanyak 10x/bulan</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-sm-12 mt-2">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12" style="margin-top:43%;">Berlangganan
                                            Sekarang</a>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 mt-1">
                                        <a type="button" class="btn custom col-12" style="margin-top: 50%;">Segera
                                            Hadir...</a>
                                    </div>
                                @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="col-11">
                                            <p class="p1">Menyingkat Tautan tanpa batas</p>
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

                                    {{-- <div class="col-md-12 col-sm-12">
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button"
                                            class="btn custom col-12">Berlangganan
                                            Sekarang</a>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 mt-1">
                                        <a type="button" class="btn custom col-12"
                                            style="margin-top: 0%; margin-buttom: 50%;">Segera Hadir...</a>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="col-12 col-sm-12 mt-5">
                                    <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12">Berlangganan Sekarang</a>
                                </div> --}}

                        </div>
                    </div>
                @endforeach
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
