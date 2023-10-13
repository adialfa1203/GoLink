@extends('layout.user.app')

@section('title', 'Berlangganan')
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
            <div class="row">
                @foreach ($subscribe as $subs)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top img-fluid mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}"
                                style="display: block; margin: 0 auto; width: 80%;" alt="Card image cap">
                            <br>
                            <div class="card-body text-center">
                                <h2 class="mb-2">Rp.{{ number_format($subs->number, 0, ',', '.') }}</h2>
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
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@section('script')
    <!-- nouisliderribute js -->
    <script src="{{ asset('assets/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>

    <!-- ecommerce-product-grid-list js -->
    <script src="{{ asset('assets/js/pages/ecommerce-product-grid-list.init.js') }}"></script>
@endsection
