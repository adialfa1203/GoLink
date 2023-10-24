@extends('layout.admin.app')
@section('title', 'Komponen Baru')
@section('style')
<style>
    .button {
        background-color: transparent;
        border: 2px solid #FF2323;
        color: #FF2323;
        padding: 6px 10px; /* Mengatur jarak teks dari tepi tombol yang lebih kecil */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px; /* Mengatur ukuran teks yang lebih kecil */
        cursor: pointer;
    }

    .button:hover {
        background-color: #FF2323;
        color: #fff;
    }
    .page-content {
                overflow-x: hidden;
                background-color: #fff;
            }
    </style>
@endsection

@section('content')
    <form action="{{ Route('save.component') }}" method="POST" enctype="multipart/form-data"
        class="page-content needs-validation" novalidate>
        @csrf
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Komponen</h4>
                    </div>
                </div>
            </div> --}}
            <!-- end page title -->
            <div class="row">
                <div class="card" style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Nama Komponen</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Masukkan nama komponen" name="component_name" required>

                                    @if ($errors->has('component_name'))
                                        <span class="text-danger">{{ $errors->first('component_name') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Harap Isi Nama Sebelum Melanjutkan Proses.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card overflow-hidden">
                                    <div>
                                        <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/small/img-7.jpg') }}"
                                            alt="" class="card-img-top profile-wid-img object-fit-cover"
                                            style="height: 200px;">
                                        @if ($errors->has('cover_img'))
                                            <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                                        @endif
                                        <div>
                                            <input id="profile-foreground-img-file-input" type="file"
                                                class="profile-foreground-img-file-input d-none" name="cover_img" required>
                                            <div class="invalid-feedback">
                                                Harap isi sampul dan profil sebelum melanjutkan proses.
                                            </div>
                                            <label for="profile-foreground-img-file-input"
                                                class="profile-photo-edit btn btn-light btn-sm position-absolute end-0 top-0 m-3">
                                                <i class="ri-image-edit-line align-bottom me-1"></i> Edit Gambar Sampul
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 mt-n5">
                                        <div class="text-center">
                                            <div class="profile-user position-relative d-inline-block mx-auto">
                                                <img src="
                                                {{ asset('template/themesbrand.com/steex/layouts/assets/images/users/default.jpg') }}"
                                                    alt=""
                                                    class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                                {{-- <div
                                                    class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                                    <input id="profile-img-file-input" type="file"
                                                        class="profile-img-file-input d-none" name="profile_img" required>
                                                    <label for="profile-img-file-input"
                                                        class="profile-photo-edit avatar-xs">
                                                        <span class="avatar-title rounded-circle bg-light text-body">
                                                            <i class="bi bi-camera"></i>
                                                        </span>
                                                    </label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        {{-- <div class="d-flex justify-content-center">
                                            @if ($errors->has('profile_img'))
                                                <span class="text-danger">{{ $errors->first('profile_img') }}</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start justify-content-between gap-3 mt-4">
                                <a href="{{ route('view.component') }}" class="btn btn-light button"><i class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>Kembali</a>
                                <button type="submit" class="btn" style="background-color: #088C0D; color: #fff;">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-validation.init.js') }}"></script>
    <!-- password-create init -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/passowrd-create.init.js') }}"></script>

    <!-- profile-setting init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
@endsection
