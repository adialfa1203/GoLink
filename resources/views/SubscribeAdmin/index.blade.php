@extends('layout.admin.app')

@section('title', 'Berlangganan')
@section('style')
    <style>
        .page-content {
                overflow-x: hidden;
                background-color: #fff;
            }
 .col-6.mb-9.d-flex.justify-content-end a {
    position: relative;
    top: -40px; /* Sesuaikan sesuai kebutuhan */
}
.elemen-sebelumnya {
    margin-bottom: 20px; /* Sesuaikan sesuai kebutuhan */
}

.col-6.mb-9.d-flex.justify-content-center {
    display: flex;
    justify-content: center;
    align-items: center;
}
.col-6.mb-9.d-flex.justify-content-end {
    text-align: center;
}
.card1 {
            background: linear-gradient(to bottom, #F0F0F0, #F0F0F0);
            font-weight: bold;
            color: #000;
            /* Mengatur warna teks menjadi hitam */
            padding: 10px;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .p1 {
            text-align: left;
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .three-dots {
    cursor: pointer; /* Show a pointer cursor on hover */
    color: #007bff; /* Set the color to blue (or your desired color) */
}

.three-dots:hover {
    text-decoration: underline; /* Underline the text on hover */
}


@media (min-width: 1025px) {

/* Atur gaya CSS khusus untuk perangkat laptop di sini */
.kotak {
    /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    }
}
.bagcard {
       border-radius: 20px;
       background:linear-gradient(0deg, #0E2954,);
       box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
   }
   .warna {
            color: #104898 ;
        }

        .card {
            background: linear-gradient(0deg, #0E2954, );
            color: #ffffff;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* text-align: center; */
        }

        .card1 {
            background: linear-gradient(to bottom, #F0F0F0, #F0F0F0);
            font-weight: bold;
            color: #000;
            /* Mengatur warna teks menjadi hitam */
            padding: 10px;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card2 {
            background: linear-gradient(0deg, #0E2954,  #104898);
            color: #ffffff;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .p1 {
            text-align: left;
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .btn.custom {
            display: block;
            margin: 0 auto;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid ">

            <!-- start page title -->
            <div class="col-lg-12">
                {{-- <div class="card"> --}}
                    {{-- <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Berlangganan </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Products Grid</li>
                                </ol>
                            </div>

                        </div>
                    </div> --}}
                {{-- </div> --}}
            </div>
            <!-- end page title -->
            <div >
                <a class="btn btn-label" style="background-color: #088C0D; color:#fff;" href="{{ url('admin/add-subscribe') }}" role="button">
                    <i class="ri-add-line label-icon align-middle fs-lg ms-2" style="color: #fff;"></i>Tambah Kategori
                </a>
            </div>
            {{-- <div>
                <a href="{{ url('admin/add-subscribe') }}">
                    <button type="button" class="btn btn-custom" style="background-color: #088C0D; color: white;"><i class="bi bi-plus"></i>Tambah Berlangganan</button>
                </a>
            </div> --}}
            <br>
            {{-- <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <img class="card-img-top img-fluid mt-3" src="{{ asset('plugin/cat-berlangganan.jpg') }}"
        style="display: block; margin: 0 auto; width: 80%; height: 50%;" alt="Card image cap">
        <br>
        <div class="card-body text-center">
            <h2 class=" mb-2">Rp:0</h2>
            <h4 class="card-title mb-2">Gratis</h4>
            <p class="card-text">Paket Dasar untuk memulai perjalanan Anda bersama kami</p>
            <p>Benar-benar Gratis</p>
        </div>
    </div>
</div> --}}
            <div class="row">
                @php
                    $i = 0;
                @endphp
                @if ($subscribe->isEmpty())
                    <div class="card d-flex flex-column align-items-center">
                        <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.png') }}" alt="Gambar">
                        <div class="d-flex justify-content-center align-items-center mt-2 mb-4">
                            <i class="ph-magnifying-glass fs-2 text-primary"></i>
                            <h5 class="mt-2">Maaf! Belum Ada Data Yang Ditemukan</h5>
                        </div>
                    </div>
                @else
            </div>
                <div class="kotak">
                    @foreach ($subscribe as $subs)
                        @php
                            $i++;
                        @endphp

                        {{-- bts --}}
                         <div class="row text-center">
                            <div class="col-12">
                                <div class="card1" style="position: relative; background-color:#F0F0F0;">
                                    <h5 style="font-weight: bold; color:#0E2954; margin-top:10px;">
                                        @if (strtolower(trim($subs->tipe)) === 'silver')
                                            <span class="">Silver</span>
                                        @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                            <span class="">Gold</span>
                                        @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                            <span class="">Platinum</span>
                                        @else
                                            <span class="">Data Kosong</span>
                                        @endif
                                    </h5>

                                    <div class="dropdown" style="position: absolute; top: 0; right: 0;">
                                        <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li> <a class="dropdown-item" href="{{ route('edit.subscribe', ['id' => $subs->id]) }}">Edit</a></li>
                                            <li><button type="button" class="dropdown-item" onclick="confirmDelete('{{ $subs->id }}')">Hapus</button></li>
                                        </ul>
                                    </div>
                                </div>

                            <div class="card2 mb-3" style="background-color: #104898;height: 620px;">
                                <div class="text-center">
                                    <img class="mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" width="260"
                                    height="190" style="display: block; margin: 0 auto; object-fit: cover;"
                                    alt="Card image cap">
                                    <br>
                                    <h2 class="mb-2" style="color: #ffffff;">Rp.{{ number_format($subs->price, 0, ',', '.') }}/Bulan</h2>                                    
                                </div>

                                <div data-simplebar data-simplebar-auto-hide="false" style="height: 300px;" class="px-3">
                                    <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                        <h6 style="color: #ffffff; font-size: 13px;">{{ strip_tags($subs->description) }}</h6>
                                    </div>

                                    @if (strtolower(trim($subs->tipe)) === 'silver')
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
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                            Sekarang</a>
                                    </div> -->
                                    @elseif (strtolower(trim($subs->tipe)) === 'gold')
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
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                            Sekarang</a>
                                    </div> -->
                                    @elseif (strtolower(trim($subs->tipe)) === 'platinum')
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
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 65px;">Berlangganan
                                            Sekarang</a>
                                    </div> -->
                                    @endif
                                </div>
                                {{-- <center>
                                <div class="col-10 mb-2 ">
                                    <a href="{{ url('user/subscribe-product-user') }}" type="button" class="btn btn-outline-warning mx-auto" style="margin-top: -30px;">Mulai Berlangganan</a>
                                </div>
                            </center> --}}

                            </div>

                        </div>
                         </div>
                    {{-- batas --}}

                    @endforeach
                </div>
                @endif

        </div>

    @section('script')

        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/admin/delete-subscribe/' + id;
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Dibatalkan',
                            'Data tetap aman :)',
                            'error'
                        );
                    }
                });
            }
        </script>
    @endsection
@endsection
