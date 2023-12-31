@extends('layout.user.app')
@section('title', 'Berlangganan')
@section('style')
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<style>
    .rata {
        float: left;
        font-family: Poppins;
    }

    .rata1 {
        float: right;
    }

    @media (min-width: 601px) and (max-width: 1024px) {

        /* Atur gaya CSS khusus untuk perangkat tablet di sini */
        .kotak {
            margin-top: 10%;
        }
    }

    /* Responsive styles for smaller screens (e.g., tablets and below) */
    @media (max-width: 768px) {
        .kotak {
            margin-top: 10%;
        }
    }
</style>
@endsection
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!--- Content1 --->
        <div class="row">

            <!--- Content2 --->
            <div class="col-lg-12 mb-4">


                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Intruksi Pembayaran</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="accordion" id="default-accordion-example">
                                        @foreach ($instructions as $index => $data)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $index }}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                    {{ $data->title }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#default-accordion-example">
                                                <div class="accordion-body">
                                                    <ul style="list-style-type: none; padding: 0;">
                                                        @foreach ($data->steps as $step)
                                                        <li>{{ $loop->iteration }}.
                                                            {!! $step !!}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-7">
                        <center>
                            <div class="card col-12 col-sm-12 col-lg-12">
                                <div class="card-header">
                                    <h4 class="card-title" style="padding: 16px;text-align: start;padding-bottom: 0;padding-top: 0;">Intruksi Pembayaran</h4>
                                </div><!-- end card header -->
                                <ul class="list-group" style="padding: 35px;padding-top: 0;">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Nama
                                        <span style="overflow-wrap: anywhere">{{ $detailTransaction->data->customer_name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Email
                                        Pengguna
                                        <span style="overflow-wrap: anywhere">{{ $detailTransaction->data->customer_email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Nomor
                                        HP Pengguna
                                        <span>{{ $detailTransaction->data->customer_phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Referensi
                                        <span style="overflow-wrap: anywhere">{{ $detailTransaction->data->reference }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Jenis
                                        Pembayaran
                                        <span style="overflow-wrap: anywhere">{{ $detailTransaction->data->payment_method }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Harga
                                        Bayar
                                        <span style="overflow-wrap: anywhere">Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Masa
                                        Kadaluwarsa Pembayaran
                                        <span style="overflow-wrap: anywhere">{{ \Carbon\Carbon::parse($expired)->isoFormat('D MMMM YYYY HH:mm') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status
                                        Pembayaran
                                        @php
                                        $status = isset($detailTransaction->data->status) ? strtolower(trim($detailTransaction->data->status)) : null;
                                        $badgeClass = '';
                                        $displayText = '';

                                        switch ($status) {
                                        case 'unpaid':
                                        $badgeClass = 'bg-danger';
                                        $displayText = 'BELUM BAYAR';
                                        break;
                                        case 'paid':
                                        $badgeClass = 'bg-success';
                                        $displayText = 'DIBAYAR';
                                        break;
                                        case 'expired':
                                        $badgeClass = 'bg-warning';
                                        $displayText = 'KADALUWARSA';
                                        break;
                                        case 'refund':
                                        $badgeClass = 'bg-info';
                                        $displayText = 'PENGEMBALIAN DANA';
                                        break;
                                        default:
                                        $badgeClass = 'bg-info';
                                        $displayText = 'GAGAL';
                                        }
                                        @endphp
                                        <span style="overflow-wrap: anywhere" class="badge {{ $badgeClass }}">{{ $displayText }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="font-weight: bold;">Total Biaya :
                                        <span style="overflow-wrap: anywhere">Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}</span>
                                    </li>
                                </ul>
                            </div>
                            @if ($transaction->status == 'PAID')
                            <button type="button" class="btn col-10 mt-2" style="background-color: #0E2954;color: #fff;" data-bs-toggle="modal" data-bs-target="#pembayaran">Lihat Bukti Pembayaran</button>
                            @else
                            <div class="d-flex gap-1">
                                <a class="btn mt-2 col-6" style="background-color: #088C0D; color:white" href="{{ route('subscribe.user') }}">Kembali</a>
                                <a href="{{ route('transaction.delete', ['reference' => $transaction->reference]) }}" class="btn col-6 mt-2" style="background-color: #ff2323; color: #fff;" onclick="event.preventDefault(); confirmDelete('{{ $transaction->reference }}');">
                                    Batalkan
                                </a>
                            </div>
                            @endif
                        </center>
                        <div id="pembayaran" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="card" style="background-color: #F0F0F0;">
                                            <center>
                                                <img src="{{ asset('template/image/milink-gelap.png') }}" alt="" width="40%" height="30%" style="padding: 22px;">
                                            </center>
                                            <div class="row" style="padding: 30px;">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="rata" style="color: #088C0D;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                <path d="M14 6.70096C14 10.4018 10.866 13.4019 7 13.4019C3.134 13.4019 0 10.4018 0 6.70096C0 3.00011 3.134 0 7 0C10.866 0 14 3.00011 14 6.70096ZM6.19031 10.2491L11.3839 5.27738C11.5602 5.10856 11.5602 4.83482 11.3839 4.666L10.7452 4.05462C10.5688 3.88577 10.2829 3.88577 10.1065 4.05462L5.87097 8.10919L3.8935 6.21619C3.71714 6.04737 3.43119 6.04737 3.2548 6.21619L2.61614 6.82758C2.43978 6.9964 2.43978 7.27014 2.61614 7.43896L5.55162 10.249C5.728 10.4179 6.01393 10.4179 6.19031 10.2491Z" fill="#088C0D" />
                                                            </svg>
                                                            Transaksi Berhasil
                                                        </h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="rata1">
                                                            {{ $detailTransaction->data->payment_method }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="rata text-muted">Telah Dibayar</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="rata1 text-muted">{{ \Carbon\Carbon::parse($transaction->updated_at)->isoFormat('D MMMM YYYY HH:mm:ss') }}</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="rata">Total Bayar</h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="rata1">
                                                            Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="rata">Detail Pesanan</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="rata">Nama</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="rata1">
                                                            {{ $detailTransaction->data->customer_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="rata">Berlangganan</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="rata1">
                                                            {{ $detailTransaction->data->order_items[0]->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="rata">Nomor Telepon</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="rata1">
                                                            {{ $detailTransaction->data->customer_phone }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="rata">Referensi</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="rata1">
                                                            {{ $detailTransaction->data->reference }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p class="text-muted" style="margin: 0;">PT Hummatech Digital
                                                    Indonesia</p>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="button" class="btn mt-2 col-md-6" style="width:100%;background-color: #0E2954;color: #fff;" data-bs-toggle="modal" data-bs-target="#pembayaran" onclick="printReceipt('{{ $transaction->reference }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 24" fill="none">
                                                    <path d="M6.30827 2.32402H6.34292V2.07402C6.34292 2.00421 6.40422 1.94291 6.47402 1.94291H15.9669C16.0367 1.94291 16.098 2.00421 16.098 2.07402V6.91693H6.30827V2.32402ZM20.4362 6.91693H17.3256V2.07402C17.3256 1.34697 16.7286 0.75 16.0016 0.75H6.50866C5.78162 0.75 5.18465 1.34697 5.18465 2.07402V6.91693H2.07402C1.34697 6.91693 0.75 7.5139 0.75 8.24094V16.8677C0.75 17.5948 1.34697 18.1917 2.07402 18.1917H5.18465V21.8567C5.18465 22.6184 5.81626 23.25 6.57796 23.25H15.9323C16.694 23.25 17.3256 22.6184 17.3256 21.8567V18.2264H20.4362C21.1633 18.2264 21.7602 17.6294 21.7602 16.9024V8.24094C21.7602 7.5139 21.1633 6.91693 20.4362 6.91693ZM16.098 21.8913C16.098 21.9958 16.0021 22.0917 15.8976 22.0917H6.50866C6.40421 22.0917 6.30827 21.9958 6.30827 21.8913V13.9996H16.098V21.8913ZM20.5673 16.9024C20.5673 16.9722 20.506 17.0335 20.4362 17.0335H17.3256V13.4031C17.3256 13.2424 17.2709 13.089 17.1571 12.9752C17.0433 12.8614 16.8899 12.8067 16.7291 12.8067H5.74646C5.58571 12.8067 5.43233 12.8614 5.3185 12.9752C5.20468 13.089 5.15 13.2424 5.15 13.4031V17.0335H2.03937C1.96957 17.0335 1.90827 16.9722 1.90827 16.9024V8.24094C1.90827 8.17114 1.96957 8.10984 2.03937 8.10984H20.4362C20.506 8.10984 20.5673 8.17114 20.5673 8.24094V16.9024Z" fill="white" stroke="white" stroke-width="0.5" />
                                                    <path d="M8.3139 17H14.6861C14.8744 17 15 16.8 15 16.5C15 16.2 14.8744 16 14.6861 16H8.3139C8.12556 16 8 16.2 8 16.5C8 16.8 8.12556 17 8.3139 17Z" fill="white" />
                                                    <path d="M8.3139 19H14.6861C14.8744 19 15 18.8 15 18.5C15 18.2 14.8744 18 14.6861 18H8.3139C8.12556 18 8 18.2 8 18.5C8 18.8 8.12556 19 8.3139 19Z" fill="white" />
                                                    <path d="M8.3139 21H14.6861C14.8744 21 15 20.8 15 20.5C15 20.2 14.8744 20 14.6861 20H8.3139C8.12556 20 8 20.2 8 20.5C8 20.8 8.12556 21 8.3139 21Z" fill="white" />
                                                    <path d="M18.3997 9.62207H16.1824C15.9745 9.62207 15.8359 9.76065 15.8359 9.96853C15.8359 10.1764 15.9745 10.315 16.1824 10.315H18.3997C18.6076 10.315 18.7462 10.1764 18.7462 9.96853C18.7462 9.76065 18.5729 9.62207 18.3997 9.62207Z" fill="white" />
                                                    <path d="M4.14331 9H3.34646C3.13858 9 3 9.13858 3 9.34646C3 9.55433 3.13858 9.69291 3.34646 9.69291H4.14331C4.35118 9.69291 4.48976 9.55433 4.48976 9.34646C4.48976 9.13858 4.35118 9 4.14331 9Z" fill="white" />
                                                    <path d="M5.25066 9H5.11208C4.90421 9 4.76562 9.13858 4.76562 9.34646C4.76562 9.55433 4.90421 9.69291 5.11208 9.69291H5.25066C5.45854 9.69291 5.59712 9.55433 5.59712 9.34646C5.59712 9.13858 5.45854 9 5.25066 9Z" fill="white" />
                                                </svg>
                                                Cetak Bukti Pembayaran
                                            </button>
                                        </div>
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
@section('script')
<script>
    function confirmDelete(reference) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin membatalkan transaksi ini?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ url('
                user / failed / ') }}/' + reference;
            }
        });
    }
</script>
<script>
    function printReceipt(reference) {
        window.open('/user/transaction-pdf/' + reference, '_blank');
    }
</script>
<script>
    function copy() {
        var copyText = document.getElementById("copy");
        var textToCopy = copyText.innerText || copyText.textContent;

        var range = document.createRange();
        range.selectNode(copyText);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);

        document.execCommand("copy");

        window.getSelection().removeAllRanges();

        Swal.fire({
            'icon': 'success',
            'title': 'Berhasil!',
            'text': 'Berhasil menyalin referensi'
        })
    }
</script>


@endsection
