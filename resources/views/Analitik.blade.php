@extends('layout.user.app')

@section('title', 'Analitik')

@section('style')
<style>
    /* Styles for card and counter values */
    .card {
        border-radius: 10px;
    }

    .counter-value {
        display: inline-block;
        margin: 0;
        padding: 5px;
        font-size: 18px;
    }

    .col-xl-3 {
        text-align: center;
    }

    /* Styles for note-box and color-box */
    .note-box {
        display: flex;
        justify-content: center;
    }

    .small-note {
        font-size: 12px;
        margin-bottom: -1px;
        margin-right: 3%;
    }

    .color-box {
        width: 15px;
        height: 15px;
        position: absolute;
        left: 15%;
        transform: translateX(-50%);
        bottom: auto;
        border-radius: 20%;
    }

    .red {
        color: red;
    }
    .custom-margin-top {
        margin-top: 20px; /* Sesuaikan dengan nilai yang diinginkan */
    }
</style>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="mb-4">
            <span class="badge" style="background-color: #104898">
                <i class="far fa-calendar mr-2"></i>
                4 Agustus 2024 - 4 Agustus 2023
            </span>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="card-header">
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                            <div class="col-6 col-md-5">
                                <img src="https://i.postimg.cc/RhRNzvgY/qr.png" width="100" height="100">
                            </div>
                            <div class="col-2">
                                <div class="d-flex flex-column align-items-md-start" style="margin-left: 15px;">
                                    <h6 class="md-4">Adi</h6>
                                    <h6 class="md-4" style="color:#DC3545;">Shortlink<span style="color: #104898;">.id/Adi</span></h6>
                                    <span class="badge" style="background-color:#4A2579">Microsite</span>
                                </div>
                            </div>
                        </div>                                                
                       
                        <div class="row col-9 ms-auto">
                            <div class="col-2 ms-auto ">
                                <div class="row mt-0">
                                    <div class="col-12 ms-auto">
                                        <div class="align-items-center justify-content-end">
                                            <div class="counter-value mr-2" data-target="0">0</div>
                                            <div class="note-box d-flex">
                                                <div class="color-box" style="background-color: rgb(16, 143, 233); margin-bottom: auto;"></div>
                                                <div class="small-note" style="color: rgb(16, 143, 233); white-space: nowrap; margin-top: auto;">Litetime visitor</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row mt-0">
                                    <div class="col-12">
                                        <div class="align-items-center justify-content-end">
                                            <div class="counter-value mr-2" data-target="0">0</div>
                                            <div class="note-box d-flex">
                                                <div class="color-box" style="background-color: #DC3545; margin-top: auto;"></div>
                                                <div class="small-note" style="color: #DC3545; white-space: nowrap; margin-bottom: auto;">Pengunjung</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row mt-0">
                                    <div class="col-12">
                                        <div class="align-items-center justify-content-end">
                                            <div class="counter-value mr-2" data-target="0">0</div>
                                            <div class="note-box d-flex">
                                                <div class="color-box" style="background-color: purple; margin-bottom: auto;"></div>
                                                <div class="small-note" style="color: purple; white-space: nowrap; margin-top: auto; margin-left:auto;"> Pengunjung Unik</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row mt-0">
                                    <div class="col-12">
                                        <div class="align-items-center justify-content-end">
                                            <div class="counter-value mr-2" data-target="0">0</div>
                                            <div class="note-box d-flex">
                                                <div class="color-box" style="background-color: orange; margin-bottom: auto;"></div>
                                                <div class="small-note" style="color: orange; white-space: nowrap; margin-top: auto; margin-left:auto;"> Pengunjung click</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->                                                
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn rounded-pill btn-danger btn-sm">Download QR</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="chart2"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/apexcharts-column.init.js') }}"></script>
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/plugins.js') }}"></script>
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/app.js') }}"></script>
<script>
    var options = {
        series: [{
            name: "sunardi",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
        chart: {
            height: 350,
            type: 'bar',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: '',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();
</script>
@endsection