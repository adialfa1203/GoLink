@extends('layout.user.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title', 'Edit Microsite')

@section('style')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        /* Contoh aturan media queries untuk mengatur ulang tampilan pada layar kecil */
        @media (max-width: 768px) {
            /* Aturan CSS untuk tampilan pada layar kecil di sini */
            /* Misalnya, mengurangi font size atau mengubah jumlah kolom grid */
        }

        .navbar-brand-box {
            padding: 30px;
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

        .spo {
            background-color: #1DB954;
        }

        .spo:hover {
            background-color: #1DB954;
        }

        .tiktok {
            background-color: #010101;
        }

        .tiktok:hover {
            background-color: #010101;
        }

        .tele {
            background-color: #0088cc;
        }

        .tele:hover {
            background-color: #0088cc;
        }

        .link {
            background-color: #1666C5;
        }

        .link:hover {
            background-color: #1666C5;
        }

        .face {
            background-color: #2b4170;
            background: -moz-linear-gradient(top, #3b5998, #2b4170);
            background: -ms-linear-gradient(top, #3b5998, #2b4170);
            background: -webkit-linear-gradient(top, #3b5998, #2b4170);
        }

        .twi {
            background: #55ACEE;
        }

        .twi:hover {
            background: #55ACEE;
        }

        .insta {
            background: #f09433;
            background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            background: -webkit-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f09433', endColorstr='#bc1888', GradientType=1);

        }

        .youtube {
            background: #FF0000;
        }

        .youtube:hover {
            background: #FF0000;
        }

        .olshop {
            background-color: #FF9130;
        }

        .olshop:hover {
            background-color: #FF9130;
        }

        .tex {
            color: #000;
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-bottom: 0;
        }

        .card.animated {
            transform: scale(1.1);
            /* You can adjust the scale or use any other animation properties */
            transition: transform 0.3s ease;
            /* You can adjust the duration and timing function */
        }
    </style>
@endsection

@section('content')

    <div class="page-content" style="background-color: white;">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                {{-- <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Microsite</h4>
                    </div>
                </div> --}}
            </div>
            <!-- end page title -->
            <div class="col-12 col-sm-2 isi align-items-xl-center d-xl-flex">
                <p class="text-black flex-grow-1 mb-xl-0"></p>
                <div class="flex-shrink-0">
                    <ul class="nav nav-pills card-header-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#animation-home" role="tab">
                                Komponen
                            </a>
                        </li>
                        <li class="nav-item">
                            @if ($user->subscribe != 'free')
                                <a class="nav-link fw-bold" data-bs-toggle="tab" href="#animation-profile" role="tab">
                                    Pengaturan
                                </a>
                            @else
                                <span class="nav-link fw-bold disabled" style="cursor: not-allowed;">
                                    Pengaturan <span class="text-danger">(Fitur Khusus Berlangganan!)</span>
                                </span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div><!-- end col -->
            <form action="{{ route('update.microsite', ['id' => $id]) }}" method="post" class="row"
                enctype="multipart/form-data">
                @csrf
                <div class="col-lg-9">
                    <div class="card" style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                        <div class="card-body">
                            <div class="tab-content text-black">
                                <div class="tab-pane active" id="animation-home" role="tabpanel">
                                    <div>
                                        <div class="mb-3">
                                            <label for="employeeName" class="form-label">Nama Profile</label>
                                            <input type="text" class="form-control" id="employeeName"
                                                placeholder="Nama Profile"
                                                value="{{ old('name_microsite', $microsite->name_microsite) }}"
                                                name="name_microsite">
                                            <div>
                                                @if ($errors->has('name_microsite'))
                                                    <span class="text-danger">{{ $errors->first('name_microsite') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label for="employeeName" class="form-label">Deskripsi</label>
                                        <textarea name="description" id="editor">{{ old('description', $microsite->description) }}</textarea>
                                        <div>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                <div class="accordion" id="default-accordion-example">
                                                    @foreach ($social as $data)
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#data{{ $data->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="data{{ $data->id }}">
                                                                    Silahkan isi URL {{ $data->button->name_button }} anda
                                                                    disini! (Wajib)
                                                                </button>
                                                            </h2>
                                                            <div id="data{{ $data->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingOne"
                                                                data-bs-parent="#default-accordion-example">
                                                                <div class="accordion-body">
                                                                    <div class="col-xxl-12">
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col-11">
                                                                                    <label for="placeholderInput"
                                                                                        class="form-label">{{ $data->button->name_button }}</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-1 d-flex justify-content-end">
                                                                                    <a type="button"
                                                                                        onclick="confirmDelete('{{ $data->id }}')">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="20" height="21"
                                                                                            viewBox="0 0 20 21"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M7.4987 2.625V3.5H3.33203V5.25H4.16536V16.625C4.16536 17.0891 4.34096 17.5342 4.65352 17.8624C4.96608 18.1906 5.39 18.375 5.83203 18.375H14.1654C14.6074 18.375 15.0313 18.1906 15.3439 17.8624C15.6564 17.5342 15.832 17.0891 15.832 16.625V5.25H16.6654V3.5H12.4987V2.625H7.4987ZM5.83203 5.25H14.1654V16.625H5.83203V5.25ZM7.4987 7V14.875H9.16536V7H7.4987ZM10.832 7V14.875H12.4987V7H10.832Z"
                                                                                                fill="black"
                                                                                                fill-opacity="0.3" />
                                                                                        </svg>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" {{-- @dd($data) --}}
                                                                                name="social_id[{{ $data->id }}]"
                                                                                value="{{ $data->id }}">
                                                                            <input type="text" class="form-control"
                                                                                id="placeholderInput"
                                                                                placeholder="Isi Link {{ $data->button->name_button }} Anda "
                                                                                name="button_link[{{ $data->id }}]"
                                                                                value="{{ old('button_link.' . $data->id, $data->button_link) }}">

                                                                            <div>
                                                                            </div>
                                                                            <div class="mt-1">
                                                                                @error('button_link.' . $data->button->id)
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingFour">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                                aria-expanded="false" aria-controls="collapseFour">
                                                                Tulis Nama Perusahaan Anda Disini! (Opsional)
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFour" class="accordion-collapse collapse"
                                                            aria-labelledby="headingFour"
                                                            data-bs-parent="#default-accordion-example">
                                                            <div class="accordion-body">
                                                                <div class="col-xxl-12">
                                                                    <div>
                                                                        <label for="placeholderInput"
                                                                            class="form-label">Nama Perusahaan
                                                                            (Opsional)</label>
                                                                        <input type="text" class="form-control"
                                                                            name="company_name" id="placeholderInput"
                                                                            placeholder="Nama Perusahaan"
                                                                            value="{{ old('company_name', $microsite->company_name) }}">
                                                                        <div>
                                                                            @if ($errors->has('company_name'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('company_name') }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingFive">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                                aria-expanded="false" aria-controls="collapseFive">
                                                                Tulis Alamat Perusahaan Anda Disini! (Opsional)
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFive" class="accordion-collapse collapse"
                                                            aria-labelledby="headingFive"
                                                            data-bs-parent="#default-accordion-example">
                                                            <div class="accordion-body">
                                                                <div class="col-xxl-12">
                                                                    <div>
                                                                        <label for="placeholderInput"
                                                                            class="form-label">Alamat Perusahaan
                                                                            (Opsional)</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ old('company_address', $microsite->company_address) }}"
                                                                            id="placeholderInput" name="company_address"
                                                                            placeholder="Alamat Perusahaan">
                                                                        <div>
                                                                            @if ($errors->has('company_address'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('company_address') }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="animation-profile" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-2">
                                            <div>
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        @if ($user->subscribe !== 'platinum' && $user->subscribe !== 'gold' && $user->subscribe !== 'silver')
                                                            <label for="address" class="text-black form-label">Nama
                                                                Microsite</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="name" placeholder="aqua-link"
                                                                value="{{ $microsite->name }}" disabled>
                                                            <label for="address" class="text-danger form-label">Nama
                                                                Microsite hanya bisa diedit oleh pengguna yang
                                                                Berlangganan!</label>
                                                        @else
                                                            <label for="address" class="text-black form-label">Nama
                                                                Microsite</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="name" placeholder="aqua-link"
                                                                value="{{ $microsite->name }}">
                                                        @endif
                                                        <div>
                                                            @if ($errors->has('name'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        @if ($user->subscribe !== 'platinum' && $user->subscribe !== 'gold' && $user->subscribe !== 'silver')
                                                            <label for="address" class="text-black form-label">Tautan
                                                                Microsite</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button type="button"
                                                                        class="btn bg-gradient text-white"
                                                                        style="background: #0E2954;">
                                                                        {{ $baseUrl }}
                                                                    </button>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    name="default_short_url" value="{{ $path }}"
                                                                    disabled>
                                                            </div>
                                                            <label for="address" class="text-danger form-label">Tautan
                                                                Microsite hanya bisa diedit oleh pengguna yang
                                                                Berlangganan!</label>
                                                        @else
                                                            <label for="address" class="text-black form-label">Tautan
                                                                Microsite</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button type="button"
                                                                        class="btn bg-gradient text-white"
                                                                        style="background: #0E2954;">
                                                                        {{ $baseUrl }}
                                                                    </button>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    name="default_short_url" value="{{ $path }}">
                                                            </div>
                                                        @endif
                                                        <div>
                                                            @if ($errors->has('default_short_url'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('default_short_url') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-8 col-lg-6 col-xl-6 col-md-8 col-sm-8">
                                    <button type="button" class="btn" style="background-color: #0E2954;color: #fff;"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                        aria-controls="offcanvasRight">
                                        <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Tambah
                                            Button</span></button>
                                </div>
                                <div class="col-4 col-lg-6 col-xl-6 col-md-4 col-sm-4 d-flex justify-content-end">
                                    <button type="submit" class="btn" style="background-color: #088C0D;color: #fff;">
                                        <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i>
                                            Kirim</span></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div>
                <div class="col-lg-3">
                    <div class="card real-estate-grid-widgets card-animate"
                        style="box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25);">
                        <div class="card overflow-hidden">
                            <div>
                                <img src="{{ asset('component/' . ($microsite->components_uuid ? $microsite->component->cover_img : $microsite->customtheme->cover_img)) }}"
                                    alt="" class="card-img-top profile-wid-img object-fit-cover"
                                    style="height: 200px;">
                            </div>
                            <div class="card-body pt-0 mt-n5">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto">
                                        <img src="{{ asset($microsite->image ? 'images/' . $microsite->image : 'images/default.jpg') }}"
                                            alt=""
                                            class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                        <div
                                            class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                            <input id="profile-img-file-input" name="image" type="file"
                                                class="profile-img-file-input d-none">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="bi bi-camera"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <h5>{{ isset($microsite->name_microsite) ? $microsite->name_microsite : 'Nama Anda' }}<i
                                                class="align-baseline text-info ms-1"></i></h5>
                                        <p class="text-black">{!! isset($microsite->description) ? $microsite->description : 'Deskripsi Anda' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                @foreach ($social as $socialItem)
                                    @if ($socialItem->button->icon === 'bi bi-facebook')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill face">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-twitter')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill twi">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-instagram')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill insta">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-linkedin')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill link">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-telegram')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill tele">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-tiktok')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill tiktok">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto">
                                                    {{ $socialItem->button->name_button }}</p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-spotify')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill spo">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-youtube')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill youtube">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @elseif ($socialItem->button->icon === 'bi bi-bag-fill')
                                        <button style="color: white;" type="button"
                                            class="d-flex col-xl-12 col-12 mt-2 btn btn-label rounded-pill olshop">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @else
                                        <button
                                            style="color:#fff;background-color: {{ $socialItem->button->color_hex }}; width: 100%;"
                                            type="button"
                                            class="d-flex col-xl-012 col-12 mt-2 btn btn-label rounded-pill">
                                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                                <i class="bi bi-link-45deg label-icon align-middle rounded-pill fs-lg me-2"
                                                    style="color: white;"></i>
                                                <p class="my-auto" style="margin-top: 2%!important;">
                                                    {{ $socialItem->button->name_button }}</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-caret-up-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                                <i class="bi bi-caret-down-fill fa-sm"
                                                    style="color: white; margin-bottom: 5%;"></i>
                                            </div>
                                        </button>
                                    @endif
                                @endforeach
                                <div class="card card-body text-center">
                                    <h4 type="button" class="card-title" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        {{ isset($microsite->company_name) ? $microsite->company_name : 'Nama Perusahaan Anda' }}
                                    </h4>
                                    <p type="button" class="card-text text-black" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        {{ isset($microsite->company_address) ? $microsite->company_address : 'Alamat Perusahaan Anda' }}
                                    </p>
                                </div>
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div>
            </form>
        </div><!-- container-fluid -->
        <form action="{{ route('save-button-social') }}" method="post" class="offcanvas offcanvas-end" tabindex="-1"
            id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            @csrf
            <input type="hidden" name="microsite_uuid" value="{{ $microsite->id }}">
            <input type="hidden" name="buttons_uuid" value="{{ $data->id }}">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Sosial Media</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0 overflow-hidden">
                <div data-simplebar style="height: calc(100vh - 112px);">
                    <div class="acitivity-timeline p-4">
                        <div class="row">
                            @foreach ($button as $data)
                                <div class="col-xl-12 col-sm-12 mb-4">
                                    <div class="card" id="{{ $data->id }}"
                                        style="box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);"
                                        data-card-id="{{ $data->id }}">
                                        <label class="mb-0 me-2" for="button_uuid{{ $data->id }}">
                                            <div class="card-footer text-center">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <input type="radio" id="button_uuid{{ $data->id }}"
                                                        name="button_uuid" value="{{ $data->id }}"
                                                        class="radio d-none">
                                                    @switch($data->icon)
                                                        @case('bi bi-facebook')
                                                            @php $buttonClass = 'face'; @endphp
                                                        @break

                                                        @case('bi bi-twitter')
                                                            @php $buttonClass = 'twi'; @endphp
                                                        @break

                                                        @case('bi bi-instagram')
                                                            @php $buttonClass = 'insta'; @endphp
                                                        @break

                                                        @case('bi bi-linkedin')
                                                            @php $buttonClass = 'link'; @endphp
                                                        @break

                                                        @case('bi bi-telegram')
                                                            @php $buttonClass = 'tele'; @endphp
                                                        @break

                                                        @case('bi bi-tiktok')
                                                            @php $buttonClass = 'tiktok'; @endphp
                                                        @break

                                                        @case('bi bi-spotify')
                                                            @php $buttonClass = 'spo'; @endphp
                                                        @break

                                                        @case('bi bi-youtube')
                                                            @php $buttonClass = 'youtube'; @endphp
                                                        @break

                                                        @case('bi bi-bag-fill')
                                                            @php $buttonClass = 'olshop'; @endphp
                                                        @break

                                                        @default
                                                            @php
                                                                $buttonClass = '';
                                                                $data->icon = 'bi bi-link-45deg'; // Set the default icon
                                                            @endphp
                                                    @endswitch

                                                    <a style="color: white; background-color: {{ $data->color_hex }};"
                                                        type="button"
                                                        class="col-xl-12 col-12 btn btn-label {{ $buttonClass }}">
                                                        <i class="{{ $data->icon }} label-icon align-middle fs-lg me-2"
                                                            style="color: white;"></i>
                                                        {{ $data->name_button }}
                                                    </a>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter border p-3 text-center d-flex justify-content-between">
                <button type="button" class="btn btn-label mb-3 max" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" style="font-size: 13px; background-color: #0E2954; color: #fff;">
                    <i class="ri-add-line label-icon align-middle fs-lg me-2"></i>Kustom Button
                </button>
                <button type="submit" class="btn btn-label mb-3 max"
                    style="font-size: 13px; background-color: #088C0D; color: #fff;">
                    <i class="ri-add-line label-icon align-middle fs-lg me-2"></i>Tambah Button
                </button>
            </div>
        </form>
        <div class="modal fade zoomIn" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="text-center">
                        <p class="tex">Kustom button Microsite anda</p>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="{{ route('custom.btn.save') }}" method="POST" class="needs-validation"
                                novalidate>
                                @csrf
                                <input type="hidden" name="microsite_uuid" value="{{ $microsite->id }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="col-xxl-12 mt-2 col-md-12">
                                    <div class="mt-2">
                                        <label for="name_button" class="form-label">Nama Button</label>
                                        <input type="text" name="name_button" class="form-control" id="name_button"
                                            placeholder="Masukkan Nama Button" required value="{{ old('name_button') }}">
                                        <div class="invalid-feedback">
                                            Harap isi kolom ini sebelum melanjutkan proses.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 mt-2 col-md-6">
                                    <div>
                                        <label for="colorPicker" class="form-label">Color Picker</label>
                                        <input type="color" class="form-control form-control-color w-100"
                                            id="colorPicker" name="color_hex" required value="{{ old('color_hex') }}"
                                            style="height: 40px;">
                                        <div class="invalid-feedback">
                                            Harap isi kolom ini sebelum melanjutkan proses.
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start justify-content-between gap-3 mt-4">
                                    <button type="submit" class="btn right ms-auto"
                                        style="background-color: #088C0D; color: #fff;">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['height', ['height']]
                ]

            });
        });
        ClassicEditor
            .create(document.querySelector('#aja'))
            .catch(error => {
                // console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('input[name="button_uuid"]').on('change', function() {
                // Remove animation class from all cards
                $('.card').removeClass('animated');

                // Add animation class to the selected card
                var cardId = $(this).val();
                $('#' + cardId).addClass('animated');
            });
        });
    </script>
    <script>
        var isDeleteInProgress = false;

        function deleteData(id) {
            if (isDeleteInProgress) {
                return;
            }

            isDeleteInProgress = true;

            $('.preloader').show();
            $.ajax({
                    url: '/user/delete-buttons/' + id,
                    type: 'POST',
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil dihapus.',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(error) {
                        Swal.fire(
                            'Gagal',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    },
                    complete: function() {}
                })
                .always(function() {
                    isDeleteInProgress = false;
                });
        }


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
                    deleteData(id);
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

    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
@endsection
