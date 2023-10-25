@extends('layout.user.app')
@section('title', 'Berlangganan')
@section('style')

    <style>
        /* Untuk layar kecil (misalnya, ponsel) */
        //card dan gambarnya
        @media (max-width: 576px) {
            .card-img-top {
                width: 50%;
            }

            .col-lg-7 {
                width: 50%;
            }

            .col-lg-3 {
                width: 100%;
                margin-top: 10px;
                /* Tambahkan margin jika diperlukan */
            }
        }

        //text
        @media (max-width: 576px) {
            .col-lg-7 {
                width: 100%;
                /* Kolom akan mengisi seluruh lebar layar ponsel */
            }
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
    .th th:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 0px;
    }

    .th th:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 0px;
    }
</style>

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    {{-- <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Berlangganan</h4>

                        <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>

                    </div> --}}
                </div>
            </div>
            <!-- end page title -->

            <div id="productList">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card  bagcard">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-3 col-12 mb-3 mb-md-0">
                                        <img class="card-img-top img-fluid" src="{{ asset('tangan.png') }}"
                                            style="width: 100%;" alt="Card image cap">
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-12">
                                        <h1 class="card-title long-text mt-3" style="color: #ffff; font-size: 30px;">Hi {!! Auth::user()->name !!}!</h1>
                                        <p class="card-text long-text" style="color: #ffff;">Jangan lewatkan kesempatan untuk mengambil yang terbaik!
                                            Berlangganan bersama kami untuk manfaatkan semua fitur canggih kami</p>
                                    </div>
                                    {{-- <div class="col-lg-3 col-md-3 col-12 text-center">
                                        <a href="{{ url('user/subscribe-product-user') }}" type="button"
                                            class="btn btn-outline-danger col-12 mt-3">Berlangganan Sekarang</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6" style="color: #0E2954">
                        <h5 class="card-title mb-0">Riwayat Transaksi Terakhir</h5>
                    </div>
                    <div class="col-6 mb-4 d-flex justify-content-end">
                        <a href="{{ url('user/subscribe-product-user') }}" type="button" class="btn btn-outline-danger justify-content-end">Berlangganan Sekarang</a>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-lg-12" >
                        <div class="card"  style="background-color:  #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered align-middle table-nowrap mb-0">
                                        <thead class="table-active th">
                                            <tr>
                                                <th class="" data-sort="category">Layanan</th>
                                                <th class="rounded-corner" data-sort="stock">Metode</th>
                                                <th class="" data-sort="price">Harga</th>
                                                <th class="" data-sort="products">Tanggal Bayar</th>
                                                <th class="" data-sort="price">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($data->isEmpty())
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="card d-flex flex-column align-items-center" style="background-color: #F0F0F0;">
                                                            <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.png') }}" alt="Gambar">
                                                            <div class="d-flex justify-content-center align-items-center mt-2 mb-4">
                                                                <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                                                <h5 class="mt-2">Maaf! Belum Ada Data Yang Ditemukan</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($data as $transaction)
                                                    <tr>
                                                        <td>
                                                            @if (strtolower(trim($transaction->subscribe->tipe)) === 'free')
                                                            Gratis
                                                            @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'silver')
                                                            Dasar
                                                            @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'gold')
                                                            Menengah
                                                            @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'platinum')
                                                            Premium
                                                            @else
                                                            Unknown
                                                            @endif
                                                        </td>
                                                        <td>{{ $transaction->payment_method }}</td>
                                                        <td>Rp.{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                                                        <td>{{ $transaction->updated_at }}</td>
                                                        <td>
                                                            @if ($transaction->status === 'PAID')
                                                                <span
                                                                    class="badge bg-success">{{ $transaction->status }}</span>
                                                            @elseif ($transaction->status === 'REFUND')
                                                                <span
                                                                    class="badge bg-primary">{{ $transaction->status }}</span>
                                                            @elseif ($transaction->status === 'EXPIRED')
                                                                <span
                                                                    class="badge bg-warning">{{ $transaction->status }}</span>
                                                            @elseif ($transaction->status === 'UNPAID')
                                                                <span
                                                                    class="badge bg-danger">{{ $transaction->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-secondary">{{ $transaction->status }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end card-->
                        <div class="pagination-wrap hstack justify-content-center gap-2 mb-3" >
                            <a class="page-item pagination-prev {{ $data->previousPageUrl() ? '' : 'disabled' }}"
                                href="{{ $data->previousPageUrl() ? $data->previousPageUrl() : '#' }}">
                                Sebelumnya
                            </a>
                            <ul class="pagination listjs-pagination mb-0">
                                @if ($data->currentPage() > 2)
                                    <li>
                                        <a class="page" href="{{ $data->url(1) }}">1</a>
                                    </li>
                                    @if ($data->currentPage() > 3)
                                        <li class="ellipsis">
                                            <span>...</span>
                                        </li>
                                    @endif
                                @endif

                                @for ($i = max(1, $data->currentPage() - 1); $i <= min($data->lastPage(), $data->currentPage() + 1); $i++)
                                    <li class="{{ $i == $data->currentPage() ? 'active' : '' }}">
                                        <a class="page" href="{{ $data->url($i) }}"
                                            data-i="{{ $i }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($data->currentPage() < $data->lastPage() - 1)
                                    @if ($data->currentPage() < $data->lastPage() - 2)
                                        <li class="ellipsis">
                                            <span>...</span>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="page"
                                            href="{{ $data->url($data->lastPage()) }}">{{ $data->lastPage() }}</a>
                                    </li>
                                @endif
                            </ul>
                            <a class="page-item pagination-next {{ $data->nextPageUrl() ? '' : 'disabled' }}"
                                href="{{ $data->nextPageUrl() ? $data->nextPageUrl() : '#' }}">
                                Selanjutnya
                            </a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
