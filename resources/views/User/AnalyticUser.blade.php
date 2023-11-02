@extends('layout.user.app')

@section('title', 'Analitik')

@section('style')
<style>
    .page-content {
        overflow-x: hidden;
        background-color: #fff;
    }

    .bg-custom {
        background-color: #CDF0EA;
    }
</style>
<style>
    .btn.btn-subtle-primary {
        background-color: transparent;
        color: #0E2954;
        border-radius: 5px;
        border: 1px solid #0E2954;
        /* Warna teks default */
    }

    /* Hover style */
    .btn.btn-subtle-primary:hover {
        background-color: #0E2954;
        border-radius: 5px;
        border: 1px solid #0E2954;
        /* Warna latar belakang saat dihover */
        color: #fff;
        /* Warna teks saat dihover */
    }

    /* Gaya untuk tombol yang aktif */
    .btn.btn-subtle-primary.active-hover {
        background-color: #0E2954;
        border-radius: 5px;
        border: 1px solid #0E2954;
        /* Warna latar belakang saat aktif */
        color: #fff;
        /* Warna teks saat aktif */
    }

    /* CSS untuk perangkat laptop (misalnya, lebar layar antara 1025px dan 1440px) */
    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        #popularDataContainer {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }

    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        #additionalDataContainer {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }

    .kotak {
        border-radius: 10px;
        background: #F0F0F0;
        box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25)
    }

    .mid {
        border-radius: 15px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .lower {
        border-radius: 5px;
        background: #F0F0F0;
        box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .tex {
        color: #0E2954;
        font-family: Poppins;
        font-size: 17px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .box {
        border-radius: 5px;
        background: #D2E0FB;
        width: 64px;
        height: 65px;
        padding: 9px;
    }
    .unli{
        width: 100%
    }
</style>

@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->

        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate kotak" style="border-left: #0E2954 solid 4px; border-radius: 10px;">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <p style="color: #0E2954; text-muted fw-medium text-uppercase mb-0">Jumlah tautan</p>
                        <h4 class="mt-4"><span class="counter-value" data-target="{{ $countURL }}">{{ $countURL }}</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate kotak" style="border-left: #104898 solid 4px; border-radius: 10px;">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <p style="color: #0E2954; text-muted fw-medium text-uppercase mb-0">Pengunjung Tautan</p>
                        <h4 class="mt-4"><span class="counter-value" data-target="{{ $totalVisits }}">{{ $totalVisits }}</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate kotak" style="border-left: #337CCF solid 4px; border-radius: 10px;">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <p style="color: #0E2954; text-muted fw-medium text-uppercase mb-0">Jumlah Microsite</p>
                        <h4 class="mt-4"><span class="counter-value" data-target="{{ $countMicrosite }}">{{ $countMicrosite }}</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate kotak" style="border-left: #80B3FF solid 4px; border-radius: 10px;">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <p style="color: #0E2954; text-muted fw-medium text-uppercase mb-0">Pengunjung Microsite</p>
                        <h4 class="mt-4"><span class="counter-value" data-target="{{ $totalVisitsMicrosite }}">{{ $totalVisitsMicrosite }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
        <!---end row-->
        <div class="row">
            <div class="col-lg-9">
                <div class="card" style="border-radius: 10px;border: 1px solid rgba(0, 0, 0, 0.10);background: #F0F0F0;box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25);">
                    <div class="card-body pb-0 mb-n4">
                        <div class="d-flex z-1 position-relative">
                            <div class="flex-shrink-0">
                                @php
                                $firstDayOfMonth = now()
                                ->startOfMonth()
                                ->format('d F Y');
                                $lastDayOfMonth = now()
                                ->endOfMonth()
                                ->format('d F Y');
                                @endphp

                                <div data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-default-date="{{ $firstDayOfMonth }} to {{ $lastDayOfMonth }}">
                                    {{ $firstDayOfMonth }} to {{ $lastDayOfMonth }} <i class="align-middle ms-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card-body pt-0 mt-4 mt-md-0">
                        <div id="chart"></div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-lg-3">
                <div class="card mid" style="background-color: #F0F0F0;min-height: 96%;box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25);">
                    <div class="card-body">
                        <p style="color: #0E2954;font-family: Poppins;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">
                            Kuota</p>
                        <hr>
                        <div class="d-flex pb-1">
                            <div class="flex-grow-1">
                                <h6 class="card-title" style="color: #0E2954;">
                                    Tautan dibuat /Bulan
                                    <span class="tooltip-icon" data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                        {{-- <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i> --}}
                                    </span>
                                </h6>
                            </div>
                        </div>
                        @if (auth()->user()->subscribe == 'platinum')
                        <div class="progress" data-bs-toggle="tooltip" data-bs-title="{{ $countURL }} Tautan dibuat">
                            <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated unli" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @else
                        <div class="progress" data-bs-toggle="tooltip" data-bs-title="{{ $countURL }} Tautan dibuat">
                            <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                        @endif
                        <p class="mb-0">
                            <b>
                                {{ $countURL }} dari
                                @if (auth()->user()->subscribe == 'platinum')
                                <span style="color: red;">Unlimited</span>
                                @else
                                dari {{ $urlStatus }}
                                @endif
                            </b>
                        </p>
                        <br>
                        <h6 class="card-title" style="color: #0E2954;">Microsite dibuat/Bulan
                            <span class="tooltip-icon" data-tooltip="Setiap bulan pengguna akan dikenakan kuota sesuai dengan layanan yang digunakan. Kuota akan tersedia kembali setelah tanggal reset kuota atau melakukan upgrade ke layanan yang lebih tinggi">
                                {{-- <i class="bi bi-exclamation-circle align-baseline ms-1 fs-sm"></i> --}}
                            </span>
                        </h6>
                        @if (auth()->user()->subscribe == 'platinum')
                        <div class="progress" data-bs-toggle="tooltip" data-bs-title="{{ $countMicrosite }} Nama diubah">
                            <div class="progress-bar progress-bar-striped progress-bar-animated unli" id="total-microsite" role="progressbar" aria-valuenow="{{ $countMicrosite }}" aria-valuemin="0" aria-valuemax="3"></div>
                        </div>
                        @else
                        <div class="progress" data-bs-toggle="tooltip" data-bs-title="{{ $countMicrosite }} Nama diubah">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="total-microsite" role="progressbar" aria-valuenow="{{ $countMicrosite }}" aria-valuemin="0" aria-valuemax="3" style="width:{{ ($countMicrosite / (int) $micrositeStatus) * 100 }}%"></div>
                        </div>
                        @endif
                        <p class="mb-0">
                            <b>
                                {{ $countMicrosite }} dari
                                @if (auth()->user()->subscribe == 'platinum')
                                <span style="color: red;">Unlimited</span>
                                @else
                                dari {{ $micrositeStatus }}
                                @endif
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div>
            <button type="button" class="btn btn-subtle-primary active-hover" id="showPopularData" onclick="toggleHover('showPopularData')">Data Populer</button>
            <button type="button" class="btn btn-subtle-primary" id="showAdditionalData" onclick="toggleHover('showAdditionalData')">Data Tambahan</button>
        </div>
        <br>
        <div class="row">
            <div id="popularDataContainer">
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Tautan Populer</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tautan</th>
                                            <th scope="col">Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($links->sortByDesc('totalVisits') as $link)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $link->default_short_url }}</td>
                                            <td>{{ $link->totalVisits }} Pengunjung</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Microsite Populer</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tautan</th>
                                            <th scope="col">Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($microsites->sortByDesc('totalVisits') as $microsite)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $microsite->default_short_url }}</td>
                                            <td>{{ $microsite->totalVisits }} Pengunjung</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
            <div id="additionalDataContainer" class="d-none">
                @if (auth()->user()->subscribe != 'platinum')
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Nama Browser Teratas</h5>
                            <hr>
                            <center class="mt-5">
                                <div class="box mt-5 mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none" style="width: 44px;height: 44px;">
                                        <path d="M10.9987 40.3333C9.99037 40.3333 9.12687 39.974 8.4082 39.2553C7.68953 38.5367 7.33081 37.6738 7.33203 36.6667V18.3333C7.33203 17.325 7.69137 16.4615 8.41003 15.7428C9.1287 15.0242 9.99159 14.6655 10.9987 14.6667H12.832V11C12.832 8.4639 13.7261 6.30179 15.5142 4.51368C17.3023 2.72557 19.4638 1.83212 21.9987 1.83334C24.5348 1.83334 26.6969 2.7274 28.485 4.51551C30.2731 6.30362 31.1666 8.46512 31.1654 11V14.6667H32.9987C34.007 14.6667 34.8705 15.026 35.5892 15.7447C36.3079 16.4633 36.6666 17.3262 36.6654 18.3333V36.6667C36.6654 37.675 36.306 38.5385 35.5874 39.2572C34.8687 39.9758 34.0058 40.3346 32.9987 40.3333H10.9987ZM21.9987 31.1667C23.007 31.1667 23.8705 30.8073 24.5892 30.0887C25.3079 29.37 25.6666 28.5071 25.6654 27.5C25.6654 26.4917 25.306 25.6282 24.5874 24.9095C23.8687 24.1908 23.0058 23.8321 21.9987 23.8333C20.9904 23.8333 20.1269 24.1927 19.4082 24.9113C18.6895 25.63 18.3308 26.4929 18.332 27.5C18.332 28.5083 18.6914 29.3718 19.41 30.0905C20.1287 30.8092 20.9916 31.1679 21.9987 31.1667ZM16.4987 14.6667H27.4987V11C27.4987 9.47223 26.964 8.17362 25.8945 7.10418C24.8251 6.03473 23.5265 5.50001 21.9987 5.50001C20.4709 5.50001 19.1723 6.03473 18.1029 7.10418C17.0334 8.17362 16.4987 9.47223 16.4987 11V14.6667Z" fill="#0E2954" />
                                    </svg>
                                </div>
                                <h5 style="color: #0E2954;font-family: Poppins;font-size: 17px;font-style: normal;font-weight: 600;line-height: normal;">
                                    Anda Tidak Bisa Mengakses Fitur Ini!</h5>
                                <p style="color: #0E2954;font-family: Poppins;font-size: 13px;font-style: normal;font-weight: 400;line-height: normal;">
                                    Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati Fitur Ini</p>
                                <hr class="mt-4">
                                <a href="{{ url('user/subscribe-product-user') }}" style="color :red;"> Mulai
                                    Berlangganan? </a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Perangkat Teratas</h5>
                            <hr>
                            <center class="mt-5">
                                <div class="box mt-5 mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none" style="width: 44px;height: 44px;">
                                        <path d="M10.9987 40.3333C9.99037 40.3333 9.12687 39.974 8.4082 39.2553C7.68953 38.5367 7.33081 37.6738 7.33203 36.6667V18.3333C7.33203 17.325 7.69137 16.4615 8.41003 15.7428C9.1287 15.0242 9.99159 14.6655 10.9987 14.6667H12.832V11C12.832 8.4639 13.7261 6.30179 15.5142 4.51368C17.3023 2.72557 19.4638 1.83212 21.9987 1.83334C24.5348 1.83334 26.6969 2.7274 28.485 4.51551C30.2731 6.30362 31.1666 8.46512 31.1654 11V14.6667H32.9987C34.007 14.6667 34.8705 15.026 35.5892 15.7447C36.3079 16.4633 36.6666 17.3262 36.6654 18.3333V36.6667C36.6654 37.675 36.306 38.5385 35.5874 39.2572C34.8687 39.9758 34.0058 40.3346 32.9987 40.3333H10.9987ZM21.9987 31.1667C23.007 31.1667 23.8705 30.8073 24.5892 30.0887C25.3079 29.37 25.6666 28.5071 25.6654 27.5C25.6654 26.4917 25.306 25.6282 24.5874 24.9095C23.8687 24.1908 23.0058 23.8321 21.9987 23.8333C20.9904 23.8333 20.1269 24.1927 19.4082 24.9113C18.6895 25.63 18.3308 26.4929 18.332 27.5C18.332 28.5083 18.6914 29.3718 19.41 30.0905C20.1287 30.8092 20.9916 31.1679 21.9987 31.1667ZM16.4987 14.6667H27.4987V11C27.4987 9.47223 26.964 8.17362 25.8945 7.10418C24.8251 6.03473 23.5265 5.50001 21.9987 5.50001C20.4709 5.50001 19.1723 6.03473 18.1029 7.10418C17.0334 8.17362 16.4987 9.47223 16.4987 11V14.6667Z" fill="#0E2954" />
                                    </svg>
                                </div>
                                <h5 style="color: #0E2954;font-family: Poppins;font-size: 17px;font-style: normal;font-weight: 600;line-height: normal;">
                                    Anda Tidak Bisa Mengakses Fitur Ini!</h5>
                                <p style="color: #0E2954;font-family: Poppins;font-size: 13px;font-style: normal;font-weight: 400;line-height: normal;">
                                    Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati Fitur Ini</p>
                                <hr class="mt-4">
                                <a href="{{ url('user/subscribe-product-user') }}" style="color :red;"> Mulai
                                    Berlangganan? </a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Referer Teratas</h5>
                            <hr>
                            <center class="mt-5">
                                <div class="box mt-5 mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none" style="width: 44px;height: 44px;">
                                        <path d="M10.9987 40.3333C9.99037 40.3333 9.12687 39.974 8.4082 39.2553C7.68953 38.5367 7.33081 37.6738 7.33203 36.6667V18.3333C7.33203 17.325 7.69137 16.4615 8.41003 15.7428C9.1287 15.0242 9.99159 14.6655 10.9987 14.6667H12.832V11C12.832 8.4639 13.7261 6.30179 15.5142 4.51368C17.3023 2.72557 19.4638 1.83212 21.9987 1.83334C24.5348 1.83334 26.6969 2.7274 28.485 4.51551C30.2731 6.30362 31.1666 8.46512 31.1654 11V14.6667H32.9987C34.007 14.6667 34.8705 15.026 35.5892 15.7447C36.3079 16.4633 36.6666 17.3262 36.6654 18.3333V36.6667C36.6654 37.675 36.306 38.5385 35.5874 39.2572C34.8687 39.9758 34.0058 40.3346 32.9987 40.3333H10.9987ZM21.9987 31.1667C23.007 31.1667 23.8705 30.8073 24.5892 30.0887C25.3079 29.37 25.6666 28.5071 25.6654 27.5C25.6654 26.4917 25.306 25.6282 24.5874 24.9095C23.8687 24.1908 23.0058 23.8321 21.9987 23.8333C20.9904 23.8333 20.1269 24.1927 19.4082 24.9113C18.6895 25.63 18.3308 26.4929 18.332 27.5C18.332 28.5083 18.6914 29.3718 19.41 30.0905C20.1287 30.8092 20.9916 31.1679 21.9987 31.1667ZM16.4987 14.6667H27.4987V11C27.4987 9.47223 26.964 8.17362 25.8945 7.10418C24.8251 6.03473 23.5265 5.50001 21.9987 5.50001C20.4709 5.50001 19.1723 6.03473 18.1029 7.10418C17.0334 8.17362 16.4987 9.47223 16.4987 11V14.6667Z" fill="#0E2954" />
                                    </svg>
                                </div>
                                <h5 style="color: #0E2954;font-family: Poppins;font-size: 17px;font-style: normal;font-weight: 600;line-height: normal;">
                                    Anda Tidak Bisa Mengakses Fitur Ini!</h5>
                                <p style="color: #0E2954;font-family: Poppins;font-size: 13px;font-style: normal;font-weight: 400;line-height: normal;">
                                    Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati Fitur Ini</p>
                                <hr class="mt-4">
                                <a href="{{ url('user/subscribe-product-user') }}" style="color :red;"> Mulai
                                    Berlangganan? </a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">IP Address
                            </h5>
                            <hr>
                            <center class="mt-5">
                                <div class="box mt-5 mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none" style="width: 44px;height: 44px;">
                                        <path d="M10.9987 40.3333C9.99037 40.3333 9.12687 39.974 8.4082 39.2553C7.68953 38.5367 7.33081 37.6738 7.33203 36.6667V18.3333C7.33203 17.325 7.69137 16.4615 8.41003 15.7428C9.1287 15.0242 9.99159 14.6655 10.9987 14.6667H12.832V11C12.832 8.4639 13.7261 6.30179 15.5142 4.51368C17.3023 2.72557 19.4638 1.83212 21.9987 1.83334C24.5348 1.83334 26.6969 2.7274 28.485 4.51551C30.2731 6.30362 31.1666 8.46512 31.1654 11V14.6667H32.9987C34.007 14.6667 34.8705 15.026 35.5892 15.7447C36.3079 16.4633 36.6666 17.3262 36.6654 18.3333V36.6667C36.6654 37.675 36.306 38.5385 35.5874 39.2572C34.8687 39.9758 34.0058 40.3346 32.9987 40.3333H10.9987ZM21.9987 31.1667C23.007 31.1667 23.8705 30.8073 24.5892 30.0887C25.3079 29.37 25.6666 28.5071 25.6654 27.5C25.6654 26.4917 25.306 25.6282 24.5874 24.9095C23.8687 24.1908 23.0058 23.8321 21.9987 23.8333C20.9904 23.8333 20.1269 24.1927 19.4082 24.9113C18.6895 25.63 18.3308 26.4929 18.332 27.5C18.332 28.5083 18.6914 29.3718 19.41 30.0905C20.1287 30.8092 20.9916 31.1679 21.9987 31.1667ZM16.4987 14.6667H27.4987V11C27.4987 9.47223 26.964 8.17362 25.8945 7.10418C24.8251 6.03473 23.5265 5.50001 21.9987 5.50001C20.4709 5.50001 19.1723 6.03473 18.1029 7.10418C17.0334 8.17362 16.4987 9.47223 16.4987 11V14.6667Z" fill="#0E2954" />
                                    </svg>
                                </div>
                                <h5 style="color: #0E2954;font-family: Poppins;font-size: 17px;font-style: normal;font-weight: 600;line-height: normal;">
                                    Anda Tidak Bisa Mengakses Fitur Ini!</h5>
                                <p style="color: #0E2954;font-family: Poppins;font-size: 13px;font-style: normal;font-weight: 400;line-height: normal;">
                                    Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati Fitur Ini</p>
                                <hr class="mt-4">
                                <a href="{{ url('user/subscribe-product-user') }}" style="color :red;"> Mulai
                                    Berlangganan? </a>
                            </center>
                        </div>
                    </div>
                </div>
                @else
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Nama Browser Teratas</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Browser</th>
                                            <th scope="col">Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TopBrowser->sortByDesc('totalTopBrowser') as $TopBrowser)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $TopBrowser->browser }}</td>
                                            <td>{{ $TopBrowser->total }} Pengunjung</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Perangkat Teratas</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Perangkat</th>
                                            <th scope="col">Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TopDevice->sortByDesc('totalTopBrowser') as $TopDevice)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $TopDevice->device_type }}</td>
                                            <td>{{ $TopDevice->total }} Pengunjung</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">Referer Teratas</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Referer</th>
                                            <th scope="col">Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TopReferer->sortByDesc('totalTopBrowser') as $TopReferer)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $TopReferer->referer_url }}</td>
                                            <td>{{ $TopReferer->total }} Pengunjung</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card lower" id="agenciesList">
                        <div class="card-body">
                            <h5 class="tex">IP Address</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Alamat Ip</th>
                                            <th scope="col">Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TopIpAdress->sortByDesc('totalTopBrowser') as $TopIpAdress)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $TopIpAdress->ip_address }}</td>
                                            <td>{{ $TopIpAdress->total }} Pengunjung</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div><!--end row-->
    </div>
    <!-- container-fluid -->
</div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var currentMonth = new Date().getMonth();
    var chart;

    function updateChart() {
        $.ajax({
            url: "{{ route('analytic.users.chart') }}",
            method: "GET",
            success: function(data) {
                if (
                    data.totalUrlData &&
                    data.totalVisitsData &&
                    data.totalVisitsMicrositeData &&
                    data.countMicrositeData
                ) {
                    var totalVisits = [];
                    var totalMicrosite = [];
                    var a = [];
                    $.each(data.totalVisitsData, function(index, value) {
                        totalVisits.push(value.totalVisits);
                    })
                    $.each(data.countMicrositeData, function(index, value) {
                        totalMicrosite.push(value.countMicrosite);
                    })
                    $.each(data.totalVisitsMicrositeData, function(index, value) {
                        a.push(value.totalVisitsMicrosite);
                    })
                    var monthData = groupDataByMonth(data);
                    console.log("Jumlah Tautan:", monthData.totalUrlData);
                    console.log("Pengunjung Tautan:", totalVisits);
                    console.log("Jumlah Microsite:", totalMicrosite);
                    console.log("Pengunjung Microsite:", a);
                    console.log("Bulan:", monthData.monthLabels);

                    var options = {
                        series: [{
                                name: 'Jumlah Tautan',
                                data: monthData.totalUrlData
                            },
                            {
                                name: 'Pengunjung Tautan',
                                data: totalVisits
                            },
                            {
                                name: 'Jumlah Microsite',
                                data: totalMicrosite
                            },
                            {
                                name: 'Pengunjung Microsite',
                                data: a
                            }
                        ],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['#fff']
                        },
                        xaxis: {
                            categories: monthData.monthLabels,
                            labels: {
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        colors: ['#0E2954', '#104898', '#337CCF',
                            '#80B3FF'
                        ] // Tambahkan warna yang Anda inginkan di sini
                    };

                    if (chart) {
                        chart.updateOptions(options);
                    } else {
                        chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    }

                    var currentMonthNew = new Date().getMonth();
                    if (currentMonth !== currentMonthNew) {
                        chart.updateSeries([]);
                        currentMonth = currentMonthNew;
                    }
                } else {
                    console.log("Data tidak tersedia.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function groupDataByMonth(data) {
        var monthData = {
            totalUrlData: [],
            totalVisitsData: [],
            totalVisitsMicrositeData: [],
            countMicrositeData: [],
            monthLabels: []
        };

        var currentMonthData = {
            totalUrl: 0,
            totalVisits: 0,
            totalVisitsMicrosite: 0,
            countMicrosite: 0
        };

        data.totalUrlData.forEach(function(item) {
            var itemMonth = new Date(item.date).getMonth();

            if (itemMonth === currentMonth) {
                currentMonthData.totalUrl += item.totalUrl;
                currentMonthData.totalVisits += item.totalVisits;
                currentMonthData.totalVisitsMicrosite += item.totalVisitsMicrosite;
                currentMonthData.countMicrosite += item.countMicrosite;
            }
        });

        monthData.totalUrlData.push(currentMonthData.totalUrl);
        monthData.totalVisitsData.push(currentMonthData.totalVisits);
        monthData.totalVisitsMicrositeData.push(currentMonthData.totalVisitsMicrosite);
        monthData.countMicrositeData.push(currentMonthData.countMicrosite);
        monthData.monthLabels.push(getMonthName(currentMonth));

        return monthData;
    }

    function getMonthName(monthIndex) {
        var monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        return monthNames[monthIndex];
    }

    updateChart();
</script>
<script>
    $(document).ready(function() {
        fetchData();
    });

    function fetchData() {
        $.ajax({
            url: "{{ route('quota.data') }}",
            method: 'GET',
            success: function(response) {
                var countURL = response.countURL;
                var countMicrosite = response.countMicrosite;
                updateChart(countURL, countMicrosite);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function updateChart(countURL, countMicrosite) {
        var options = {
            series: [{
                name: 'Total URL',
                data: countURL.map(item => item.count)
            }, {
                name: 'Total Microsite',
                data: countMicrosite.map(item => item.count)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    barWidth: '50%'
                }
            },
            dataLabels: {
                enabled: false
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            colors: ['#104898', '#337CCF']
        };

        var chart = new ApexCharts(document.querySelector("#quotaChart"), options);
        chart.render();
    }
</script>


<script>
    const showPopularDataButton = document.getElementById('showPopularData');
    const showAdditionalDataButton = document.getElementById('showAdditionalData');
    const popularDataContainer = document.getElementById('popularDataContainer');
    const additionalDataContainer = document.getElementById('additionalDataContainer');

    showAdditionalDataButton.addEventListener('click', () => {
        popularDataContainer.classList.add('d-none');
        additionalDataContainer.classList.remove('d-none');
    });

    showPopularDataButton.addEventListener('click', () => {
        additionalDataContainer.classList.add('d-none');
        popularDataContainer.classList.remove('d-none');
    });
</script>
<script>
    function toggleHover(buttonId) {
        const buttons = document.querySelectorAll('.btn.btn-subtle-primary');

        buttons.forEach(button => {
            if (button.id === buttonId) {
                button.classList.add('active-hover'); // Tambahkan kelas untuk mengaktifkan efek hover
            } else {
                button.classList.remove('active-hover'); // Hapus kelas dari tombol yang tidak diklik
            }
        });
    }
</script>
@if ($user->subscribe == 'platinum')
    <script>
        var countData = 1;
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / 1) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);
    </script>
    @else
    <script>
        var countData = {{ $countURL }};
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / {{ $urlStatus }}) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);
    </script>
    @endif

    @if ($user->subscribe !== 'platinum')
    <script>
        var countData = {{ $countMicrosite }};
        var progressBar = document.getElementById("progress-bar");
        var progressBarWidth = (countData / {{ $micrositeStatus }}) * 100;
        progressBar.style.width = progressBarWidth + "%";
        progressBar.setAttribute("aria-valuenow", countData);
    </script>
    <script>
        var countURLValue = {{ $countURL }};

        // Calculate the percentage
        var percentage = (countURLValue / {{ $urlStatus }}) * 100;

        var progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = percentage + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('.text-muted.mb-0 b');
        progressText.textContent = countURLValue + ' dari {{ $urlStatus }}';
    </script>
    @endif

    @if ($user->subscribe == 'platinum')
    <script>
        var countURLValue = 1;

        var progressBar = document.querySelector('#total-microsite');
        progressBar.style.width = ((countURLValue / 1) * 100) + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('#microsite-total');
        progressText.textContent = countURLValue + ' dari {{ $micrositeStatus }}';
    </script>
    @else
    <script>
        var countURLValue = {{ $countMicrosite }};

        var progressBar = document.querySelector('#total-microsite');
        progressBar.style.width = ((countURLValue / {{ $micrositeStatus }}) * 100) + '%';
        progressBar.setAttribute('aria-valuenow', countURLValue);

        var progressText = document.querySelector('#microsite-total');
        progressText.textContent = countURLValue + ' dari {{ $micrositeStatus }}';
    </script>
    @endif

@endsection
