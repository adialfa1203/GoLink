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
@media (min-width: 1025px) {

/* Atur gaya CSS khusus untuk perangkat laptop di sini */
.kotak {
    /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}
}


    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="card">
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
                </div>
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
                <div class="kotak">
                    @foreach ($subscribe as $subs)
                        @php
                            $i++;
                        @endphp
                     
                        {{-- bts --}}
                         <div class="row text-center">
                        <div class="col-md-12">
                            <div class="card1" style="border-radius: 15px;
                            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);">
                                 <h5 class="card-title mb-2" style="font-weight: bold; color:#0E2954;">
                                        @if (strtolower(trim($subs->tipe)) === 'free')
                                            <span class="">Gratis</span>
                                        @elseif (strtolower(trim($subs->tipe)) === 'silver')
                                            <span class="">Silver</span>
                                        @elseif (strtolower(trim($subs->tipe)) === 'gold')
                                            <span class="">Gold</span>
                                        @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                                            <span class="">Platinum</span>
                                        @else
                                            <span class="">Data Kosong</span>
                                        @endif
                                    </h5>
                            </div>
                            <div class="card mb-3" style="background-color: #104898;height: 620px;">
                                <div class="text-center">
                                    <img class="mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" width="260"
                                    height="160" style="display: block; margin: 0 auto; object-fit: cover;"
                                    alt="Card image cap">
                                    <br>
                                    <h2 class="mb-2" style="color: #ffffff;">Rp.{{ number_format($subs->price, 0, ',', '.') }}/Bulan</h2>
                                    <h6 style="color: #ffffff; font-size: 13px;">Paket dasar untuk meningkatkan</h6>
                                    <h6 style="color: #ffffff; font-size: 13px;">pengalaman pengguna</h6>
                                </div>
                                
                                <div data-simplebar data-simplebar-auto-hide="false" style="height: 300px;" class="px-3">
                                    <div class="flex-grow-1 ms-2 mt-2 text-white text-center">
                                        {{ strip_tags($subs->description) }}
                                    </div>
                                    @if (strtolower(trim($subs->tipe)) === 'free')
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
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan Sekarang</a>
                                    </div> -->
                                    @elseif (strtolower(trim($subs->tipe)) === 'silver')
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
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top: 180px;">Berlangganan
                                            Sekarang</a>
                                    </div> -->
                                    @elseif (strtolower(trim($subs->tipe)) === 'gold')
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
                                        <a href="{{ route('subscribe.now', ['id' => $subs->id]) }}" type="button" class="btn custom col-12" style="margin-top:155px;">Berlangganan
                                            Sekarang</a>
                                    </div> -->
                                    @elseif (strtolower(trim($subs->tipe)) === 'platinum')
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
                                <center>
                                <div class="col-10 mb-2 ">
                                    <a href="{{ url('user/subscribe-product-user') }}" type="button" class="btn btn-outline-warning mx-auto" style="margin-top: -30px;">Mulai Berlangganan</a>
                                </div>
                            </center>
                                
                            </div>

                        </div>
                         </div>
                    {{-- batas --}}
                   
                    @endforeach
                </div>
                @endif
            </div>
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
