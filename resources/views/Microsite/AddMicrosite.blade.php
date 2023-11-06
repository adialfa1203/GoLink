@extends('layout.user.app')

@section('title', 'Microsite')
@section('style')
    <style>
        .page-content {
            overflow-x: hidden;
        }

        .visually-hidden {
            position: absolute;
            visibility: hidden;
        }

        .form-check-label {
            display: inline-block;
            font-size: 16px;
        }

        .hover {
            background-color: #f8f8f8;
            transform: scale(1.05);
            transition: background-color 0.3s, transform 0.3s;
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

@section('style')
    <style>
        .hover {
            border: 0.5px solid black;
        }

        /* Untuk mengurangi jarak antara ikon panah dan teks */
        .btn.btn-label.previetab {
            padding-right: 1px;
            /* Sesuaikan padding kanan sesuai kebutuhan */
        }

        .btn.btn-label.nexttab {
            padding-left: 5px;
            /* Sesuaikan padding kiri sesuai kebutuhan */
        }

        .hover {
            background-color: lightgray;
        }

        .hide-radio {
            display: none;
        }

        .radio-button {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 1px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            background-color: #fff;
        }

        .hidden-radio:checked+.radio-button {
            background-color: #ccc;
        }

        /* CSS untuk tampilan ponsel */

        /* CSS khusus untuk tampilan ponsel */
        @media (max-width: 768px) {
            . {
                width: 100%;
                /* Tombol menempati satu kolom penuh */
                margin-bottom: 10px;
                /* Jarak antara tombol */
            }
        }
    </style>
@endsection



@section('content')
    <div class="page-content" style="background-color: white;">
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Microsite</h4>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card" style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                        <div class="card-header" style="background-color: #F0F0F0">
                            <h4 class="card-title mb-0">Buat Microsite Baru</h4>
                        </div><!-- end card header -->
                        <div class="card-body form-steps">
                            <form action="{{ route('create.microsite') }}" id="form-create"
                                class="vertical-navs-step needs-validation" novalidate method="POST">
                                @csrf
                                <div class="row gy-5">
                                    <div class="col-lg-3" style="border-right: 1px solid #878A99;">
                                        <div class="nav flex-column custom-nav nav-pills" role="tablist"
                                            aria-orientation="vertical">
                                            <button class="nav-link active" id="v-pills-bill-info-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-bill-info" type="button" role="tab"
                                                aria-controls="v-pills-bill-info" aria-selected="true">
                                                <span class="step-title me-2">
                                                    <i class="ri-close-circle-fill step-icon me-2"></i> Tentukan jenis
                                                    microsite anda!
                                                </span>
                                            </button>
                                            <button class="nav-link" id="v-pills-bill-address-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-bill-address" type="button" role="tab"
                                                aria-controls="v-pills-bill-address" aria-selected="false">
                                                <span class="step-title me-2">
                                                    <i class="ri-close-circle-fill step-icon me-2"></i> Pilih nama anda!
                                                </span>
                                            </button>
                                            <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-payment" type="button" role="tab"
                                                aria-controls="v-pills-payment" aria-selected="false">
                                                <span class="step-title me-2">
                                                    <i class="ri-close-circle-fill step-icon me-2"></i> Pilih media sosial
                                                    anda!
                                                </span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                        <div class="px-lg-4">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="v-pills-bill-info"
                                                    role="tabpanel" aria-labelledby="v-pills-bill-info-tab">
                                                    <div>
                                                        <h5>Jenis Microsite</h5>
                                                        <p class="text-muted">Pilih jenis microsite yang cocok dengan
                                                            kebutuhan Anda!</p>
                                                    </div>
                                                    <div class="row g-2">
                                                        @foreach ($data as $microsite)
                                                            <div class="col-xl-4 col-sm-12 mb-4">
                                                                <div class="card clickable-card"
                                                                    data-microsite-id="{{ $microsite->id }}"
                                                                    style="box-shadow: 2px 5px 4px 0px rgba(0, 0, 0, 0.25);">
                                                                    <div class="text-center">
                                                                        <strong
                                                                            class="fs-md text-muted mb-0">{{ $microsite->name }}</strong>
                                                                    </div>
                                                                    <div>
                                                                        <img src="{{ asset('component/' . $microsite->cover_img) }}"
                                                                            alt=""
                                                                            class="card-img-top profile-wid-img object-fit-cover"
                                                                            style="height: 200px;">
                                                                    </div>
                                                                    <div class="card-body pt-0 mt-n5">
                                                                        <div class="text-center">
                                                                            <div
                                                                                class="profile-user position-relative d-inline-block mx-auto">
                                                                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/default.jpg') }}"
                                                                                    alt=""
                                                                                    class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center mt-3">
                                                                            <label class="form-check-label">
                                                                                <input type="radio"
                                                                                    id="tema{{ $microsite->id }}"
                                                                                    name="microsite_selection"
                                                                                    value="{{ $microsite->id }}"
                                                                                    class="form-check-input visually-hidden">&nbsp;{{ $microsite->component_name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        @if ($errors->has('microsite_selection'))
                                                            <span
                                                                class="text-danger text-center">{{ $errors->first('microsite_selection') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button"
                                                            class="btn btn-label right ms-auto nexttab nexttab"
                                                            style="background: #088C0D; color: #FFF;"
                                                            data-nexttab="v-pills-bill-address-tab">
                                                            <i
                                                                class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Selanjutnya
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-bill-address" role="tabpanel"
                                                    aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>Pilih Nama</h5>
                                                        <p class="text-muted">Buat nama dan link sesuai keinginan Anda!</p>
                                                    </div>
                                                    <div>
                                                        <div class="row g-2">
                                                            <div class="col-12">
                                                                <label for="address" class="form-label">Nama
                                                                    Microsite</label>
                                                                <input type="text" class="form-control"
                                                                    id="name_microsite" name="name"
                                                                    placeholder="Nama Microsite">
                                                                <div>
                                                                    @if ($errors->has('name'))
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="micrositeUrl" class="form-label">Tautan
                                                                    Microsite</label>
                                                                <div class="input-group">
                                                                    <button type="button"
                                                                        class="text-white btn bg-gradient"
                                                                        style="background: #0E2954;">MiLink/</button>
                                                                    <input type="text" class="form-control"
                                                                        id="linkMicrosite" placeholder="Tautan Microsite"
                                                                        name="link_microsite">
                                                                </div>
                                                                <span class="is-invalid text-danger mt-2"
                                                                    id="linkMicrositeError"></span>
                                                                <span class="text-success mt-3"
                                                                    id="successMessage"></span>
                                                                <div>
                                                                    @if ($errors->has('link_microsite'))
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('link_microsite') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <div class="col-6 col-md-6">
                                                            <button type="button"
                                                                class="btn btn-outline-danger btn-sm previestab"
                                                                data-previous="v-pills-bill-info-tab"
                                                                style="font-size: 13px;"><i
                                                                    class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>Sebelumnya</button>
                                                        </div>
                                                        <div class="col-6 col-md-6" style="margin-left: -8px;">
                                                            <button type="button"
                                                                class="btn btn-label right ms-auto nexttab nexttab"
                                                                data-nexttab="v-pills-payment-tab"
                                                                style="float: right; background: #088C0D; color: #FFF;"><i
                                                                    class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Selanjutnya</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                                    aria-labelledby="v-pills-payment-tab">
                                                    <div>
                                                        <h5>Sosial Media</h5>
                                                        <p class="text-muted">Pilih sosial media yang sering anda gunakan!
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        @foreach ($button as $data)
                                                            <div class="col-xl-4 col-sm-6 mb-4">
                                                                <div class="card" id="{{ $data->id }}"
                                                                    style="box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);"
                                                                    data-card-id="{{ $data->id }}">
                                                                    <div class="card-footer text-center">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-end">
                                                                            <label class="mb-0 me-2">
                                                                                <input type="checkbox"
                                                                                    id="selectedButtons"
                                                                                    name="selectedButtons[]"
                                                                                    value="{{ $data->id }}"
                                                                                    class="checkbox"
                                                                                    style="display: none;">
                                                                            </label>
                                                                            @if (strtolower(trim($data->icon)) === 'bi bi-facebook')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill face"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-twitter')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill twi"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-instagram')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill insta"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-linkedin')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill link"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-telegram')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill tele"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-tiktok')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill tiktok"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-spotify')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill spo"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-youtube')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill youtube"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @elseif (strtolower(trim($data->icon)) === 'bi bi-bag-fill')
                                                                                <button style="color: white;"
                                                                                    type="button"
                                                                                    class="col-xl-12 col-12 btn btn-label rounded-pill olshop"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="{{ $data->id }}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="{{ $data->id }}"
                                                                                    onclick="toggleCardHover('{{ $data->id }}')">
                                                                                    <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                                                        style="color: white;"></i>
                                                                                    {{ $data->name_button }}
                                                                                </button>
                                                                            @else
                                                                                Button tidak ada!
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm previestab"
                                                            data-previous="v-pills-bill-info-tab"
                                                            style="font-size: 13px;"><i
                                                                class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>Sebelumnya</button>
                                                        <button type="submit" id="submitButton"
                                                            class="btn btn-label right ms-auto nexttab nexttab"
                                                            style="background: #088C0D; color: #FFF;" {{-- data-nexttab="v-pills-finish-tab" --}}
                                                            onclick="return validateForm();"><i
                                                                class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Kirim</button>

                                                    </div>
                                                </div>
                                                {{-- <div class="tab-pane fade" id="v-pills-finish" role="tabpanel"
                                                    aria-labelledby="v-pills-finish-tab">
                                                    <div class="text-center pt-4 pb-2">

                                                        <div class="mb-4">
                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json"
                                                                trigger="loop" colors="primary:#0ab39c,secondary:#405189"
                                                                style="width:120px;height:120px"></lord-icon>
                                                        </div>
                                                        <h5>Microsite telah Anda Buat</h5>
                                                        <p class="text-muted">Lanjut untuk microsite Anda!</p>
                                                    </div>
                                                </div> --}}
                                                <!-- end tab pane -->
                                            </div>
                                            <!-- end tab content -->
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-wizard.init.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const linkMicrositeInput = document.getElementById('linkMicrosite');
        const linkMicrositeError = document.getElementById('linkMicrositeError');
        const successMessage = document.getElementById('successMessage');

        linkMicrositeInput.addEventListener('input', validateLinkMicrosite);

        function validateLinkMicrosite() {
            const linkMicrosite = linkMicrositeInput.value;

            if (linkMicrosite.trim() === '') {
                linkMicrositeError.textContent = '';
                successMessage.textContent = '';
                return;
            }

            const regexPattern = /^[a-zA-Z0-9\s-]+$/;

            if (!regexPattern.test(linkMicrosite)) {
                linkMicrositeError.textContent =
                    'Link Microsite hanya boleh berisi huruf (a-z atau A-Z), angka (0-9), spasi, dan tanda "-"';
                successMessage.textContent = ''; // Hapus pesan sukses jika validasi gagal
            } else {
                linkMicrositeError.textContent = '';
                successMessage.textContent = 'Link Microsite Anda sudah berisi data yang valid!';
            }
        }
    </script>

    <script>
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('click', function() {
                const micrositeId = this.getAttribute('data-microsite-id');

                const radio = document.querySelector(`#tema${micrositeId}`);

                const isChecked = radio.checked;

                cards.forEach(otherCard => {
                    if (otherCard !== this) {
                        otherCard.classList.remove('hover');
                        otherCard.style.border = "none";
                    }
                });

                radio.checked = !isChecked;
                this.classList.toggle('hover');
                if (this.classList.contains('hover')) {
                    this.style.border = "";
                } else {
                    this.style.border = "none";
                }
            });
        });
    </script>

    <script>
        function showSweetAlert() {
            var userSubscribe = "{{ $user->subscribe }}";
            var existingMicrosites = {{ $micrositeCount ?? 0 }};
            var inputsAreValid = validateInputs();
            var maxMicrosites;

            if (userSubscribe === 'free') {
                maxMicrosites = 3;
            } else if (userSubscribe === 'silver') {
                maxMicrosites = 5;
            } else if (userSubscribe === 'gold') {
                maxMicrosites = 10;
            } else if (userSubscribe === 'platinum') {
                maxMicrosites = Infinity;
            }

            if (existingMicrosites >= maxMicrosites) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda telah mencapai batas maksimum ' + maxMicrosites + ' microsite',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('microsite') }}";
                    }
                });
            } else if (inputsAreValid) {
                $('#form-create').submit();
            }
        }

        function validateInputs() {
            var name_microsite_val = $('#name_microsite').val();
            var linkMicrosite_val = $('#linkMicrosite').val();
            var errorMessage = '';

            var micrositeSelection = document.querySelector('input[name="microsite_selection"]:checked');
            if (!micrositeSelection) {
                errorMessage = 'Silakan pilih jenis microsite yang sesuai dengan kebutuhan Anda.';
            }

            if (name_microsite_val === '' && linkMicrosite_val === '') {
                errorMessage += 'Nama microsite dan Link microsite harus diisi. ';
            } else {
                if (name_microsite_val === '') {
                    errorMessage += 'Nama microsite harus diisi. ';
                }
                if (linkMicrosite_val === '') {
                    errorMessage += 'Link microsite harus diisi. ';
                }
            }

            var selectedButtons = document.querySelectorAll('input[name="selectedButtons[]"]:checked');
            if (selectedButtons.length === 0) {
                errorMessage += 'Silakan pilih setidaknya satu sosial media. ';
            }

            if (errorMessage !== '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan!',
                    text: errorMessage,
                    confirmButtonText: 'Mengerti'
                });
                return false;
            }

            return true;
        }

        document.addEventListener("DOMContentLoaded", function() {
            var submitButton = document.getElementById("submitButton");
            if (submitButton) {
                submitButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    showSweetAlert();
                });
            }
        });
    </script>

    <script>
        var selectedButtons = [];

        function toggleCardHover(cardId) {
            var card = document.getElementById(cardId);
            var checkbox = $("input[type='checkbox'][value='" + cardId + "']");
            var cardElement = $(card);

            if (checkbox.is(":checked")) {
                checkbox.prop("checked", false);
                cardElement.removeClass("selected-card hover");
                cardElement.css("border", "none");

                var index = selectedButtons.indexOf(cardId);
                if (index !== -1) {
                    selectedButtons.splice(index, 1);
                }
            } else {
                if (selectedButtons.length >= 4) {
                    var firstSelectedButtonId = selectedButtons.shift();
                    var firstSelectedButton = document.getElementById(firstSelectedButtonId);
                    var firstSelectedCheckbox = $("input[type='checkbox'][value='" + firstSelectedButtonId + "']");
                    firstSelectedCheckbox.prop("checked", false);
                    $(firstSelectedButton).removeClass("selected-card hover");
                    $(firstSelectedButton).css("border", "none");
                }

                checkbox.prop("checked", true);
                cardElement.addClass("selected-card hover");
                selectedButtons.push(cardId);
            }
        }
    </script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function replaceSpacesWithDash(inputField) {
            if (inputField.id === "micrositeUrl") {
                var value = inputField.value;
                var modifiedValue = value.replace(/ /g, "-");
                inputField.value = modifiedValue;
            }
        }

        var addressInput = document.getElementById("micrositeUrl");
        if (addressInput) {
            addressInput.addEventListener("input", function() {
                replaceSpacesWithDash(this);
            });
        }
    </script>
@endsection
