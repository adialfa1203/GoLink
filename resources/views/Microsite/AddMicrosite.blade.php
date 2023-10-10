@extends('layout.user.app')

@section('title', 'Microsite')
@section('style')
<style>
    .page-content {
        overflow-x: hidden;
    }

    /* CSS untuk hover card */
    .hover {
        background-color: #f8f8f8;
        transform: scale(1.05);
        transition: background-color 0.3s, transform 0.3s;
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
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Microsite</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Buat Microsite Baru</h4>
                    </div><!-- end card header -->
                    <div class="card-body form-steps">
                        <form action="{{ route('create.microsite') }}" id="form-create" class="vertical-navs-step needs-validation" novalidate method="POST">
                            @csrf
                            <div class="row gy-5">
                                <div class="col-lg-3">
                                    <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-info" type="button" role="tab" aria-controls="v-pills-bill-info" aria-selected="true">
                                            <span class="step-title me-2">
                                                <i class="ri-close-circle-fill step-icon me-2"></i> Tentukann jenis
                                                microsite anda!
                                            </span>
                                        </button>
                                        <button class="nav-link" id="v-pills-bill-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-address" type="button" role="tab" aria-controls="v-pills-bill-address" aria-selected="false">
                                            <span class="step-title me-2">
                                                <i class="ri-close-circle-fill step-icon me-2"></i> Pilih nama anda!
                                            </span>
                                        </button>
                                        <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment" aria-selected="false">
                                            <span class="step-title me-2">
                                                <i class="ri-close-circle-fill step-icon me-2"></i> Pilih media sosial
                                                anda!
                                            </span>
                                        </button>
                                        {{-- <button class="nav-link" id="v-pills-finish-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-finish" type="button" role="tab"
                                                aria-controls="v-pills-finish" aria-selected="false">
                                                <span class="step-title me-2">
                                                    <i class="ri-close-circle-fill step-icon me-2"></i> Kirim
                                                </span>
                                            </button> --}}
                                    </div>
                                    <!-- end nav -->
                                </div> <!-- end col-->

                                <div class="col-lg-9">
                                    <div class="px-lg-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-bill-info" role="tabpanel" aria-labelledby="v-pills-bill-info-tab">
                                                <div>
                                                    <h5>Jenis Microsite</h5>
                                                    <p class="text-muted">Pilih jenis microsite yang cocok dengan
                                                        kebutuhan Anda!</p>
                                                </div>
                                                <div class="row">
                                                    @foreach ($data as $microsite)
                                                    <div class="col-xl-4 col-sm-6 mb-4">
                                                        <div class="card clickable-card" data-microsite-id="{{ $microsite->id }}">
                                                            <div class="text-center">
                                                                <div class="dropdown float-end">
                                                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    </a>
                                                                </div>
                                                                <strong class="fs-md text-muted mb-0">{{ $microsite->name }}</strong>
                                                            </div>
                                                            <div>
                                                                <img src="{{ asset('component/' . $microsite->cover_img) }}" alt="" class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
                                                            </div>
                                                            <div class="card-body pt-0 mt-n5">
                                                                <div class="text-center">
                                                                    <div class="profile-user position-relative d-inline-block mx-auto">
                                                                        <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/default.jpg') }}" alt="" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                                                    </div>
                                                                </div>
                                                                <div class="text-center mt-3">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" id="tema{{ $microsite->id }}" name="microsite_selection" value="{{ $microsite->id }}" class="form-check-input">&nbsp;
                                                                        {{ $microsite->component_name }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-bill-address-tab"><i class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Selanjutnya</button>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                            <div class="tab-pane fade" id="v-pills-bill-address" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                <div>
                                                    <h5>Pilih Nama</h5>
                                                    <p class="text-muted">Buat nama dan link sesuai keinginan Anda!</p>
                                                </div>
                                                <div>
                                                    <div class="row g-2">
                                                        <div class="col-12">
                                                            <label for="address" class="form-label">Nama
                                                                Microsite</label>
                                                            <input type="text" class="form-control" id="address" name="name" placeholder="Nama Microsite">
                                                            <p class="is-invalid" id="error-regex"></p>
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('name'))
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="micrositeUrl" class="form-label">Tautan
                                                                Microsite</label>
                                                            <div class="input-group">
                                                                <button type="button" class="btn btn-danger bg-gradient">Go.Link/</button>
                                                                <input type="text" class="form-control" id="linkMicrosite" placeholder="Tautan Microsite" name="link_microsite">
                                                            </div>
                                                            <span class="is-invalid text-danger mt-2" id="linkMicrositeError"></span>
                                                            <span class="text-success mt-3" id="successMessage"></span>
                                                            <div>
                                                                @if ($errors->has('link_microsite'))
                                                                <span class="text-danger">{{ $errors->first('link_microsite') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <div class="col-6 col-md-6">
                                                        <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>Sebelumnya</button>
                                                    </div>
                                                    <div class="col-6 col-md-6" style="margin-left: -8px;">
                                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab" style="float: right;"><i class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Selanjutnya</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end tab pane -->
                                            <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                                <div>
                                                    <h5>Sosial Media</h5>
                                                    <p class="text-muted">Pilih sosial media yang sering anda gunakan!
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    @foreach ($button as $data)
                                                    <div class="col-xl-4 col-sm-6 mb-4">
                                                        <div class="card" id="{{ $data->id }}" data-card-id="{{ $data->id }}">
                                                            <div class="card-footer text-center">
                                                                <div class="d-flex align-items-center justify-content-end">
                                                                    <label class="mb-0 me-2">
                                                                        <input type="checkbox" name="selectedButtons[]" value="{{ $data->id }}" class="checkbox" style="display: none;">
                                                                    </label>
                                                                    <button style="background-color: {{ $data->color_hex }}; color: white;" type="button" name="button" value="{{ $data->name_button }}" class="col-xl-12 col-12 btn btn-label rounded-pill" data-button-value="{{ $data->id }}" onclick="toggleCardHover('{{ $data->id }}')">
                                                                        <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                                                        {{ $data->name_button }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-address-tab"><i class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                        Sebelumnya</button>
                                                    <button type="submit" id="submitButton" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-finish-tab" onclick="return validateForm();"><i class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Kirim</button>

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
                                <!-- end row -->
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
    function showSweetAlert() {
        var maxMicrosites = 3;
        var existingMicrosites = {
            {
                $micrositeCount ?? 0
            }
        };

        if (existingMicrosites >= maxMicrosites) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda telah mencapai batas maksimum 3 microsite',
            });
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var submitButton = document.getElementById(
            "submitButton");
        if (submitButton) {
            submitButton.addEventListener("click", showSweetAlert);
        }
    });
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
                }
            });

            radio.checked = !isChecked;
            this.classList.toggle('hover');
        });
    });
</script>

<script>
    function showSweetAlert() {
        var maxMicrosites = 3;
        var existingMicrosites = {
            {
                $micrositeCount ?? 0
            }
        };

        if (existingMicrosites >= maxMicrosites) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda telah mencapai batas maksimum 3 microsite',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan pengguna ke route yang ditentukan setelah konfirmasi "OK"
                    window.location.href = "{{ route('microsite') }}";
                }
            });
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var submitButton = document.getElementById("submitButton");
        if (submitButton) {
            submitButton.addEventListener("click", function(event) {
                event.preventDefault(); // Cegah pengiriman formulir default
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
            cardElement.css("border", "1px solid black");
            selectedButtons.push(cardId);
        }
    }
</script>
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function validateForm() {
        var micrositeSelection = document.querySelector('input[name="microsite_selection"]:checked');
        if (!micrositeSelection) {
            Swal.fire({
                text: 'Silakan pilih jenis microsite yang cocok dengan kebutuhan Anda!',
                onClose: function() {
                    document.getElementById('v-pills-bill-info-tab').click();
                }
            }).then(function() {
                setTimeout(function() {
                    location.reload();
                }, 0);
            });
            return false;
        }

        // Validasi langkah kedua
        var micrositeName = document.getElementById("address").value;
        var micrositeLink = document.getElementById("link").value;
        if (micrositeName.trim() === "" || micrositeLink.trim() === "") {
            Swal.fire({
                text: 'Silakan isi nama dan tautan microsite sesuai keinginan Anda!',
                onClose: function() {
                    document.getElementById('v-pills-bill-info-tab').click();
                }
            }).then(function() {
                setTimeout(function() {
                    location.reload();
                }, 2000);
            });
            return false;
        }

        var selectedButtons = document.querySelectorAll('input[name="selectedButtons[]"]:checked');
        if (selectedButtons.length === 0) {
            Swal.fire({
                text: 'Silakan pilih setidaknya satu sosial media!',
                onClose: function() {
                    document.getElementById('v-pills-bill-info-tab').click();
                }
            }).then(function() {
                setTimeout(function() {
                    location.reload();
                }, 2000);
            });
            return false;
        }
        return true;
    }
</script>
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
    $('#submitButton').click(function() {
        var input = document.getElementById('link')
        const validateButton = document.getElementById("form-create");
        const inputValue = input.value;
        console.log(inputValue);

        const regexPattern = /^[a-zA-Z\s-]+$/;
        if (regexPattern.test(inputValue)) {
            validateButton.submit()
        } else {
            Swal.fire({
                icon: "error",
                title: "Error!!",
                text: "Terjadi kesalahan saat input data"
            })
            $('#error-link').text('Text yang anda masukkan tidak valid atau mengandung kata terlarang!')
        }
    });
</script>
`
@endsection
