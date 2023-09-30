@extends('layout.admin.app')
@section('title', 'Sosial')
@section('style')
    <!-- One of the following themes -->
    <link rel="stylesheet"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/%40simonwep/pickr/themes/classic.min.css') }}">
    <!-- 'classic' theme -->
    <link rel="stylesheet"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/%40simonwep/pickr/themes/monolith.min.css') }}">
    <!-- 'monolith' theme -->
    <link rel="stylesheet"
        href="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/%40simonwep/pickr/themes/nano.min.css') }}">
    <!-- 'nano' theme -->
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update.button', ['id' => $button->id]) }}" method="POST">
                            @csrf
                            <div class="col-xxl-12 col-md-12">
                                <div class="mt-2">
                                    <label for="name_button" class="form-label">Nama Button</label>
                                    <input type="text" name="name_button" class="form-control" id="name_button"
                                        placeholder="Nama Button" value="{{ $button->name_button }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <div class="mt-2">
                                    <label for="icon" class="form-label">Options</label>
                                    <select name="icon" class="form-select" id="icon" required>
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="bi bi-whatsapp"
                                            {{ $button->icon == 'bi bi-whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                        <option value="bi bi-facebook"
                                            {{ $button->icon == 'bi bi-facebook' ? 'selected' : '' }}>Facebook</option>
                                        <option value="bi bi-twitter"
                                            {{ $button->icon == 'bi bi-twitter' ? 'selected' : '' }}>Twitter</option>
                                        <option value="bi bi-telephone-fill"
                                            {{ $button->icon == 'bi bi-telephone-fill' ? 'selected' : '' }}>Telephone
                                        </option>
                                        <option value="bi bi-instagram"
                                            {{ $button->icon == 'bi bi-instagram' ? 'selected' : '' }}>Instagram</option>
                                        <option value="bi bi-linkedin"
                                            {{ $button->icon == 'bi bi-linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                        <option value="bi bi-telegram"
                                            {{ $button->icon == 'bi bi-telegram' ? 'selected' : '' }}>Telegram</option>
                                        <option value="bi bi-tiktok"
                                            {{ $button->icon == 'bi bi-tiktok' ? 'selected' : '' }}>TikTok</option>
                                        <option value="bi bi-spotify"
                                            {{ $button->icon == 'bi bi-spotify' ? 'selected' : '' }}>Spotify</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-6">
                                <div>
                                    <label for="colorPicker" class="form-label">Color Picker</label>
                                    <input type="color" class="form-control form-control-color w-100" id="colorPicker"
                                        name="color_hex" value="{{ $button->color_hex }}">
                                </div>
                            </div>
                            <div class="d-flex align-items-start justify-content-between gap-3 mt-4">
                                <a href="{{ route('view.button') }}" class="btn btn-light">Kembali</a>
                                <button type="submit" class="btn btn-success right ms-auto">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
