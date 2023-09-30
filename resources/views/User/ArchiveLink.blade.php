@extends('layout.user.app')

@section('title','Link')
@section('style')
<style>
    .card-header .col-12 {
        margin-bottom: 0.25rem;
        /* Sesuaikan jarak vertikal sesuai kebutuhan */
    }

    .card-header h6,
    .card-header h5,
    .card-header p {
        margin: 0;
        /* Hapus margin bawaan */
    }

    .card-header h6 {
        margin-right: 0.5rem;
        /* Jarak kanan untuk h6 */
    }

    .isi {
        border: 2px solid #7B7B7B;
        border-radius: 10px;
        padding-top: 5px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .card-footer {
        padding-top: 10px;
        padding-bottom: 5px;
        border-top: 1px solid var(--tb-border-color-translucent)
    }

    /* Gaya untuk tag <a> saat cursor di atasnya */
    .garisbawah:hover {
        text-decoration: underline;
        /* Menambahkan garis bawah saat cursor di atasnya */
    }

    a:hover {
        text-decoration: underline;
        /* Menambahkan garis bawah saat cursor di atasnya */
    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="d-flex flex-column flex-sm-row mb-3" >
        <div class="col-12 col-sm-4">
            <h5 class="mb-2">Riwayat Link</h5>
            <p id="clickCount" hidden>0 klik</p>
        </div>
        <div class="col-12 col-sm-8">
            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-sm-end">
                <div class="search-box mb-2 mb-sm-0">
                    <input type="text" class="form-control search" placeholder="Cari...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($data as $row)
        <form action="/restore/{{$row->id}}">
            <div class="col-lg-12">
                <div class="card" style="border: 1px solid var(--tb-border-color-translucent); padding: 0px;">
                    <div class="card-body">
                        <div class="d-flex">
                            <h6 class="col-3">{{ $row->title }}</h6>
                            {{-- <div class=" col-9 d-flex flex-row justify-content-end">
                                <button type="button" class="btn btn-primary me-3 btn-sm" data-bs-target="#arsip{{$row->id}}" data-bs-toggle="modal"><i class="bi bi-archive-fill"></i> Buka Arsipan</button>
                            </div> --}}
                        </div>
                            <a>
                                <h3 class="garisbawah card-title mb-2">{{$row->default_short_url}}</h3>
                            </a>
                            <a href="{{$row->destination_url}}" class="card-subtitle font-14 text-muted">{{$row->destination_url}}</a>
                        </div>
                        {{-- modal hapus --}}
                        <div class="modal fade" id="arsip{{$row->id}}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="/restore/{{$row->id}}" method="GET">
                                    <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                      <h4 style="font-size: 19px">Yakin Ingin Membuka Arsip?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-xs hover-red" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary btn-xs form-control1">Ya</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                <div class="col-3">
                                    <p style="margin-top: 10px;">{{ \Carbon\Carbon::parse($row->deactivated_at)->format('F j, Y, h:i A') }}</p>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample112">
                                <div class="card mb-0">
                                <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Basic Line Chart</h4>
                                        </div><!-- end card header -->

                                        <div class="card-body">
                                            <div id="chart" ></div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
            <div class="row align-items-center mb-4 justify-content-between text-center text-sm-start" id="pagination-element">
                {{-- <div class="col-sm">
                    <div class="text-muted">
                        Showing <span class="fw-semibold">{{ $data->firstItem() }}</span>
                        to <span class="fw-semibold">{{ $data->lastItem() }}</span>
                        of <span class="fw-semibold">{{ $data->total() }}</span> Results
                    </div>
                </div> --}}
                <div class="col-sm-auto mt-3 mt-sm-0">
                    <div class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                        <div class="page-item">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- container-fluid -->
    </div>
    @section('script')
    <script>
        var options = {
            series: [{
                name: "sunardi",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            chart: {
            height: 350,
            type: 'line',
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
            text: 'Product Trends by Month',
            align: 'left'
            },
            grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
            },
            xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

    </script>
<script src="{{asset('template/themesbrand.com/steex/layouts/assets/js/pages/password-addon.init.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#resetButton").click(function() {
                $(".password-input").val(""); // Mengosongkan input kata sandi
            });
        // Menangani klik pada tombol Reset untuk modal tautan berjangka
        $("#time-reset").click(function() {
            $(".time-input").val(""); // Mengosongkan input tanggal dan waktu
        });
    });
</script>
{{-- <script>
    function restore() {
        message = confirm('Apakah Anda Ingin Memulihkan Tautan?');
        if(message){
            window.location.reload();
        }
    }
</script> --}}
<script>
    $(document).ready(function () {
        $("#toggleButton").click(function () {
            $("#tautanberjangka").collapse('toggle');
            var buttonText = $(this).text();
            if (buttonText.trim() === "Tampilkan lebih banyak") {
                $(this).html('Tampilkan lebih sedikit <i class="fa-solid fa-angle-up"></i>');
            } else {
                $(this).html('Tampilkan lebih banyak <i class="fa-solid fa-angle-down"></i>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.search').keyup(function() {
            var searchText = $(this).val().toLowerCase();
            $('.card').each(function() {
                var cardText = $(this).text().toLowerCase();
                if (cardText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection
@endsection
