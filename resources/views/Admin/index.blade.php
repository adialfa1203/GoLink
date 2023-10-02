    @extends('layout.admin.app')

    @section('title', 'Beranda')
    @section('style')
        <style>
                .page-content{
            overflow-x: hidden;
          }
            @import url(https://fonts.googleapis.com/css?family=Roboto);

            body {
                font-family: Roboto, sans-serif;
            }

            #chart {
                max-width: 650px;
                margin: 35px auto;
            }

            .custom-icon-size {
                font-size: 30px;
                /* Ubah ukuran font sesuai kebutuhan Anda */
                color: #fafafa;
                /* Warna merah muda */
            }

            .text-white {
                color: white !important;
            }
        </style>
    @endsection
    @section('content')
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card border-bottom border-2 card-animate">
                            <div class="card-body bg-success">
                                <h5 class="fs-md text-muted mb-0 text-white">Pengguna</h5>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <i class="fa-solid fa-user custom-icon-size" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="col-10">
                                        <h3 class="mb-4 custom-icon-size" style="float: right;">
                                            <span class="counter-value" data-target="{{($totalUser)}}">{{($totalUser)}}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card border-bottom border-2 card-animate">
                            <div class="card-body bg-primary">
                                <h5 class="fs-md text-muted mb-0 text-white">Tautan</h5>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <i class="fa-solid fa-link custom-icon-size" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="col-10">
                                        <h3 class="mb-4 custom-icon-size" style="float: right;">
                                            <span class="counter-value" data-target="{{($totalUrl)}}">{{($totalUrl)}}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <!-- Card 3 -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card border-bottom border-2 card-animate">
                            <div class="card-body bg-warning">
                                <h5 class="fs-md text-muted mb-0 text-white">Pengunjung</h5>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <i class="fa-solid fa-user custom-icon-size" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="col-10">
                                        <h3 class="mb-4 custom-icon-size" style="float: right;">
                                            <span class="counter-value" data-target="{{($totalVisits)}}">{{($totalVisits)}}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card border-bottom border-2 card-animate">
                            <div class="card-body" style="background-color : #FF6C6C">
                                <h5 class="fs-md text-muted mb-0 text-white">Berlangganan</h5>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <i class="fa-solid fa-thumbs-up custom-icon-size" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="col-10">
                                        <h3 class="mb-4 custom-icon-size" style="float: right;">
                                            <span class="counter-value" data-target="">0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div>
                    <h5 class="mb-sm-0">Rincian Data</h5>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body pb-0 mb-n4">
                                <div class="d-flex z-1 position-relative"></div>
                                <div class="card-body pt-0">
                                    <div id="chartDataDashboard" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script>
            function updateChart() {
                $.ajax({
                    url: "{{ route('dashboard.chart') }}",
                    method: "GET",
                    success: function(data) {
                        console.log(data);

                        var options = {
                            chart: {
                                height: 100,
                                type: "line",
                                stacked: false
                            },
                            dataLabels: {
                                enabled: false
                            },
                            colors: ["#2DCB73", "#3762EA", "#F6B749"],
                            series: [{
                                    name: "Data Total User",
                                    data: data.result.series.totalUser
                                },
                                {
                                    name: "Data Total URL",
                                    data: data.result.series.totalUrl
                                },
                                {
                                    name: "Data Total Pengunjung",
                                    data: data.result.series.totalVisits
                                }
                            ],
                            stroke: {
                                width: [4, 4, 4]
                            },
                            plotOptions: {
                                bar: {
                                    columnWidth: "20%"
                                }
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: data.result.labels
                            },
                            yaxis: [{
                                axisTicks: {
                                    show: true
                                },
                                axisBorder: {
                                    show: true,
                                    color: "#FF1654"
                                },
                                labels: {
                                    style: {
                                        colors: "#FF1654"
                                    }
                                }
                            }],
                            tooltip: {
                                shared: true,
                                intersect: false,
                                x: {
                                    show: false
                                }
                            },
                            legend: {
                                horizontalAlign: "left",
                                offsetX: 40
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chartDataDashboard"), options);
                        chart.render();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            updateChart();
        </script> --}}
        <script>
            function updateChart() {
                $.ajax({
                    url: "{{ route('dashboard.chart') }}",
                    method: "GET",
                    success: function(data) {
                        console.log(data);

                        var options = {
                            chart: {
                                type: 'line'
                            },
                            colors: ["#2DCB73", "#3762EA", "#F6B749"],
                            series: [{
                                name: 'Data Total User',
                                data: data.result.series.totalUser
                            }, {
                                name: 'Data Total Url',
                                data: data.result.series.totalUrl
                            }, {
                                name: 'Data Total Visits',
                                data: data.result.series.totalVisits
                            }],
                            xaxis: {
                                categories: data.result.labels
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chartDataDashboard"), options);
                        chart.render();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            updateChart();
        </script>


    @endsection
