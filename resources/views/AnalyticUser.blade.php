    @extends('layout.app')

    @section('title','Analitik')

        @section('content')
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Analitik</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Real Estate</a></li>
                                        <li class="breadcrumb-item active">Earnings</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <div class="col">
                            <div class="card border-bottom border-2 card-animate border-secondary">
                                <div class="card-body">
                                    <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 9.3%</span>
                                    <h4 class="mb-4">$<span class="counter-value" data-target="798.97">0</span>M</h4>

                                    <p class="text-muted fw-medium text-uppercase mb-0">Jumlah tautan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-bottom border-2 card-animate border-primary">
                                <div class="card-body">
                                    <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 20.8%</span>
                                    <h4 class="mb-4">$<span class="counter-value" data-target="2356">0</span>k</h4>

                                    <p class="text-muted fw-medium text-uppercase mb-0">Pengunjung</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-bottom border-2 card-animate border-warning">
                                <div class="card-body">
                                    <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 12.6%</span>
                                    <h4 class="mb-4">$<span class="counter-value" data-target="337.32">0</span>M</h4>

                                    <p class="text-muted fw-medium text-uppercase mb-0">Pengunjung Unik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-bottom border-2 card-animate border-success">
                                <div class="card-body">
                                    <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 18.7%</span>
                                    <h4 class="mb-4">$<span class="counter-value" data-target="365.32">0</span>M</h4>

                                    <p class="text-muted fw-medium text-uppercase mb-0">Pengunjung Kode Unik</p>
                                </div>
                            </div>
                        </div>
                    </div><!---end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body pb-0 mb-n4">
                                    <div class="d-flex z-1 position-relative">
                                        <div class="flex-shrink-0">
                                            <div data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-default-date="01 March 2023 to 31 March 2023">01 March 2023 to 31 March 2023 <i class="ph-caret-down align-middle ms-1"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0 mt-4 mt-md-0">
                                    <div id="line_chart_basic" data-colors='["--tb-primary", "--tb-danger"]' class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div>
                        <button type="button" class="btn btn-primary bg-gradient">Data Populer</button>
                        <button type="button" class="btn btn-primary bg-gradient">Data Tambahan</button>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" id="agenciesList">
                                <div class="card-header">
                                    <i class="bx bx-star"></i> Tautan Populer
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col number">1.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col number">2.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col number">3.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card" id="agenciesList">
                                <div class="card-header">
                                    <i class="bx bx-heart"></i> Microsite Populer
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col number">1.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col number">2.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col number">3.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>

                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="card" id="agenciesList">
                                <div class="card-header">
                                    <i class="bi bi-qr-code-scan"></i> Pengunjung Kode QR
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col number">1.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col number">2.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col number">3.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>

                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    {{-- <div class="row">
                        <div class="col-lg-6">
                            <div class="card" id="agenciesList">
                                <div class="card-header">
                                    <i class="bx bx-star"></i> Tautan Populer
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col number">1.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card" id="agenciesList">
                                <div class="card-header">
                                    <i class="bx bx-heart"></i> Microsite Populer
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col number">1.</div>
                                        <div class="col name">link.id/8FCO2</div>
                                        <div class="col age">0 Pengunjung</div>
                                    </div>

                                </div>
                            </div>
                        </div><!--end col-->
                    </div> --}}

                </div>
                <!-- container-fluid -->
            </div>
        @endsection
@section('script')
<!-- apexcharts -->
<script src="{{ asset ('template/themesbrand.com/steex/layouts/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- real estate earnings init JS -->
<script src="{{ asset ('template/themesbrand.com/steex/layouts/assets/js/pages/real-estate-earnings.init.js')}}"></script>
@endsection
