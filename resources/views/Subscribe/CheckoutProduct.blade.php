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

            .buttons {
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

        .keluar {
            background-color: transparent;
            border: 2px solid #FF2323;
            color: #FF2323;
            padding: 6px 10px;
            /* Mengatur jarak teks dari tepi tombol yang lebih kecil */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            /* Mengatur ukuran teks yang lebih kecil */
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
                                        <h4 class="mb-0" style="color:#0E2954;">Pilih metode pembayaran anda untuk
                                            melakukan</h4>
                                    </div>
                                </div>
                            </div>
                            @foreach ($channels as $channel)
                                <form id="myForm{{ $channel->code }}" action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <div class="card card-animate"
                                        style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                                        <div class="card-body">
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
                                                    <img class="card-img-top img-fluid" src="{{ $channel->icon_url }}"
                                                        style="object-fit: contain; width: 100px;height: 30px;margin-top: 1%;margin-right: 60%;"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="buttons">
                <button type="button" class="btn" onclick="showSweetAlert('{{ $channel->code }}')"
                        style="color: #fff;background-color: #0E2954; height: 100%;padding: 6px;">Pilih</button>
            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div id="bayar{{ $channel->code }}" class="modal fade" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <hr style="margin-top: 0;">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="rata">Harga Paket</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-center rata1">
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
                                                            <p class="rata1">
                                                                Rp.{{ number_format($channel->total_fee->flat, 0, ',', '.') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="rata">Total</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="rata1">
                                                                Rp.{{ number_format($channel->total_fee->flat + $subscribe->price, 0, ',', '.') }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button type="button"
                                                                class="btn btn-light btn-md keluar col-12"
                                                                data-bs-dismiss="modal" aria-label="close">Kembali</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-md col-12"
                                                                style="color: white; background-color: #088C0D">Bayar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </form>
                            @endforeach
                        </div>
                    </center>
                </div>

                <!--- Content2 --->
                <div class="mb-4 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <center>
                        <div class="col-10">
                            <div class="row">
                                @if ($subscribe->discount == null)
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">Langganan Pembelian</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="card card-animate"
                                            style="border-radius: 20px;background: #F0F0F0; margin: 0;">
                                            <div class="card-body">
                                                @if (strtolower(trim($subscribe->tipe)) === 'silver')
                                                    <h4 class="card-title mb-2 text-center">Silver</h4>
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                                    <h4 class="card-title mb-2 text-center">Gold</h4>
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                                    <h4 class="card-title mb-2 text-center">Platinum</h4>
                                                @else
                                                    <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
                                                @endif
                                            </div>
                                            <div class="card-body text-white"
                                                style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;height: auto;display: inline-block; min-height: 200px;">
                                                <img class="mt-3" src="{{ asset('pictureSubs/' . $subscribe->picture) }}" width="220"
                                                  height="150" style="display: block; margin: 0 auto; object-fit: cover;"
                                                 alt="Card image cap">
                                                <div class="row">
                                                    <h5 class="card-title text-center mt-3">
                                                        Rp.{{ number_format($subscribe->price, 0, ',', '.') }}/Bulan
                                                    </h5>
                                                </div>
                                                @if (strtolower(trim($subscribe->description)))
                                               <h6 style="color: #ffffff; font-size: 13px;">Paket dasar untuk meningkatkan</h6>
                                               <h6 style="color: #ffffff; font-size: 13px;">pengalaman pengguna</h6>
                                                @endif
                                                <div data-simplebar data-simplebar-auto-hide="false"
                                                    style="height: 300px;" class="px-3">
                                                    <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                                        {{ strip_tags($subscribe->description) }}
                                                    </div>
                                                    {{-- @if (strtolower(trim($subscribe->tipe)) === 'free')
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
                                </div> --> --}}
                                                    @if (strtolower(trim($subscribe->tipe)) === 'silver')
                                                    <div class="d-flex mt-4">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1">Menyingkat tautan batas sebanyak 25×/bulan</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite sebanyak 5×/bulan</p>
                                                        </div>
                                                    </div>
                                                        <!-- <div class="col-md-12 col-sm-12 mt-5">
                                    <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                        Sekarang</a>
                                </div> -->
                                                    @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                                    <div class="d-flex mt-4">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite batas sebanyak 35×/bulan</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite sebanyak 10×/bulan</p>
                                                        </div>
                                                    </div>
                                                        <!-- <div class="col-md-12 col-sm-12 mt-5">
                                    <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                        Sekarang</a>
                                </div> -->
                                                    @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                                    <div class="d-flex mt-4">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Menyingkat tautan tanpa batas</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite tanpa batas</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Menggunakan semua tema tanpa terkunci</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Memantau tautan dengan terperinci </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Memproteksi tautan dengan kata sandi</p>
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
                                @else
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">                                        
                                    </div>
                                    <div class="col-12">
                                        <div class="card card-animate"
                                            style="border-radius: 20px;background: #F0F0F0; margin: 0;">
                                            <div class="discount-label"
                                                style="position: absolute; top: -30px; right: -25px; background: radial-gradient(circle, #0E2954 50%, #ffffff 52%, #0E2954 55%); color: #ffffff; border-radius: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center; font-weight: bold; z-index: 2; padding: 10px; width: 80px; height: 80px; text-align: center; line-height: 1;">
                                                <img src="https://i.postimg.cc/nz2SmDrH/Bintang-5.png" style="width: 20px;" alt="vector">
                                                <span style="font-size: 12px;">
                                                    <span style="font-weight: normal;">Spesial</span>
                                                    <span style="font-weight: bold; color: yellow; white-space: nowrap;">{{$subscribe->type_of_discount}}</span>
                                                </span>
                                                <img src="https://i.postimg.cc/bNsVGdhh/Bintang-6.png" style="width: 20px;" alt="vector">
                                            </div>
                                            <div class="card-body">
                                                @if (strtolower(trim($subscribe->tipe)) === 'silver')
                                                    <h4 class="card-title mb-2 text-center">Silver</h4>
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                                    <h4 class="card-title mb-2 text-center">Gold</h4>
                                                @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                                    <h4 class="card-title mb-2 text-center">Platinum</h4>
                                                @else
                                                    <h4 class="card-title mb-2 text-center">Data Tidak Valid</h4>
                                                @endif
                                            </div>
                                            <div class="card-body text-white"
                                                style="background-image: linear-gradient(to bottom right, #0E2954, #104898); border-radius: 0 0 20px 20px;height: auto;display: inline-block; min-height: 200px;">
                                                <img class="mt-3" src="{{ asset('pictureSubs/' . $subscribe->picture) }}" width="220"
                                                  height="150" style="display: block; margin: 0 auto; object-fit: cover;"
                                                 alt="Card image cap">
                                                <div class="row">
                                                    <h5 class="card-title text-center mt-3 mb-2"
                                                        style="color: #ffffff; text-decoration: line-through; text-decoration-color: red;">
                                                        Rp.{{ number_format($subscribe->starting_price, 0, ',', '.') }}/Bulan
                                                    </h5>
                                                    <h2 class="mb-2" style="color: #ffffff;">
                                                        Rp.{{ number_format($subscribe->price, 0, ',', '.') }}/Bulan
                                                    </h2>
                                                </div>
                                                <div data-simplebar data-simplebar-auto-hide="false"
                                                    style="height: 300px;" class="px-3">
                                                    <div class="flex-grow-1 ms-2 text-white text-center">
                                                        <h6 style="color: #ffffff; font-size: 13px;">{{ strip_tags($subscribe->description) }}</h6>
                                                    </div>
                                                    {{-- @if (strtolower(trim($subscribe->tipe)) === 'free')
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
                                </div> --> --}}
                                                    @if (strtolower(trim($subscribe->tipe)) === 'silver')
                                                    <div class="d-flex mt-4">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1">Menyingkat tautan batas sebanyak 25×/bulan</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite sebanyak 5×/bulan</p>
                                                        </div>
                                                    </div>
                                                        <!-- <div class="col-md-12 col-sm-12 mt-5">
                                    <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                        Sekarang</a>
                                </div> -->
                                                    @elseif (strtolower(trim($subscribe->tipe)) === 'gold')
                                                    <div class="d-flex mt-4">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite batas sebanyak 35×/bulan</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite sebanyak 10×/bulan</p>
                                                        </div>
                                                    </div>
                                                        <!-- <div class="col-md-12 col-sm-12 mt-5">
                                    <a href="{{ route('subscribe.now', ['id' => $subscribe->id]) }}" type="button" class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                        Sekarang</a>
                                </div> -->
                                                    @elseif (strtolower(trim($subscribe->tipe)) === 'platinum')
                                                    <div class="d-flex mt-4">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Menyingkat tautan tanpa batas</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Membuat Microsite tanpa batas</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Menggunakan semua tema tanpa terkunci</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Memantau tautan dengan terperinci </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="col-1 align-self-start" style="color: #fff">
                                                            <i class="fa-solid fa-circle-check" style="margin-top: 5px;"></i>
                                                        </div>
                                                        <div class="col-11 text-white">
                                                            <p class="p1"> Memproteksi tautan dengan kata sandi</p>
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
                                @endif
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>

    </div>
    </div>
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function showSweetAlert(channelCode) {
        Swal.fire({
            title: 'Konfirmasi Pembayaran',
            text: 'Anda yakin memilih metode pembayaran ini?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "Ya, Pilih!", submit the form
                document.getElementById('myForm' + channelCode).submit();
            }
        });
    }
</script>
    @endsection
@endsection
