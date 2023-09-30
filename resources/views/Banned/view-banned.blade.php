@extends('layout.admin.app')
@section('title', 'Data Pengguna')
@section('style')
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/sweetalert2/sweetalert2.min.css') }}"
        rel="stylesheet" type="text/css">

    <style>
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

            <!-- start page title -->
            <div class="row">
                <div class="col-xl-6 col-sm-6">
                    <div class="card border-bottom border-2 card-animate">
                        <div class="card-body bg-warning">
                            <h5 class="fs-md text-muted mb-0 text-white">Pengguna</h5>
                            <div class="row mt-3">
                                <div class="col-2">
                                    <i class="bi bi-person-fill-check custom-icon-size" style="font-size: 30px;"></i>
                                </div>
                                <div class="col-10">
                                    <h3 class="mb-4 custom-icon-size" style="float: right;"><span class="counter-value"
                                            data-target="{{ $totalUser }}">0</span> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-6 col-sm-6">
                    <div class="card border-bottom border-2 card-animate">
                        <div class="card-body" style="background-color: #FF6C6C">
                            <h5 class="fs-md text-muted mb-0 text-white">Pengguna Di Blokir</h5>

                            <div class="row mt-3">
                                <div class="col-2">
                                    <i class="bi bi-person-fill-slash custom-icon-size" style="font-size: 30px;"></i>
                                </div>
                                <div class="col-10">
                                    <h3 class="mb-4 custom-icon-size" style="float: right;"><span class="counter-value"
                                            data-target="{{ $totaldiblokir }}">0</span> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card" id="orderList">
                        <div class="card-header">
                            <div class="row align-items-center gy-3">
                                <div class="col-lg-3 col-md-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search" id="searchInput"
                                            placeholder="Cari...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr class="searchable">
                                            <th scope="col" data-sort="order_id">No</th>
                                            <th scope="col" data-sort="order_id">Nama
                                                Pengguna</th>
                                            <th scope="col" data-sort="order_date">E-mail
                                            </th>
                                            <th scope="col" data-sort="delivery_date">No
                                                Telepon</th>
                                            <th scope="col" data-sort="status">Berlangganan
                                            </th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if ($data->isEmpty())
                                            <tr>
                                                <td colspan="6">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <img style="width: 300px; height: 300px;"
                                                            src="{{ asset('images/Empty.jpg') }}" alt="Gambar">
                                                        <div class="d-flex justify-content-center align-items-center mt-2">
                                                            <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                                            <h5 class="mt-2">Maaf! Tidak Ada Data Ditemukan</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($data as $row)
                                                <tr id="user_{{ $row->id }}">
                                                    <th class="order_id">{{ $loop->iteration }}</th>
                                                    <td class="order_id">{{ $row->name }}</td>
                                                    <td class="order_date">{{ $row->email }}</td>
                                                    <td class="products">{{ $row->number }}</td>
                                                    <td class="status">
                                                        @if ($row->subscribe === 'yes')
                                                            <span
                                                                class="badge bg-primary-subtle text-primary">Berlangganan</span>
                                                        @elseif ($row->subscribe === 'no')
                                                            <span class="badge bg-danger-subtle text-danger">Tidak
                                                                Berlangganan</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex gap-2 list-unstyled mb-0">
                                                            <li>
                                                                <a href="#"
                                                                    @if ($row->is_banned == 1) class="btn btn-subtle-success btn-icon btn-sm me-3"
                                                                @else
                                                                class="btn btn-subtle-danger btn-icon btn-sm me-3" @endif
                                                                    data-bs-toggle="modal"
                                                                    data-user-id="{{ $row->id }}"
                                                                    data-is-banned="{{ $row->is_banned }}">
                                                                    <i class="fas fa-ban"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody><!-- end tbody -->
                                </table>

                                <br><!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ orders We did not find any
                                            orders for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center justify-content-sm-end mt-2">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascript:void(0)">
                                        <i class="mdi mdi-chevron-left align-middle"></i>
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascript:void(0)">
                                        <i class="mdi mdi-chevron-right align-middle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>

@endsection
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/sweetalert2/sweetalert2.min.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/sweetalerts.init.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".list tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    {{-- <script>
        // Mendapatkan referensi elemen checkbox utama dan semua checkbox anak dengan class yang sama
        var checkAllCheckbox = document.getElementById("checkAll");
        var childCheckboxes = document.querySelectorAll('.child-checkbox');

        // Menambahkan event listener ke checkbox utama
        checkAllCheckbox.addEventListener("change", function() {
            // Mengatur status semua checkbox anak sesuai dengan status checkbox utama
            childCheckboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked;
            });
        });
    </script> --}}
@endsection
