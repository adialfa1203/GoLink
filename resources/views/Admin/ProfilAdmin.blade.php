@extends('layout.admin.app')

@section('title', 'Profil')
@section('style')
    <style>
        .biru {
            width: 926px;
            height: 179px;
            flex-shrink: 0;
            border-radius: 20px;
            background: #104898;
        }

        .foto {
            margin-left: -50px;
        }

        .vatar {
            padding: 40px;
        }

        .texs {
            padding: 20px;
            margin-left: 0px;
        }

        @media (max-width: 768px) {

            /* Atur gaya CSS khusus untuk perangkat laptop di sini */
            .biru {
                /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
                width: 279px;
                height: 279px;
            }

            .texs {
                text-align: center;
                margin-left: 4px;
            }

            .foto {
                margin-left: -116px;
            }
        }

        .atas {
            border-radius: 20px;
            background: #F0F0F0;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .isi {
            background: #F0F0F0;
        }

        .tex {
            color: #0E2954;
            font-family: Poppins;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
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

        .page-content {
            overflow-x: hidden;
            background-color: #fff;
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->

                <!-- end page title -->
                <div class="row">
                    <!--end col-->
                    <div class="col-xxl-12 ">
                        <div class="card overflow-hidden  atas">
                            <div>
                                <img alt="" style="height: 80px;">
                                <div>
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-n5">
                                <!-- <div class="text-center"> -->
                                <div class="card mx-auto biru">
                                    <div class="profile-user position-relative d-inline-block vatar">
                                        <div class="d-flex row">
                                            <div class="col-12 col-lg-2 col-xl-2 col-sm-6 col-md-6">
                                                <center>
                                                    @if ($admin->profile_picture)
                                                        <img src="{{ asset('profile_pictures/' . $admin->profile_picture) }}"
                                                            alt="{{ $admin->name }}"
                                                            class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                                    @else
                                                        <img src="{{ asset('default/default.jpg') }}"
                                                            alt="{{ $admin->name }}"
                                                            class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                                    @endif
                                                    <input id="profile-img-file-input" name="profile_picture" type="file"
                                                        class="profile-img-file-input d-none">
                                                    <label for="profile-img-file-input"
                                                        class="profile-photo-edit avatar-xs">
                                                        <span class="avatar-title rounded-circle bg-light text-body foto">
                                                            <i class="bi bi-camera"></i>
                                                        </span>
                                                    </label>
                                                </center>
                                            </div>



                                            <div class="texs col-12 col-lg-6 col-xl-6 col-sm-6 col-md-6">
                                                <h5 style="color: #fff;margin: 4px;">{{ $admin->name }}<i
                                                        class=" align-baseline text-info ms-1"></i></h5>
                                                <h5 style="color: #fff;margin: 4px;">{{ $admin->email }}<i
                                                        class=" align-baseline text-info ms-1"></i></h5>
                                            </div>
                                        </div>

                                    </div><br>
                                    @if ($errors->has('profile_picture'))
                                        <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-xxl-12">
                                <div class="card isi">
                                    <div class="card-header isi align-items-xl-center d-xl-flex">
                                        <p class="text-muted flex-grow-1 mb-xl-0"></p>
                                        <div class="flex-shrink-0">
                                            <ul class="nav nav-pills card-header-pills" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active fw-bold" data-bs-toggle="tab"
                                                        href="#developers" role="tab">
                                                        Profil
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold" data-bs-toggle="tab" href="#designers"
                                                        role="tab">
                                                        Kata Sandi
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="developers" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- Div untuk input nama lengkap -->
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label tex">Nama
                                                                Lengkap</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $admin->name }}">
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('name'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>

                                                        <!-- Div untuk input email -->
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label tex">Email</label>
                                                            <div class="position-relative">
                                                                <input name="email" type="text"
                                                                    class="form-control password-input" id="email"
                                                                    placeholder="Masukkan Email"
                                                                    value="{{ $admin->email }}">
                                                            </div>
                                                            <span id="emailError" class="text-danger"></span>
                                                            <span id="successMessage" class="text-success"></span>
                                                            <div>
                                                                @if ($errors->has('email'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>


                                                        <!-- Div untuk input nomor telepon -->
                                                        <div class="mb-3">
                                                            <label for="lastnameInput" class="form-label tex">Nomor
                                                                Telepon</label>
                                                            <input type="number" name="number"
                                                                class="form-control"value="{{ old('number', $admin->number) }}"
                                                                placeholder="08...">
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('number'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="tab-pane" id="designers" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- Div untuk input kata sandi lama -->
                                                        <div class="mb-3">
                                                            <label for="phonenumberInput" class="form-label tex">Kata
                                                                sandi lama</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input name="old_password" type="password"
                                                                    class="form-control pe-5 password-input"
                                                                    placeholder="Kata sandi lama">
                                                                <button
                                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                    type="button" id="password-addon">
                                                                    <i class="ri-eye-fill align-middle"></i>
                                                                </button>
                                                            </div>
                                                            <div>
                                                                @if ($errors->has('old_password'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('old_password') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <!-- Div untuk input kata sandi baru -->
                                                        <div class="mb-3">
                                                            <label for="newPassword" class="form-label tex">Kata sandi
                                                                baru</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input name="new_password" id="newPassword"
                                                                    type="password"
                                                                    class="form-control pe-5 password-input "
                                                                    placeholder="Kata sandi baru">
                                                                <button
                                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                    type="button" id="password-addon">
                                                                    <i class="ri-eye-fill align-middle"></i>
                                                                </button>
                                                                <div id="newPasswordError" class="text-danger mt-2"></div>
                                                                <div id="newPasswordSuccess" class="text-success mt-2">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if ($errors->has('new_password'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('new_password') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <!-- Div untuk konfirmasi kata sandi baru -->
                                                        <div class="mb-3">
                                                            <label for="emailInput" class="form-label tex">Konfirmasi
                                                                kata sandi
                                                                baru</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input name="new_password_confirmation"
                                                                    id="confirmPassword" type="password"
                                                                    class="form-control pe-5 password-input "
                                                                    placeholder="Konfirmasi kata sandi">
                                                                <button
                                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                    type="button" id="password-addon">
                                                                    <i class="ri-eye-fill align-middle"></i>
                                                                </button>
                                                                <div id="confirmPasswordError" class="text-danger mt-2">
                                                                </div>
                                                                <div id="confirmPasswordSuccess"
                                                                    class="text-success mt-2"></div>
                                                            </div>
                                                            <div>
                                                                @if ($errors->has('new_password_confirmation'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn mb-3 me-3"
                                        style="background-color: #088C0D; color:#fff;">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page-content -->
    </form>
@endsection

@section('script')
    <!-- profile-setting init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/password-addon.init.js') }}"></script>

    {{-- Validation Conrifmation New Password --}}
    <script>
        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const newPasswordError = document.getElementById('newPasswordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const newPasswordSuccess = document.getElementById('newPasswordSuccess');
        const confirmPasswordSuccess = document.getElementById('confirmPasswordSuccess');

        newPasswordInput.addEventListener('input', validatePassword);
        confirmPasswordInput.addEventListener('input', validatePassword);

        function validatePassword() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (newPassword.length < 8) {
                newPasswordError.textContent = 'Kata sandi harus memiliki setidaknya 8 karakter.';
                newPasswordSuccess.textContent = '';
            } else {
                newPasswordError.textContent = '';
                newPasswordSuccess.textContent = 'Kata sandi sudah berisi data yang valid!';
            }

            if (confirmPassword !== newPassword) {
                confirmPasswordError.textContent = 'Konfirmasi password tidak cocok.';
                confirmPasswordSuccess.textContent = '';
            } else {
                confirmPasswordError.textContent = '';
                confirmPasswordSuccess.textContent = 'Konfirmasi password sudah benar';
            }
        }
    </script>
    <script>
        const showPopularDataButton = document.getElementById('showPopularData');
        const showAdditionalDataButton = document.getElementById('showAdditionalData');
        const popularDataContainer = document.getElementById('popularDataContainer');
        const additionalDataContainer = document.getElementById('additionalDataContainer');

        showAdditionalDataButton.addEventListener('click', () => {
            popularDataContainer.classList.add('d-none');
            additionalDataContainer.classList.remove('d-none');
        });

        showPopularDataButton.addEventListener('click', () => {
            additionalDataContainer.classList.add('d-none');
            popularDataContainer.classList.remove('d-none');
        });
    </script>
    <script>
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const successMessage = document.getElementById('successMessage');

        emailInput.addEventListener('input', validateEmail);

        function validateEmail() {
            const email = emailInput.value;
            let isAtIncluded = false;
            let isDotComIncluded = false;

            if (email.includes('@')) {
                isAtIncluded = true;
            }

            if (email.includes('.')) {
                isDotComIncluded = true;
            }

            emailError.textContent = '';
            successMessage.textContent = '';

            if (!isAtIncluded) {
                emailError.textContent = 'Alamat email harus menyertakan kata "@".';
            }

            if (!isDotComIncluded && isAtIncluded) {
                emailError.textContent = 'Alamat email harus menyertakan character "."';
            }

            if (isAtIncluded && isDotComIncluded) {
                successMessage.textContent = 'Email Anda valid!';
            }
        }
    </script>
@endsection
