@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('style')
<style>
    .page-content {
        background: #fff;
    }

    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        .but {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .buttons {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
            margin-left: 77%;
            margin-right: 3%;
        }
    }

    @media (min-width: 601px) and (max-width: 1024px) {

        /* Atur gaya CSS khusus untuk perangkat tablet di sini */
        .but {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        .buttons{
            margin-left: 65%;
        }
    }

    @media (max-width: 768px) {

        /* Atur gaya CSS khusus untuk perangkat tablet di sini */
        .but {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .buttons {
            margin-left: 40%;
        }
    }

    .rata {
        float: left;
    }

    .rata1 {
        float: right;
    }
    .keluar{
        background-color: transparent;
        border: 2px solid #FF2323;
        color: #FF2323;
        padding: 6px 10px; /* Mengatur jarak teks dari tepi tombol yang lebih kecil */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px; /* Mengatur ukuran teks yang lebih kecil */
        cursor: pointer;
        height: 100%;
    }
    .keluar:hover {
        background-color: #FF2323;
        color: #fff;
    }
</style>
@endsection
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!--- Content1 --->
        <div class="row">
            <div class="mb-4 col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <center>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-0" style="color:#0E2954;">Pilih metode pembayaran anda untuk melakukan</h4>
                                </div>
                            </div>
                        </div>
                        @foreach ($channels as $channel)
                        <div class="card card-animate" style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                            <div class="card-body">
                                <form action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <!-- <input type="hidden" name="subscribe_id" value="{{ $subscribe->id }}">
                                            <input type="hidden" name="method" value="{{ $channel->code }}">
                                            <button type="submit" class="card border-0">
                                                <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}"
                                                    style="width: 100%;" alt="Card image cap">
                                            </button>-->
                                    <div class="but">
                                        <div class="">
                                            <input type="hidden" name="subscribe_id" value="{{ $subscribe->id }}">
                                            <input type="hidden" name="method" value="{{ $channel->code }}">
                                            <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}" style="object-fit: contain; width: 100px;height: 30px;margin-top: 1%;margin-right: 60%;" alt="Card image cap">
                                        </div>
                                        <div class="buttons">
                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#bayar{{$channel->code}}" style="color: #fff;background-color: #0E2954; height: 100%;padding: 6px;">Pilih</button>
                                        </div>
                                    </div>
                                    <div id="bayar{{$channel->code}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <hr style="margin-top: 0;">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="rata">Harga Paket</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="card-title text-center rata1">
                                                                Rp.{{ number_format($subscribe->price, 0, ',', '.') }}
                                                                @if (strtolower(trim($subscribe->period)) === 'forever')
                                                                @elseif (strtolower(trim($subscribe->period)) === '1_week')
                                                                @elseif (strtolower(trim($subscribe->period)) === '1_month')
                                                                @else
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="rata">Pajak Bank</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="rata1">Rp.{{$channel->total_fee->flat}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="rata">Total</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="rata1">Rp.{{ $channel->total_fee->flat + $subscribe->price }}</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-light btn-md keluar col-12" data-bs-dismiss="modal" aria-label="close" style="color: #FF2323;">Kembali</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-success btn-md col-12">Bayar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </center>
            </div>

            <!--- Content2 --->
            <div class="mb-4 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <center>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Langganan Pembelian</h4>
                                </div>
                                <div class="col-12">
                                    <div class="card card-animate" style="border-radius: 20px;background: #F0F0F0; margin: 0;">
                                        <div class="card-body">
                                            @if (strtolower(trim($subscribe->tipe)) === 'free')
                                            <h4 class="card-title mb-2 text-center">Gratis</h4>
                                            @elseif (strtolower(trim($subscribe->tipe)) === 'silver')
                                            <h4 class="card-title mb-2 text-center">Dasar</h4>
                                            @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                            <h4 class="card-title mb-2 text-center">Menengah</h4>
                                            @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                            <h4 class="card-title mb-2 text-center">Premium</h4>
                                            @else
                                            <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
                                            @endif
                                        </div>
                                        <div class="card-body text-white" style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;height: auto;display: inline-block; min-height: 200px;">
                                            <div class="row">
                                                <h5 class="card-title text-center mt-3">
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
                                            </div>
                                            <div data-simplebar data-simplebar-auto-hide="false" style="height: 300px;" class="px-3">
                                                <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                                    {{ strip_tags($subscribe->description) }}
                                                </div>
                                                @if (strtolower(trim($subscribe->tipe)) === 'free')
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
                                                <!-- <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan Sekarang</a>
                            </div> -->
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'silver')
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
                                                <!-- <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                    Sekarang</a>
                            </div> -->
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
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
                                                <!-- <div class="col-md-12 col-sm-12 mt-5">
                                <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                    Sekarang</a>
                            </div> -->
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
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
                                                <!-- <div class="col-md-12 col-sm-12">
                                <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top: 65px;">Berlangganan
                                    Sekarang</a>
                            </div> -->
                                                @endif
                                            </div>
                                            <!-- <div class="col-md-12 col-sm-12 mt-3">
                                    <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12">Berlangganan
                                        Sekarang</a>
                                </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
