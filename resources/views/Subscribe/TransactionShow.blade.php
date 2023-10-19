@extends('layout.user.app')

@section('title', 'Berlangganan')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!--- Content1 --->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-0">{{ $detailTransaction->data->reference }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="border-radius: 20px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-animate col-lg-4 col-md-6 col-6 mt-3">
                                    <button type="submit" class="card border-0">
                                        <img class="card-img-top img-fluid" src="" style="width: 100%;"
                                            alt="Card image cap">
                                        <h6 class="card-title mt-2"></h6>
                                    </button>
                                </div>
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
                        </div>
                        <div class="col-12">
                            <div class="card card-animate" style="border-radius: 20px;">
                                <div class="card-body">
                                    <h4 class="card-title mb-4" style="color:#0E2954;">Detail Transaksi
                                        Anda: </h4>
                                    <ul class="list-group">
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
                                        <li class="list-group-item d-flex justify-content-between align-items-center"
                                            style="font-weight: bold;">Total Biaya :
                                            <span>Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}</span>
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
@endsection
