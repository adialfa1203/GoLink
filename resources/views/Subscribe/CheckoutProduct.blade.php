@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('style')
<style>
    .page-content {
        background: #fff;
    }

    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        .pay {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1rem;
        }
        .bod {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }
    }

    @media (min-width: 601px) and (max-width: 1024px) {

        /* Atur gaya CSS khusus untuk perangkat tablet di sini */
        .pay {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
    }

    @media (max-width: 768px) {

        /* Atur gaya CSS khusus untuk perangkat tablet di sini */
        .pay {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }
</style>
@endsection
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!--- Content1 --->
        <div class="row bod">
            <div class="mb-4" style="grid-column: span 3 / span 3;">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Pilih Metode Pembayaran</h4>
                        </div>
                    </div>
                </div>
                <div class="card" style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                    <div class="card-body">
                        <h4 class="card-title" style="color:#0E2954;">Pilih metode pembayaran anda untuk melakukan</h4>
                        <h4 class="card-title mb-4" style="color:#0E2954;">Transaksi</h4>
                        <h4 class="card-title mb-3 mt-5" style="color:#0E2954;">E-Wallet</h4>
                        <div class="pay">
                            @foreach ($channels as $channel)
                            @if ($channel->group == 'E-Wallet')
                            <div class="card-animate" style="border-radius: 30px;height: 10%;padding: 6px;">
                                <form action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <!-- <input type="hidden" name="subscribe_id" value="{{ $subscribe->id }}">
                                            <input type="hidden" name="method" value="{{ $channel->code }}">
                                            <button type="submit" class="card border-0">
                                                <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}"
                                                    style="width: 100%;" alt="Card image cap">
                                            </button>-->

                                    <input type="hidden" name="subscribe_id" value="{{ $subscribe->id }}">
                                    <input type="hidden" name="method" value="{{ $channel->code }}">
                                    <button type="submit" class="card " style="background: #F0F0F0; border: 1.5px solid #0E2954;border-radius: 9px;height: 100%;padding: 6px;margin: 0;">
                                        <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}" style="object-fit: contain; width: 100px;height: 30px;" alt="Card image cap">
                                    </button>
                                </form>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <h4 class="card-title mb-3 mt-3" style="color:#0E2954;">E-Wallet</h4>
                        <div class="pay">
                            @foreach ($channels as $channel)
                            @if ($channel->group == 'Virtual Account')
                            <div class="card-animate" style="border-radius: 30px;height: 10%;padding: 6px;">
                                <form action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <!-- <input type="hidden" name="subscribe_id" value="{{ $subscribe->id }}">
                                            <input type="hidden" name="method" value="{{ $channel->code }}">
                                            <button type="submit" class="card border-0">
                                                <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}"
                                                    style="width: 100%;" alt="Card image cap">
                                            </button>-->

                                    <input type="hidden" name="subscribe_id" value="{{ $subscribe->id }}">
                                    <input type="hidden" name="method" value="{{ $channel->code }}">
                                    <button type="submit" class="card " style="background: #F0F0F0;border: 1.5px solid #0E2954;border-radius: 9px;height: 100%;padding: 6px; margin: 0;">
                                        <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}" style="object-fit: contain; width: 100px;height: 30px;" alt="Card image cap">
                                    </button>
                                </form>
                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <!--- Content2 --->
            <div class="mb-4">
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
                                <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 65px;">Berlangganan
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
        </div>
    </div>

</div>
</div>
@endsection
