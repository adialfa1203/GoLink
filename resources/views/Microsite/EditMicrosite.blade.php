@extends('layout.user.app')
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
                            <a class="nav-link fw-bold" data-bs-toggle="tab" href="#animation-profile" role="tab">
                                Pengaturan
                            </a>
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
                                            <div class="card-body">
                                                <div class="accordion" id="default-accordion-example">
                                                    @foreach ($social as $data)
                                                        {{-- @dd($social) --}}
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#{{ $data->button->name_button }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="{{ $data->button->name_button }}">
                                                                    Silahkan isi URL {{ $data->button->name_button }} anda
                                                                    disini! (Wajib)
                                                                </button>
                                                            </h2>
                                                            <div id="{{ $data->button->name_button }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingOne"
                                                                data-bs-parent="#default-accordion-example">
                                                                <div class="accordion-body">
                                                                    <div class="col-xxl-12">
                                                                        <div>
                                                                            <label for="placeholderInput"
                                                                                class="form-label">{{ $data->button->name_button }}</label>
                                                                            <input type="text" class="form-control"
                                                                                id="placeholderInput"
                                                                                placeholder="Isi Link {{ $data->button->name_button }} Anda "
                                                                                name="button_link[{{ $data->button->id }}]"
                                                                                value="{{ old('button_link.' . $data->button->id, $data->button_link) }}">
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
                                                                <input type="text" class="form-control" id="address"
                                                                    placeholder="aqua-link" name="default_short_url"
                                                                    value="{{ $short_url->default_short_url }}" disabled>
                                                            </div>
                                                            <label for="address" class="text-danger form-label">Tautan
                                                                Microsite hanya bisa diedit oleh pengguna yang
                                                                Berlangganan!</label>
                                                        @else
                                                            <label for="address" class="text-black form-label">Tautan
                                                                Microsite</label>
                                                            <input type="text" class="form-control" id="address"
                                                                placeholder="aqua-link" name="default_short_url"
                                                                value="{{ $short_url->default_short_url }}">
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
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn"
                                    style="background: #088C0D; color: #FFF;">Kirim</button>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div>
                <div class="col-lg-3">
                    <div class="card real-estate-grid-widgets card-animate"
                        style="box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25);">
                        <div class="card overflow-hidden">
                            <div>
                                <img src="{{ asset('component/' . $microsite->component->cover_img) }}" alt=""
                                    class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
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
                                        <h5>Nama Profil<i class="align-baseline text-info ms-1"></i></h5>
                                        <p class="text-black">Deskripsi Profil</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="d-flex flex-wrap justify-content-center text-center mb-4">
                                    @foreach ($social as $socialItem)
                                        <div class="mb-2 mx-2">
                                            <button style="color: white;" type="button"
                                                class="btn btn-icon
                                                @if (strtolower(trim($socialItem->button->icon)) === 'bi bi-facebook') face
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-twitter') twi
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-instagram') insta
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-linkedin') link
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-telegram') tele
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-tiktok') tiktok
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-spotify') spo
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-youtube') youtube
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-bag-fill') olshop
                                                @else notfound @endif
                                                ">
                                                <i class="{{ $socialItem->button->icon }}"></i>
                                            </button>
                                        </div>
                                    @endforeach

                                </div>
                                @foreach ($social as $socialItem)
                                    <button style="color: white;" type="button"
                                        class="col-12 mb-2 btn btn-label rounded-pill
                                @if (strtolower(trim($socialItem->button->icon)) === 'bi bi-facebook') face
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-twitter')
                                    twi
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-instagram')
                                    insta
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-linkedin')
                                    link
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-telegram')
                                    tele
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-tiktok')
                                    tiktok
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-spotify')
                                    spo
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-youtube')
                                    youtube
                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-bag-fill')
                                    olshop
                                @else
                                    notfound @endif
                                "
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <i style="color: white"
                                            class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"></i>
                                        {{ $socialItem->button->name_button }}
                                    </button>
                                @endforeach
                                <div class="card card-body text-center">
                                    <h4 type="button" class="card-title" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">Nama Perusahaan Anda</h4>
                                    <p type="button" class="card-text text-black" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">Alamat Perusahaan Anda</p>
                                </div>
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div>
            </form>
        </div><!-- container-fluid -->
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                console.error(error);
            });
    </script>
    <!-- dropzone js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/dropzone/dropzone-min.js') }}"></script>

    <!--real estate list init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/real-estate-add-property.init.js') }}">
    </script>

    <!-- ckeditor -->
    <script
        src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}">
    </script>
    <!-- profile-setting init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-editor.init.js') }}"></script>

    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/app.js') }}"></script>
@endsection
