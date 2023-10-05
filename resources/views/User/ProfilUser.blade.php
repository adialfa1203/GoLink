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
                                    {{-- <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input d-none"> --}}
                                    {{-- <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light btn-sm position-absolute end-0 top-0 m-3"> --}}
                                    {{-- <i class="ri-image-edit-line align-bottom me-1"></i> Edit Cover Images --}}
                                    {{-- </label> --}}
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

                            <div class="card-body border-top">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                            <div>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                         <!--end col-->
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="lastnameInput" class="form-label">Nomor Telepon</label>
                                                <input type="number" name="number" class="form-control"
                                                    value="{{ $user->number }}">
                                            </div>
                                            <div>
                                                @if ($errors->has('number'))
                                                    <span class="text-danger">{{ $errors->first('number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="lastnameInput" class="form-label">E-mail</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $user->email }}">
                                            </div>
                                            <div>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Kata sandi lama</label>
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
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Kata sandi baru</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input name="new_password" type="password"
                                                        class="form-control pe-5 password-input "
                                                        placeholder="Kata sandi baru">
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="password-addon">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    @if ($errors->has('new_password'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('new_password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Konfirmasi kata sandi
                                                    baru</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input name="new_password_confirmation" type="password"
                                                        class="form-control pe-5 password-input "
                                                        placeholder="Konfirmasi kata sandi">
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="password-addon">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    @if ($errors->has('new_password_confirmation'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
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
@endsection
