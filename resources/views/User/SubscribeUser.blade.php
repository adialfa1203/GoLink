@extends('layout.user.app')
@section('title', 'Berlangganan')
@section('style')

    <style>
        /* Untuk layar kecil (misalnya, ponsel) */
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
            background: linear-gradient(0deg, #0E2954, #104898);
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

        .page-content {
            background-color: #ffff;
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
                                        <h1 class="card-title long-text m-3" style="color: #ffff; font-size: 30px;">Hi
                                            {!! Auth::user()->name !!}!</h1>
                                        <p class="card-text long-text m-3" style="color: #ffff;">Jangan lewatkan kesempatan
                                            untuk mengambil yang terbaik!
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
                        <h5 class="card-title mb-0">Riwayat Transaksi</h5>
                    </div>
                    <div class="col-6 mb-4 d-flex justify-content-end">
                        <a href="{{ url('user/subscribe-product-user') }}" type="button"
                            class="btn btn-outline-danger justify-content-end">Berlangganan Sekarang</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card"
                            style="background-color:  #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
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
                                                <th class="" data-sort="price">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($data->isEmpty())
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="card d-flex flex-column align-items-center"
                                                            style="background-color: #F0F0F0;">
                                                            <img style="width: 300px; height: 300px;"
                                                                src="{{ asset('images/Empty.png') }}" alt="Gambar">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center mt-2 mb-4">
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
                                                        @if ($transaction->status === 'FAILED' || $transaction->status === 'EXPIRED')
                                                            <td>{{ $transaction->payment_method }}</td>
                                                        @else
                                                            <td><a href="{{ route('transaction.show', ['reference' => $transaction->reference]) }}"
                                                                    class="text-decoration-underline">{{ $transaction->payment_method }}</a>
                                                            </td>
                                                        @endif
                                                        <td>Rp.{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                                                        <td>{{ $transaction->expired }}</td>
                                                        <td>
                                                            @if ($transaction->status === 'PAID')
                                                                <span class="badge bg-success">DIBAYAR</span>
                                                            @elseif ($transaction->status === 'REFUND')
                                                                <span class="badge bg-primary">PENGEMBALIAN DANA</span>
                                                            @elseif ($transaction->status === 'EXPIRED')
                                                                <span class="badge bg-warning">KADALUWARSA</span>
                                                            @elseif ($transaction->status === 'UNPAID')
                                                                <span class="badge bg-danger">BELUM BAYAR</span>
                                                            @else
                                                                <span class="badge bg-secondary">GAGAL</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div>
                                                                    @if ($transaction->status == 'UNPAID')
                                                                        <a href="#" class="btn bi bi-trash-fill"
                                                                            style="background-color: #ff2323; color: #fff;"
                                                                            onclick="event.preventDefault(); confirmCancel('{{ $transaction->reference }}', '{{ $transaction->status }}');">
                                                                        </a>
                                                                    @else
                                                                        <a href="#" class="btn bi bi-trash-fill"
                                                                            style="background-color: #ff2323; color: #fff;"
                                                                            onclick="event.preventDefault(); confirmDelete('{{ $transaction->reference }}', '{{ $transaction->status }}');">
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                @if ($transaction->status == 'PAID')
                                                                    <button type="button" class="btn"
                                                                        style="background-color: #0E2954; color: #fff;"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#pembayaran-{{ $transaction->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="15" height="15"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                                                        </svg>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div id="pembayaran-{{ $transaction->id }}" class="modal fade"
                                                        tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="card" style="background-color: #F0F0F0;">
                                                                        <center>
                                                                            <img src="{{ asset('template/image/milink-gelap.png') }}"
                                                                                alt="" width="40%" height="30%"
                                                                                style="padding: 22px;">
                                                                        </center>
                                                                        <div class="row" style="padding: 30px;">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <h6 class="rata"
                                                                                        style="color: #088C0D;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="14" height="14"
                                                                                            viewBox="0 0 14 14"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M14 6.70096C14 10.4018 10.866 13.4019 7 13.4019C3.134 13.4019 0 10.4018 0 6.70096C0 3.00011 3.134 0 7 0C10.866 0 14 3.00011 14 6.70096ZM6.19031 10.2491L11.3839 5.27738C11.5602 5.10856 11.5602 4.83482 11.3839 4.666L10.7452 4.05462C10.5688 3.88577 10.2829 3.88577 10.1065 4.05462L5.87097 8.10919L3.8935 6.21619C3.71714 6.04737 3.43119 6.04737 3.2548 6.21619L2.61614 6.82758C2.43978 6.9964 2.43978 7.27014 2.61614 7.43896L5.55162 10.249C5.728 10.4179 6.01393 10.4179 6.19031 10.2491Z"
                                                                                                fill="#088C0D" />
                                                                                        </svg>
                                                                                        Transaksi Berhasil
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <h6 class="rata1">
                                                                                        {{ $transaction->payment_method }}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <h6 class="rata text-muted">Telah
                                                                                        Dibayar</h6>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <h6 class="rata1 text-muted">
                                                                                        {{ \Carbon\Carbon::parse($transaction->updated_at)->isoFormat('D MMMM YYYY HH:mm:ss') }}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <h5 class="rata">Total Bayar</h5>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <h6 class="rata1">
                                                                                        Rp.{{ number_format($transaction->amount, 2, ',', '.') }}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <p class="rata">Harga</p>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p class="rata1">
                                                                                        Rp.{{ number_format($transaction->subscribe->price, 2, ',', '.') }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <p class="rata">Biaya admin</p>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p class="rata1">
                                                                                        Rp.{{ number_format($transaction->amount - $transaction->subscribe->price, 2, ',', '.') }}
                                                                                    </p>
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
                                                                                        {{ $transaction->user->name }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <p class="rata">Berlangganan</p>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p class="rata1">
                                                                                        {{ $transaction->subscribe->tipe }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <p class="rata">Nomor Telepon</p>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p class="rata1">
                                                                                        {{ $transaction->user->number }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <p class="rata">Referensi</p>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p class="rata1">
                                                                                        {{ $transaction->reference }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <p class="text-muted" style="margin: 0;">PT
                                                                                Hummatech Digital
                                                                                Indonesia</p>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn mt-2"
                                                                        style="width:100%;background-color: #0E2954;color: #fff;"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#pembayaran"
                                                                        onclick="printReceipt('{{ $transaction->reference }}')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="23" height="24"
                                                                            viewBox="0 0 23 24" fill="none">
                                                                            <path
                                                                                d="M6.30827 2.32402H6.34292V2.07402C6.34292 2.00421 6.40422 1.94291 6.47402 1.94291H15.9669C16.0367 1.94291 16.098 2.00421 16.098 2.07402V6.91693H6.30827V2.32402ZM20.4362 6.91693H17.3256V2.07402C17.3256 1.34697 16.7286 0.75 16.0016 0.75H6.50866C5.78162 0.75 5.18465 1.34697 5.18465 2.07402V6.91693H2.07402C1.34697 6.91693 0.75 7.5139 0.75 8.24094V16.8677C0.75 17.5948 1.34697 18.1917 2.07402 18.1917H5.18465V21.8567C5.18465 22.6184 5.81626 23.25 6.57796 23.25H15.9323C16.694 23.25 17.3256 22.6184 17.3256 21.8567V18.2264H20.4362C21.1633 18.2264 21.7602 17.6294 21.7602 16.9024V8.24094C21.7602 7.5139 21.1633 6.91693 20.4362 6.91693ZM16.098 21.8913C16.098 21.9958 16.0021 22.0917 15.8976 22.0917H6.50866C6.40421 22.0917 6.30827 21.9958 6.30827 21.8913V13.9996H16.098V21.8913ZM20.5673 16.9024C20.5673 16.9722 20.506 17.0335 20.4362 17.0335H17.3256V13.4031C17.3256 13.2424 17.2709 13.089 17.1571 12.9752C17.0433 12.8614 16.8899 12.8067 16.7291 12.8067H5.74646C5.58571 12.8067 5.43233 12.8614 5.3185 12.9752C5.20468 13.089 5.15 13.2424 5.15 13.4031V17.0335H2.03937C1.96957 17.0335 1.90827 16.9722 1.90827 16.9024V8.24094C1.90827 8.17114 1.96957 8.10984 2.03937 8.10984H20.4362C20.506 8.10984 20.5673 8.17114 20.5673 8.24094V16.9024Z"
                                                                                fill="white" stroke="white"
                                                                                stroke-width="0.5" />
                                                                            <path
                                                                                d="M8.3139 17H14.6861C14.8744 17 15 16.8 15 16.5C15 16.2 14.8744 16 14.6861 16H8.3139C8.12556 16 8 16.2 8 16.5C8 16.8 8.12556 17 8.3139 17Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M8.3139 19H14.6861C14.8744 19 15 18.8 15 18.5C15 18.2 14.8744 18 14.6861 18H8.3139C8.12556 18 8 18.2 8 18.5C8 18.8 8.12556 19 8.3139 19Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M8.3139 21H14.6861C14.8744 21 15 20.8 15 20.5C15 20.2 14.8744 20 14.6861 20H8.3139C8.12556 20 8 20.2 8 20.5C8 20.8 8.12556 21 8.3139 21Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M18.3997 9.62207H16.1824C15.9745 9.62207 15.8359 9.76065 15.8359 9.96853C15.8359 10.1764 15.9745 10.315 16.1824 10.315H18.3997C18.6076 10.315 18.7462 10.1764 18.7462 9.96853C18.7462 9.76065 18.5729 9.62207 18.3997 9.62207Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M4.14331 9H3.34646C3.13858 9 3 9.13858 3 9.34646C3 9.55433 3.13858 9.69291 3.34646 9.69291H4.14331C4.35118 9.69291 4.48976 9.55433 4.48976 9.34646C4.48976 9.13858 4.35118 9 4.14331 9Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M5.25066 9H5.11208C4.90421 9 4.76562 9.13858 4.76562 9.34646C4.76562 9.55433 4.90421 9.69291 5.11208 9.69291H5.25066C5.45854 9.69291 5.59712 9.55433 5.59712 9.34646C5.59712 9.13858 5.45854 9 5.25066 9Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                        Cetak Bukti Pembayaran
                                                                    </button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end card-->
                        <div class="pagination-wrap hstack justify-content-center gap-2 mb-3">
                            <a class="page-item pagination-prev {{ $data->previousPageUrl() ? '' : 'disabled' }} d-none d-sm-block"
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
                            <a class="page-item pagination-next {{ $data->nextPageUrl() ? '' : 'disabled' }} d-none d-sm-block"
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
@section('script')
    <script>
        function confirmDelete(reference, status) {
            let confirmationText = '';

            // Set the confirmation text based on the transaction status
            if (status === 'PAID') {
                confirmationText = 'Apakah Anda yakin ingin menghapus riwayat transaksi ini?';
            } else if (status === 'UNPAID') {
                confirmationText = 'Apakah Anda yakin ingin membatalkan transaksi ini?';
            } else {
                confirmationText = 'Apakah Anda yakin ingin menghapus transaksi ini?';
            }

            Swal.fire({
                title: 'Konfirmasi',
                text: confirmationText,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ url('user/back/') }}/' + reference;
                }
            });
        }

        function printReceipt(reference) {
            window.open('/user/transaction-pdf/' + reference, '_blank');
        }

        function confirmCancel(reference) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin membatalkan transaksi ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ url('user/failed/') }}/' + reference;
                }
            });
        }
    </script>

@endsection
