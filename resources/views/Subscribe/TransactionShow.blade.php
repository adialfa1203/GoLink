@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!--- Content1 --->
        <div class="row">

            <!--- Content2 --->
            <div class="col-lg-12 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-0" style="margin-left: 5%;">Langganan Pembelian</h4>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="col-8">
                            <center>
                                <div class="card col-10">
                                    <ul class="list-group" style="padding: 35px;">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Nama
                                            <span>{{ $detailTransaction->data->customer_name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Email
                                            Pengguna
                                            <span>{{ $detailTransaction->data->customer_email }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Nomor
                                            HP Pengguna
                                            <span>{{ $detailTransaction->data->customer_phone }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Referensi
                                            <span>{{ $detailTransaction->data->reference }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Jenis
                                            Pembayaran
                                            <span>{{ $detailTransaction->data->payment_method }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Biaya
                                            Admin
                                            <span>Rp.{{ number_format($detailTransaction->data->total_fee, 2, ',', '.') }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Harga
                                            Bayar
                                            <span>Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Masa
                                            Kadaluwarsa Pembayaran
                                            <span>{{ date('Y-m-d H:i:s', strtotime($detailTransaction->data->expired_time)) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Status
                                            Pembayaran
                                            @php
                                            $status = isset($detailTransaction->data->status) ? strtolower(trim($detailTransaction->data->status)) : null;
                                            $badgeClass = '';
                                            $displayText = '';

                                            switch ($status) {
                                            case 'unpaid':
                                            $badgeClass = 'bg-danger';
                                            $displayText = 'UNPAID';
                                            break;
                                            case 'paid':
                                            $badgeClass = 'bg-success';
                                            $displayText = 'PAID';
                                            break;
                                            case 'expired':
                                            $badgeClass = 'bg-warning';
                                            $displayText = 'EXPIRED';
                                            break;
                                            case 'refund':
                                            $badgeClass = 'bg-info';
                                            $displayText = 'REFUND';
                                            break;
                                            default:
                                            $badgeClass = 'bg-info';
                                            $displayText = 'Data Tidak Valid';
                                            }
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">{{ $displayText }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-weight: bold;">Total Biaya :
                                            <span>Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-success col-10 mt-2" data-bs-toggle="modal" data-bs-target="#pembayaran">Bayar Sekarang</button>
                            </center>
                        </div>
                        <div class="col-4">
                            <center>
                                <div class="col-8">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <div class="col-12">
                                            <div class="card card-animate" style="border-radius: 20px;background: #F0F0F0; margin: 0;">
                                                <div class="card-body">
                                                    @if (strtolower(trim($transaction->subscribe->tipe)) === 'free')
                                                    <h4 class="card-title mb-2 text-center">Gratis</h4>
                                                    @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'silver')
                                                    <h4 class="card-title mb-2 text-center">Dasar</h4>
                                                    @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'gold')
                                                    <h4 class="card-title mb-2 text-center">Menengah</h4>
                                                    @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'platinum')
                                                    <h4 class="card-title mb-2 text-center">Premium</h4>
                                                    @else
                                                    <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
                                                    @endif
                                                </div>
                                                <div class="card-body text-white" style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;height: auto;display: inline-block; min-height: 200px;">
                                                    <div class="row">
                                                        <h5 class="card-title text-center mt-3">
                                                            Rp.{{ number_format($transaction->subscribe->price, 0, ',', '.') }}
                                                            @if (strtolower(trim($transaction->subscribe->period)) === 'forever')
                                                            /Selamanya
                                                            @elseif (strtolower(trim($transaction->subscribe->period)) === '1_week')
                                                            /Minggu
                                                            @elseif (strtolower(trim($transaction->subscribe->period)) === '1_month')
                                                            /Bulan
                                                            @else
                                                            /Tahun
                                                            @endif
                                                        </h5>
                                                    </div>
                                                    <div data-simplebar data-simplebar-auto-hide="false" style="height: 300px;" class="px-3">
                                                        <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                                            {{ strip_tags($transaction->subscribe->description) }}
                                                        </div>
                                                        @if (strtolower(trim($transaction->subscribe->tipe)) === 'free')
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
                                                        @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'silver')
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
                                                        @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'gold')
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
                                                        @elseif (strtolower(trim($transaction->subscribe->tipe)) === 'platinum')
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
                                </div>
                            </center>
                        </div>
                        <div id="pembayaran" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <P>Apakah anda yakin untuk membayar paket berlangganan ini dengan metode pembayaran tersebut?</P>
                                    <div class="d-flex">
<div class="col-6">
    <button type="button" class="btn btn-light col-12">Kembali</button>
</div>
<div class="col-6">
    <button type="button" class="btn btn-success col-12">Bayar</button>
</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary ">Save Changes</button>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
