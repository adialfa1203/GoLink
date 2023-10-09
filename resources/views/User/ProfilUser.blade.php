@extends('layout.user.app')

@section('title', 'Profil')

@section('content')
    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-xl-12 ">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Profil Pengguna</h4>
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <!--end col-->
                    <div class="col-xxl-12">
                        <div class="card overflow-hidden">
                            <div>
                                <img alt="" style="height: 80px;">
                                <div>
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-n5">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto">
                                        <img src="{{ asset('profile_pictures/' . ($user->profile_picture ? $user->profile_picture : 'default.jpg')) }}"
                                            alt="{{ $user->name }}"
                                            class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                        <div
                                            class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                            <input id="profile-img-file-input" name="profile_picture" type="file"
                                                class="profile-img-file-input d-none">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="bi bi-camera"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        @if ($errors->has('profile_picture'))
                                            <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <h5>{{ $user->name }}<i class=" align-baseline text-info ms-1"></i></h5>
                                        <p class="text-muted">{{ $accountStatus }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills animation-nav nav-justified gap-2 mb-3" role="tablist">
                                            <li class="nav-item ">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#animation-home"
                                                    role="tab">
                                                    Profil
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" data-bs-toggle="tab" href="#animation-profile"
                                                    role="tab">
                                                    Kata Sandi
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="animation-home" role="tabpanel">
                                                <div class="card-body border-top">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <!-- Div untuk input nama lengkap -->
                                                                <div class="mb-3">
                                                                    <label for="firstnameInput" class="form-label">Nama
                                                                        Lengkap</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control" value="{{ $user->name }}">
                                                                </div>
                                                                <div>
                                                                    @if ($errors->has('name'))
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>

                                                                <!-- Div untuk input email -->
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <div class="position-relative">
                                                                        <input name="email" type="text"
                                                                            class="form-control password-input"
                                                                            id="email" placeholder="Masukkan Email"
                                                                            value="{{ $user->email }}">
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
                                                                    <label for="lastnameInput" class="form-label">Nomor
                                                                        Telepon</label>
                                                                    <input type="number" name="number"
                                                                        class="form-control" value="{{ $user->number }}">
                                                                </div>
                                                                <div>
                                                                    @if ($errors->has('number'))
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('number') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="animation-profile" role="tabpanel">
                                                <div class="card-body border-top">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <!-- Div untuk input kata sandi lama -->
                                                                <div class="mb-3">
                                                                    <label for="phonenumberInput" class="form-label">Kata
                                                                        sandi lama</label>
                                                                    <div
                                                                        class="position-relative auth-pass-inputgroup mb-3">
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
                                                                    <label for="newPassword" class="form-label">Kata sandi
                                                                        baru</label>
                                                                    <div
                                                                        class="position-relative auth-pass-inputgroup mb-3">
                                                                        <input name="new_password" id="newPassword"
                                                                            type="password"
                                                                            class="form-control pe-5 password-input "
                                                                            placeholder="Kata sandi baru">
                                                                        <button
                                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                            type="button" id="password-addon">
                                                                            <i class="ri-eye-fill align-middle"></i>
                                                                        </button>
                                                                        <div id="newPasswordError"
                                                                            class="text-danger mt-2"></div>
                                                                        <div id="newPasswordSuccess"
                                                                            class="text-success mt-2"></div>
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
                                                                    <label for="emailInput" class="form-label">Konfirmasi
                                                                        kata sandi
                                                                        baru</label>
                                                                    <div
                                                                        class="position-relative auth-pass-inputgroup mb-3">
                                                                        <input name="new_password_confirmation"
                                                                            id="confirmPassword" type="password"
                                                                            class="form-control pe-5 password-input "
                                                                            placeholder="Konfirmasi kata sandi">
                                                                        <button
                                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                            type="button" id="password-addon">
                                                                            <i class="ri-eye-fill align-middle"></i>
                                                                        </button>
                                                                        <div id="confirmPasswordError"
                                                                            class="text-danger mt-2"></div>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-success mb-3 me-3">Simpan</button>
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

            // if (email.endsWith('.com')) {
            //     isDotComIncluded = true;
            // }

            emailError.textContent = '';
            successMessage.textContent = '';

            if (!isAtIncluded) {
                emailError.textContent = 'Alamat email harus menyertakan kata "@".';
            }

            // if (!isDotComIncluded && isAtIncluded) {
            //     emailError.textContent = 'Alamat email harus berakhir dengan kata ".com".';
            // }

            if (isAtIncluded && isDotComIncluded) {
                successMessage.textContent = 'Email Anda valid!';
            }
        }
    </script>
@endsection
