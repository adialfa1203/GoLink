@extends('layout.admin.app')
@section('title', 'Kategori')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .page-content {
        overflow-x: hidden;
    }

    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        .kotak {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
    }

    .page-content {
        overflow-x: hidden;
        background-color: #fff;
    }
</style>
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex align-items-start gap-3 mt-4">
                    <button type="button" class="btn btn-label" style="background-color: #088C0D; color:#fff;"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" role="button">
                        <i class="ri-add-line label-icon align-middle fs-lg ms-2" style="color: #fff;"></i>Tambah Kategori
                    </button>
                </div>
                <div class="row mt-4">
                    @if ($component->isEmpty())
                        <div class="card page-content">
                            <div class="container-fluid">
                                <div class="d-flex flex-column align-items-center">
                                    <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.png') }}"
                                        alt="Gambar">
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <i class="ph-magnifying-glass mb-2 fs-2 text-primary"></i>
                                        <h5 class="mt-2 mb-3">Maaf! Belum Ada Data Yang Ditemukan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="kotak">
                            @foreach ($component as $item)
                                <div class="card"
                                    style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                                    <div class="card-footer text-center" style="background-color: #F0F0F0;">
                                        <div class="dropdown float-end">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted fs-lg"><i
                                                        class="mdi mdi-dots-vertical align-middle"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <button type="button" class="dropdown-item edit"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->component_name }}"
                                                    data-img="{{ $item->cover_img }}">Edit</button>
                                                <button type="button" class="dropdown-item"
                                                    onclick="confirmDelete('{{ $item->id }}')">Hapus</button>
                                                {{-- <a class="dropdown-item"
                                                href="{{ route('delete.component', ['id' => $item->id]) }}">Hapus</a> --}}
                                            </div>
                                        </div>
                                        <strong class="fs-md text-muted mb-0">{{ $item->component_name }}</strong>
                                    </div>
                                    <div>
                                        <img src="{{ asset('component/' . $item->cover_img) }}" alt=""
                                            class="card-img-top object-fit-cover" style="height: 200px;">
                                    </div>
                                    <div class="card-body pt-0 mt-n5">
                                        <div class="text-center">
                                            <div class="profile-user position-relative d-inline-block mx-auto">
                                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/default.jpg') }}"
                                                    alt=""
                                                    class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade zoomIn" id="edit-modal" tabindex="-1"
                                    aria-labelledby="editComponentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('update.component', ['id' => $item->id]) }}"
                                                enctype="multipart/form-data" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editComponentModalLabel">Edit Komponen</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="editFormContainer">
                                                    <div class="row">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label for="update-name" class="form-label">Nama
                                                                                Komponen</label>
                                                                            <input type="text" class="form-control"
                                                                                id="update-name" placeholder="Designation"
                                                                                name="component_name">
                                                                            @if ($errors->has('component_name'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('component_name') }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-xxl-12">
                                                                        <div class="card overflow-hidden">
                                                                            <div>
                                                                                <img src="" alt=""
                                                                                    id="data-img"
                                                                                    class="card-img-top profile-wid-img object-fit-cover "
                                                                                    style="height: 200px;">
                                                                                <div>
                                                                                    <input
                                                                                        id="profile-foreground-img-file-input"
                                                                                        type="file"
                                                                                        class="profile-foreground-img-file-input d-none"
                                                                                        name="cover_img">
                                                                                    <label
                                                                                        for="profile-foreground-img-file-input"
                                                                                        class="profile-photo-edit btn btn-light btn-sm position-absolute end-0 top-0 m-3">
                                                                                        <i
                                                                                            class="ri-image-edit-line align-bottom me-1"></i>
                                                                                        Edit
                                                                                        Gambar Sampul
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between gap-3 mt-4">
                                                                    <button type="button" class="btn btn-light button"
                                                                        style="background-color: #FF2323; color:#fff;" data-bs-dismiss="modal">
                                                                        Batal
                                                                    </button>
                                                                    <button class="btn" style="background-color: #088C0D; color: #fff;">Simpan
                                                                        Perubahan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="pagination-wrap hstack justify-content-center gap-2 mb-4">
                        <a class="page-item pagination-prev {{ $component->previousPageUrl() ? '' : 'disabled' }}"
                            href="{{ $component->previousPageUrl() ? $component->previousPageUrl() : '#' }}">
                            Sebelumnya
                        </a>
                        <ul class="pagination listjs-pagination mb-0">
                            @if ($component->currentPage() > 2)
                                <li>
                                    <a class="page" href="{{ $component->url(1) }}">1</a>
                                </li>
                                @if ($component->currentPage() > 3)
                                    <li class="ellipsis">
                                        <span>...</span>
                                    </li>
                                @endif
                            @endif

                            @for ($i = max(1, $component->currentPage() - 1); $i <= min($component->lastPage(), $component->currentPage() + 1); $i++)
                                <li class="{{ $i == $component->currentPage() ? 'active' : '' }}">
                                    <a class="page" href="{{ $component->url($i) }}"
                                        data-i="{{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($component->currentPage() < $component->lastPage() - 1)
                                @if ($component->currentPage() < $component->lastPage() - 2)
                                    <li class="ellipsis">
                                        <span>...</span>
                                    </li>
                                @endif
                                <li>
                                    <a class="page"
                                        href="{{ $component->url($component->lastPage()) }}">{{ $component->lastPage() }}</a>
                                </li>
                            @endif
                        </ul>
                        <a class="page-item pagination-next {{ $component->nextPageUrl() ? '' : 'disabled' }}"
                            href="{{ $component->nextPageUrl() ? $component->nextPageUrl() : '#' }}">
                            Selanjutnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade zoomIn" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Sosial</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save.component') }}" class="card" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="col-xxl-12 mt-2 col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Nama Komponen</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Masukkan nama komponen" name="component_name"
                                        value="{{ old('component_name') }}" required>

                                    @if ($errors->has('component_name'))
                                        <span class="text-danger">{{ $errors->first('component_name') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Harap Isi Nama Sebelum Melanjutkan Proses.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 mt-2 col-md-12">
                                <div class="card overflow-hidden">
                                    <div>
                                        <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/small/img-7.jpg') }}"
                                            alt="" id="data-img-create" class="card-img-top profile-wid-img object-fit-cover"
                                            style="height: 200px;">
                                        @if ($errors->has('cover_img'))
                                            <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                                        @endif
                                        <div>
                                            <input id="profile-foreground-img-file-input-create" type="file"
                                                class="profile-foreground-img-file-input-create d-none" name="cover_img"
                                                required>
                                            <div class="invalid-feedback">
                                                Harap isi sampul dan profil sebelum melanjutkan proses.
                                            </div>
                                            <label for="profile-foreground-img-file-input-create"
                                                class="profile-photo-edit btn btn-light btn-sm position-absolute end-0 top-0 m-3">
                                                <i class="ri-image-edit-line align-bottom me-1"></i>Tambah Gambar Sampul
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start justify-content-between gap-3">
                                    <button type="button" class="btn button"
                                        style="background-color: #FF2323; color:#fff;" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn"
                                        style="background-color: #088C0D; color: #fff;">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-validation.init.js') }}"></script>
    <!-- password-create init -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/passowrd-create.init.js') }}"></script>

    <!-- profile-setting init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('profile-foreground-img-file-input');
            const previewImage = document.getElementById('data-img');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        previewImage.src = this.result;
                    });
                    reader.readAsDataURL(file);
                }
            });
        })

        document.addEventListener('DOMContentLoaded', function() {
            const imageCreate = document.getElementById('profile-foreground-img-file-input-create');
            const previewImageCreate = document.getElementById('data-img-create');

            imageCreate.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        previewImageCreate.src = this.result;
                    });
                    reader.readAsDataURL(file);
                }
            });
        })

        $('#editForm').submit(function(e) {
            e.preventDefault();
            const token = localStorage.getItem('token');
            var formData = new FormData(this)
            const id = $(this).data('id');
            submitForm(formData, id);
        });

        $('.edit').click(function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const img = $(this).data('img');
            var cover = '{{ asset('component') }}/' + img;
            $('#data-img').attr('src', cover);
            $('#editForm').data('id', id);
            $('#update-name').val(name);
            $('#edit-modal').modal('show');
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/delete-component/' + id;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Dibatalkan',
                        'Data tetap aman :)',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
