@extends('layout.admin.app')
@section('title', 'Data Pengguna')
@section('style')
<link href="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
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

    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        .tan {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .nav-link {
        display: block;
        padding: 0.5rem 1rem;
    }

    .nav-link:focus,
    .nav-link:hover {
        text-decoration: none;
    }

    .nav-link.disabled {
        color: #6c757d;
        pointer-events: none;
        cursor: default;
    }

    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }

    .nav-tabs .nav-link {
        margin-bottom: -1px;
        border: 1px solid transparent;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        border-color: #e9ecef #e9ecef #dee2e6;
    }

    .nav-tabs .nav-link.disabled {
        color: transparent;
        background-color: transparent;
        border-color: transparent;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: transparent;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .nav-tabs .dropdown-menu {
        margin-top: -1px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .nav-pills .nav-link {
        border-radius: 0.25rem;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #0E2954;
        border-bottom: 3px solid #0E2954;
        border-radius: 0;
        background-color: transparent;
    }
</style>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row tan">
            <div class="">
                <div class="card border-bottom border-2 card-animate">
                    <div class="card-body" style="background: #0E2954;">
                        <h5 class="fs-md text-muted mb-0 text-white">Pengguna</h5>
                        <div class="row mt-3">
                            <div class="col-2">
                                <i class="bi bi-person-fill-check custom-icon-size" style="font-size: 30px;"></i>
                            </div>
                            <div class="col-10">
                                <h3 class="mb-4 custom-icon-size" style="float: right;"><span class="counter-value" data-target="{{ $totalUser }}">{{ $totalUser }}</span> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="">
                <div class="card border-bottom border-2 card-animate">
                    <div class="card-body" style="background-color: #104898">
                        <h5 class="fs-md text-muted mb-0 text-white">Berlanggan</h5>

                        <div class="row mt-3">
                            <div class="col-2">
                                <i class="bi bi-person-fill-slash custom-icon-size" style="font-size: 30px;"></i>
                            </div>
                            <div class="col-10">
                                <h3 class="mb-4 custom-icon-size" style="float: right;"><span class="counter-value" data-target="{{ $berlanggan }}">{{ $berlanggan }}</span> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card border-bottom border-2 card-animate">
                    <div class="card-body" style="background-color: #FF2323">
                        <h5 class="fs-md text-muted mb-0 text-white">Pengguna Di Blokir</h5>

                        <div class="row mt-3">
                            <div class="col-2">
                                <i class="bi bi-person-fill-slash custom-icon-size" style="font-size: 30px;"></i>
                            </div>
                            <div class="col-10">
                                <h3 class="mb-4 custom-icon-size" style="float: right;"><span class="counter-value" data-target="{{ $totaldiblokir }}">{{ $totaldiblokir }}</span> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
    <div class="card-header mb-3">
        <div class="row align-items-center gy-3">
            <div class="col-lg-3 col-md-6">
                <div class="search-box">
                    <input type="text" class="form-control search" id="searchInput" placeholder="Cari...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills card-header-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#developers" role="tab">
                        Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" data-bs-toggle="tab" href="#designers" role="tab">
                        Pengguna Di Blokir
                        </a>
                    </li>
                </ul>
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="developers" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" id="orderList">
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
                                                                <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.jpg') }}" alt="Gambar">
                                                                <div class="d-flex justify-content-center align-items-center mt-2">
                                                                    <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                                                    <h5 class="mt-2">Maaf! Belum Ada Data
                                                                        Yang Ditemukan</h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    @foreach ($data as $row)
                                                    <tr id="user_{{ $row->id }}">
                                                        <th class="order_id">{{ $loop->iteration }}
                                                        </th>
                                                        <td class="order_id">{{ $row->name }}</td>
                                                        <td class="order_date">{{ $row->email }}
                                                        </td>
                                                        <td class="products">{{ $row->number }}</td>
                                                        <td class="status">
                                                            <h4 class="card-title mb-2">
                                                                @if (strtolower(trim($row->subscribe)) === 'free')
                                                                <span class="badge bg-success">Gratis</span>
                                                                @elseif (strtolower(trim($row->subscribe)) === 'silver')
                                                                <span class="badge bg-primary-subtle text-primary">Berlangganan</span>
                                                                @elseif (strtolower(trim($row->subscribe)) === 'gold')
                                                                <span class="badge bg-primary-subtle text-primary">Berlangganan</span>
                                                                @elseif (strtolower(trim($row->subscribe)) === 'platinum')
                                                                <span class="badge bg-primary-subtle text-primary">Berlangganan</span>
                                                                @else
                                                                <span class="badge bg-secondary">Data Kosong</span>
                                                                @endif
                                                            </h4>
                                                        </td>
                                                        <td>
                                                            <ul class="d-flex gap-2 list-unstyled mb-0">
                                                                <li>
                                                                    <a href="#" @if ($row->is_banned == 1) class="btn btn-subtle-success btn-icon btn-sm me-3"
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
                                                    <p class="text-muted mb-0">We've searched more than 150+
                                                        orders We did not find any
                                                        orders for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-4 justify-content-between text-center text-sm-start" id="pagination-element">
                                            <div class="col-sm">
                                                <div class="text-muted">
                                                    Menampilkan <span class="fw-semibold">{{ $d->firstItem() }}</span>
                                                    hingga <span class="fw-semibold">{{ $d->lastItem() }}</span>
                                                    dari total <span class="fw-semibold">{{ $d->total() }}</span>
                                                    Hasil
                                                </div>
                                            </div>
                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                    <div class="page-item">
                                                        {{ $d->links('pagination::bootstrap-5') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="designers" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" id="orderList">
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
                                                    @if ($bannedUser->isEmpty())
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.jpg') }}" alt="Gambar">
                                                                <div class="d-flex justify-content-center align-items-center mt-2">
                                                                    <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                                                    <h5 class="mt-2">Maaf! Belum Ada Data
                                                                        Yang Ditemukan</h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    @foreach ($bannedUser as $banned)
                                                    <tr id="user_{{ $banned->id }}">
                                                        <th class="order_id">{{ $loop->iteration }}
                                                        </th>
                                                        <td class="order_id">{{ $banned->name }}</td>
                                                        <td class="order_date">{{ $banned->email }}
                                                        </td>
                                                        <td class="products">{{ $banned->number }}</td>
                                                        <td class="status">
                                                            @if ($banned->subscribe === 'yes')
                                                            <span class="badge bg-primary-subtle text-primary">Berlangganan</span>
                                                            @elseif ($banned->subscribe === 'no')
                                                            <span class="badge bg-danger-subtle text-danger">Tidak
                                                                Berlangganan</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <ul class="d-flex gap-2 list-unstyled mb-0">
                                                                <li>
                                                                    <a href="#" @if ($banned->is_banned == 1) class="btn btn-subtle-success btn-icon btn-sm me-3"
                                                                        @else
                                                                        class="btn btn-subtle-danger btn-icon btn-sm me-3" @endif
                                                                        data-bs-toggle="modal"
                                                                        data-user-id="{{ $banned->id }}"
                                                                        data-is-banned="{{ $banned->is_banned }}">
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
                                                    <p class="text-muted mb-0">We've searched more than 150+
                                                        orders We did not find any
                                                        orders for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-4 justify-content-between text-center text-sm-start" id="pagination-element">
                                            <div class="col-sm">
                                                <div class="text-muted">
                                                    Menampilkan <span class="fw-semibold">{{ $bannedUser->firstItem() }}</span>
                                                    hingga <span class="fw-semibold">{{ $bannedUser->lastItem() }}</span>
                                                    dari total <span class="fw-semibold">{{ $bannedUser->total() }}</span>
                                                    Hasil
                                                </div>
                                            </div>
                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                    <div class="page-item">
                                                        {{ $bannedUser->links('pagination::bootstrap-5') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- container-fluid -->
</div>

@endsection
@section('script')
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/sweetalert2/sweetalert2.min.js') }}">
</script>
<script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/sweetalerts.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.0/list.min.js"></script>
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
<script>
    $(document).ready(function() {
        $("#checkAll").change(function() {
            $(".child-checkbox").prop('checked', $(this).prop('checked'));
        });

        $('#deleteAllSelectedRecord').click(function(e) {
            e.preventDefault();
            var selectedIds = [];

            $(".child-checkbox:checked").each(function() {
                selectedIds.push($(this)
                    .val()); // Mengambil nilai ID dari checkbox yang dipilih
            });

            $.ajax({
                url: "{{ route('data.banned') }}",
                type: "POST",
                data: {
                    ids: selectedIds, // Mengirim semua ID yang dipilih ke server
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Hapus baris akun yang dipilih dari tampilan
                    $.each(selectedIds, function(index, id) {
                        $("#user_" + id).remove();
                    });
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            valueNames: ['order_id', 'order_date', 'delivery_date', 'status']
        };

        var userList = new List('your-table-id', options);
    });
</script>
@endsection
