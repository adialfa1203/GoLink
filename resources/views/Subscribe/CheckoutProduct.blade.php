@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!--- Content --->
            <div class="col-sm-6 col-xl-3">
                <div class="card card-animate" style="border-radius: 20px 20px 0 0;">
                    <div class="card-body">
                        <h4 class="card-title mb-2 text-center">{{ $subscribe->tipe }}</h4>
                    </div>
                    <div class="card-body text-white"
                        style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;">
                        <h5 class="card-title text-center mb-2">
                            Rp.{{ number_format($subscribe->price, 0, ',', '.') }}
                            @if (strtolower(trim($subscribe->period)) === 'forever')
                                /Selamanya
                            @elseif (strtolower(trim($subscribe->period)) === '1_week')
                                /Minggu
                            @elseif (strtolower(trim($subscribe->period)) === '1_month')
                                /Bulan
                            @else
                                /Tahun
                            @endif
                        </h5>
                        <div class="d-flex">
                            <div class="flex-grow-1 ms-2 text-white text-center">
                                {{ strip_tags($subscribe->description) }}
                            </div>
                        </div>
                        @if (strtolower(trim($subscribe->tipe)) === 'gratis')
                            <div class="d-flex mt-5">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Menyingkat tautan batas sebanyak 35/bulan
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 text-white">
                                    Membuat Microsite sebanyak 3/bulan
                                </div>
                            </div>
                        @elseif (strtolower(trim($subscribe->tipe)) === 'dasar')
                            <div class="d-flex">
                                <div class="flex-grow-1 ms-2 text-white text-center">
                                    Paket dasar untuk meningkatkan pengalaman pengguna
                                </div>
                            </div>
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
                        @elseif (strtolower(trim($subscribe->tipe)) === 'menengah')
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
                            <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('checkout', ['id' => $subscribe->id]) }}" type="button"
                                    class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                    Sekarang</a>
                            </div>
                        @elseif (strtolower(trim($subscribe->tipe)) === 'premium')
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
