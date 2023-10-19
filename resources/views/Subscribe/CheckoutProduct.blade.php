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
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Pilih Metode Pembayaran</h4>
                        </div>
                    </div>
                </div>
                <div class="card" style="border-radius: 20px;background: #F0F0F0;">
                    <div class="card-body">
                        <h4 class="card-title" style="color:#0E2954;">Pilih metode pembayaran anda untuk melakukan</h4>
                        <h4 class="card-title mb-4" style="color:#0E2954;">Transaksi</h4>
                        <h4 class="card-title mb-3 mt-5" style="color:#0E2954;">E-Wallet</h4>
                        <div class="pay">
                            @foreach ($channels as $channel)
                            @if ($channel->group == 'E-Wallet')
                            <div class="" style="border-radius: 30px;height: 10%;padding: 6px;">
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
                            <div class="" style="border-radius: 30px;height: 10%;padding: 6px;">
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
            <div class="col-lg-6 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Langganan Pembelian</h4>
                        </div>
                        <div class="col-12">
                            <div class="card card-animate" style="border-radius: 20px;background: #F0F0F0;">
                                <div class="card-body">
                                    <h4 class="card-title mb-4" style="color:#0E2954;">Detail Layanan
                                        @if (strtolower(trim($subscribe->tipe)) === 'free')
                                            Gratis
                                        @elseif (strtolower(trim($subscribe->tipe)) === 'silver')
                                            Dasar
                                        @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                            Menengah
                                        @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                            Premium
                                        @else
                                            Data Tidak Valid
                                        @endif Anda:
                                    </h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Lite
                                            (
                                                @if (strtolower(trim($subscribe->period)) === 'forever')
                                                    Selamanya
                                                @elseif (strtolower(trim($subscribe->period)) === '1_week')
                                                    Mingguan
                                                @elseif (strtolower(trim($subscribe->period)) === '1_month')
                                                    Bulanan
                                                @elseif (strtolower(trim($subscribe->period)) === '1_year')
                                                    Tahunan
                                                @else
                                                    Data Tidak Valid
                                                @endif
                                                ) :
                                            <span>@if (strtolower(trim($subscribe->tipe)) === 'free')
                                                Gratis
                                            @elseif (strtolower(trim($subscribe->tipe)) === 'silver')
                                                Dasar
                                            @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                                Menengah
                                            @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                                Premium
                                            @else
                                                Data Tidak Valid
                                            @endif</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Pajak
                                            (11%) :
                                            <span>Rp.{{ number_format($tax, 2, ',', '.') }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Biaya
                                            transaksi :
                                            <span>Rp.{{ number_format($subscribe->price, 2, ',', '.') }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"
                                            style="font-weight: bold;">Total Biaya :
                                            <span>Rp.{{ number_format($totalPrice, 2, ',', '.') }}</span>
                                        </li>
                                    </ul>
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