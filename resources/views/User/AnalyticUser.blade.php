@extends('layout.user.app')

@section('title', 'Analitik')

@section('style')
<style>
    .page-content {
        overflow-x: hidden;
    }

    .bg-custom {
        background-color: #CDF0EA;
    }
</style>
<style>
    .btn.btn-subtle-primary {
        background-color: transparent;
        color: #007bff;
        /* Warna teks default */
    }

    /* Hover style */
    .btn.btn-subtle-primary:hover {
        background-color: #007bff;
        /* Warna latar belakang saat dihover */
        color: #fff;
        /* Warna teks saat dihover */
    }

    /* Gaya untuk tombol yang aktif */
    .btn.btn-subtle-primary.active-hover {
        background-color: #007bff;
        /* Warna latar belakang saat aktif */
        color: #fff;
        /* Warna teks saat aktif */
    }

    /* CSS untuk perangkat laptop (misalnya, lebar layar antara 1025px dan 1440px) */
    @media (min-width: 1025px) {
        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        #popularDataContainer{
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }
    @media (min-width: 1025px) {
        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        #additionalDataContainer{
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
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
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Analitik</h4>

                    {{-- <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Real Estate</a></li>
                                    <li class="breadcrumb-item active">Earnings</li>
                                </ol>
                            </div> --}}

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate border-primary">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <h4 class="mb-4"><span class="counter-value" data-target="{{ $countURL }}">{{ $countURL }}</span></h4>
                        <p class="text-muted fw-medium text-uppercase mb-0">Jumlah tautan</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate border-success">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <h4 class="mb-4"><span class="counter-value" data-target="{{ $totalVisits }}">{{ $totalVisits }}</span></h4>
                        <p class="text-muted fw-medium text-uppercase mb-0">Pengunjung Tautan</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate border-warning">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <h4 class="mb-4"><span class="counter-value" data-target="{{ $countMicrosite }}">{{ $countMicrosite }}</span></h4>
                        <p class="text-muted fw-medium text-uppercase mb-0">Jumlah Microsite</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-bottom border-2 card-animate border-danger">
                    <div class="card-body">
                        <span class="badge bg-success-subtle text-success float-end"></span>
                        <h4 class="mb-4"><span class="counter-value" data-target="{{ $totalVisitsMicrosite }}">{{ $totalVisitsMicrosite }}</span></h4>
                        <p class="text-muted fw-medium text-uppercase mb-0">Pengunjung Microsite</p>
                    </div>
                </div>
            </div>
        </div>
        <!---end row-->
        <div>
            <h5 class="mb-sm-0">Lini Masa</h5>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
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
        </div><!--end row-->
        <div>
            <button type="button" class="btn btn-subtle-primary active-hover" id="showPopularData" onclick="toggleHover('showPopularData')">Data Populer</button>
            <button type="button" class="btn btn-subtle-primary" id="showAdditionalData" onclick="toggleHover('showAdditionalData')">Data Tambahan</button>
        </div>
        <br>
        <div class="row">
            <div id="popularDataContainer">
                <div class="">
                    <div class="card" id="agenciesList">
                        <div class="card-header fw-bold">
                            Tautan Populer
                        </div>
                        <div class="card-body">
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
                    <div class="card" id="agenciesList">
                        <div class="card-header fw-bold">
                            Microsite Populer
                        </div>
                        <div class="card-body">
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
                <div class="">
                    <div class="card" id="agenciesList">
                        <div class="card-header fw-bold">
                            <div>
                                Referer Teratas
                            </div><br>
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-custom text-primary fs-xl rounded">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">

                            <h4 class="card-title">Anda Tidak Bisa Mengakses Fitur Ini!</h4>
                            <p class="card-text text-muted">Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati
                                Fitur Ini</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url ('user/subscribe-product-user')}}" style="color :red;"> Mulai Berlangganan? </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card">
                        <div class="card-header fw-bold">
                            <div>
                                Wilayah Teratas
                            </div><br>
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-custom text-primary fs-xl rounded">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">

                            <h4 class="card-title">Anda Tidak Bisa Mengakses Fitur Ini!</h4>
                            <p class="card-text text-muted">Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati
                                Fitur Ini</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url ('user/subscribe-product-user')}}" style="color :red;"> Mulai Berlangganan? </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card">
                        <div class="card-header fw-bold">
                            <div>
                                Browser Teratas
                            </div><br>
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-custom text-primary fs-xl rounded">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">

                            <h4 class="card-title">Anda Tidak Bisa Mengakses Fitur Ini!</h4>
                            <p class="card-text text-muted">Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati
                                Fitur Ini</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url ('user/subscribe-product-user')}}" style="color :red;"> Mulai Berlangganan? </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card">
                        <div class="card-header fw-bold">
                            <div>
                                Perangkat Teratas
                            </div><br>
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-custom text-primary fs-xl rounded">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">

                            <h4 class="card-title">Anda Tidak Bisa Mengakses Fitur Ini!</h4>
                            <p class="card-text text-muted">Anda perlu Beralih ke Berlangganan Untuk Bisa Menikmati
                                Fitur Ini</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url ('user/subscribe-product-user')}}" style="color :red;"> Mulai Berlangganan? </a>
                        </div>
                    </div>
                </div>
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
                            colors: ['transparent']
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
                        }
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

@endsection
