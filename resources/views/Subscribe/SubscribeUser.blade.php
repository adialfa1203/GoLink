@extends('layout.user.app')
@section('title', 'Berlangganan')

@section('content')
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Berlangganan</h4>

                                {{-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div id="productList">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="wrapper d-flex align-items-center">
                                            {{-- <div class="avatar-md">
                                                <div class="avatar-title bg-success-subtle text-success fs-xl rounded mx-3">
                                                    <img class="card-img-top img-fluid" src="{{ asset('plugin/cat-berlangganan.jpg') }}" style="display: block; margin: 0 auto; width: 80%;" alt="Card image cap">
                                                </div>
                                            </div> --}}
                                            <img class="card-img-top img-fluid" src="{{ asset('plugin/cat-free.jpg') }}" style="width: 15%;" alt="Card image cap">

                                            <div style="margin-left: 2%;">
                                                <h6 class="card-title long-text">MiLink - Layanan Gratis (Selamanya)</h6>
                                                <p class="card-text text-muted long-text">Anda menggunakan layanan gratis dari MiLink</p>
                                            </div>
                                            <div style="margin-left:30%;"  >
                                                <a href="/subscribe-product-user" type="button" class="btn btn-outline-danger">Berlangganan Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <div>

                            <a href="">Lihat semua layanan kami di sini!</a>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="card-title mb-0">Riwayat Transaksi Terakhir</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered align-middle table-nowrap mb-0">
                                                <thead class="table-active">
                                                    <tr>
                                                        <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="option" id="checkAll">
                                                                <label class="form-check-label" for="checkAll"></label>
                                                            </div>
                                                        </th>
                                                        <th class="sort cursor-pointer" data-sort="products">Tanggal Bayar</th>
                                                        <th class="sort cursor-pointer" data-sort="category">Layanan</th>
                                                        <th class="sort cursor-pointer" data-sort="stock">Metode</th>
                                                        <th class="sort cursor-pointer" data-sort="price">Harga</th>

                                                    </tr>
                                                </thead>

                                            </table>
                                        </div><!--end table-responsive-->

                                        <div class="noresult" style="display: none">
                                            <div class="text-center py-4">
                                                <div class="avatar-md mx-auto mb-4">
                                                    <div class="avatar-title bg-light text-primary rounded-circle fs-4xl">
                                                        <i class="bi bi-search"></i>
                                                    </div>
                                                </div>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 150+ products We did not find any products for you search.</p>
                                            </div>
                                        </div>
                                        <!-- end noresult -->

                                        <div class="row mt-3 align-items-center" id="pagination-element">
                                            <div class="col-sm">
                                                <div class="text-muted text-center text-sm-start">
                                                    Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">35</span> Results
                                                </div>
                                            </div>

                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-wrap hstack gap-2 justify-content-center">
                                                    <a class="page-item pagination-prev disabled" href="#">
                                                        <i class="mdi mdi-chevron-left align-middle"></i>
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                                    <a class="page-item pagination-next" href="#">
                                                        <i class="mdi mdi-chevron-right align-middle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end pagination-element -->
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
        @endsection
