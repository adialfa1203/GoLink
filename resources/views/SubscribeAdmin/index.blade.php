@extends('layout.admin.app')

@section('title', 'Berlangganan')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Berlangganan </h4>

                        {{-- <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                          <li class="breadcrumb-item active">Products Grid</li>
                      </ol>
                  </div> --}}

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div>
                <a href="{{ url('admin/add-subscribe') }}"> <button type="button" class="btn btn-success">Tambah</button></a>

            </div><br>
            {{-- <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <img class="card-img-top img-fluid mt-3" src="{{ asset('plugin/cat-berlangganan.jpg') }}"
                        style="display: block; margin: 0 auto; width: 80%;" alt="Card image cap">
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
                @foreach ($subscribe as $subs)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top img-fluid mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}"
                                style="display: block; margin: 0 auto; width: 80%;" alt="Card image cap">
                            <br>
                            <div class="card-body text-center">
                                <h2 class="mb-2">Rp.{{ number_format($subs->price, 0, ',', '.') }}</h2>
                                <h4 class="card-title mb-2">
                                    @if (strtolower(trim($subs->tipe)) === 'gratis')
                                        <span class="badge bg-success">{{ $subs->tipe }}</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'dasar')
                                        <span class="badge bg-primary">{{ $subs->tipe }}</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'menengah')
                                        <span class="badge bg-warning">{{ $subs->tipe }}</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'premium')
                                        <span class="badge bg-danger">{{ $subs->tipe }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $subs->tipe }}</span>
                                    @endif
                                </h4>
                                <p class="card-text">{{ strip_tags($subs->description) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @section('script')
        <script></script>
    @endsection
@endsection
