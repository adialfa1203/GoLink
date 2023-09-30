@extends('layout.app')

@section('title','Link')
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card border-bottom border-2 card-animate border-secondary">
                <div class="card-body">
                    <h5 class="fs-md text-muted mb-0">Pengguna</h5>

                    <div class="row mt-3">
                        <div class="col-2">
                            <i class="fa-solid fa-user" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-10">
                            <h3 class="mb-4" style="float: right;"><span class="counter-value" data-target="291.32">0</span> </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xl-4 col-sm-6">
            <div class="card border-bottom border-2 card-animate border-primary">
                <div class="card-body">
                    <h5 class="fs-md text-muted mb-0">Tautan</h5>

                    <div class="row mt-3">
                        <div class="col-2">
                            <i class="fa-solid fa-link" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-10">
                            <h3 class="mb-4" style="float: right;"><span class="counter-value" data-target="291.32">0</span> </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xl-4 col-sm-6">
            <div class="card border-bottom border-2 card-animate border-warning">
                <div class="card-body">
                    <h5 class="fs-md text-muted mb-0">Pengunjung</h5>

                    <div class="row mt-3">
                        <div class="col-2">
                            <i class="fa-solid fa-user" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-10">
                            <h3 class="mb-4" style="float: right;"><span class="counter-value" data-target="291.32">0</span> </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless align-middle table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-medium">01</td>
                            <td>Annette Black</td>
                            <td>Industrial Designer</td>
                            <td>10, Nov 2021</td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td>
                                <div class="hstack gap-3 fs-base">
                                    <a href="javascript:void(0);" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                    <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-medium">02</td>
                            <td>Bessie Cooper</td>
                            <td>Graphic Designer</td>
                            <td>13, Nov 2021</td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td>
                                <div class="hstack gap-3 fs-base">
                                    <a href="javascript:void(0);" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                    <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-medium">03</td>
                            <td>Leslie Alexander</td>
                            <td>Product Manager</td>
                            <td>17, Nov 2021</td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td>
                                <div class="hstack gap-3 fs-base">
                                    <a href="javascript:void(0);" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                    <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-medium">04</td>
                            <td>Lenora Sandoval</td>
                            <td>Applications Engineer</td>
                            <td>25, Nov 2021</td>
                            <td><span class="badge bg-danger-subtle text-danger">Disabled</span></td>
                            <td>
                                <div class="hstack gap-3 fs-base">
                                    <a href="javascript:void(0);" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                    <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- end card-body -->
    </div>
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
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();
</script>
@endsection
@endsection
