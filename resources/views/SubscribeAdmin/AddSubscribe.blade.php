@extends('layout.admin.app')

@section('title', 'Berlangganan')
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
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Tipe Berlangganan</h4>
                    </div>
                </div> --}}
                <form action="{{ route('create.subscribe') }}" method="post" enctype="multipart/form-data" class="col-lg-12">
                    @csrf
                    <div class="card" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="tipe" class="form-label">Tipe Langganan</label>
                                        <select name="tipe" class="form-select" id="tipe" required>
                                            <option value="" disabled selected>Pilih Tipe Langganan...</option>
                                            <option value="free" {{ old('tipe') === 'free' ? 'selected' : '' }}>
                                                Gratis
                                            </option>
                                            <option value="silver" {{ old('tipe') === 'silver' ? 'selected' : '' }}>
                                                Tingkatan Dasar
                                            </option>
                                            <option value="gold" {{ old('tipe') === 'gold' ? 'selected' : '' }}>
                                                Tingkatan Menengah
                                            </option>
                                            <option value="platinum" {{ old('tipe') === 'platinum' ? 'selected' : '' }}>
                                                Tingkatan Premium
                                            </option>
                                        </select>
                                        @if ($errors->has('tipe'))
                                            <span class="text-danger">{{ $errors->first('tipe') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="period" class="form-label">Pilih Periode Berakhir:</label>
                                        <select name="period" class="form-select" id="period" required>
                                            <option value="" disabled selected>Pilih Masa Periode...</option>
                                            <option value="forever" {{ old('period') === 'forever' ? 'selected' : '' }}>
                                                Selamanya
                                            </option>
                                            <option value="1_week" {{ old('period') === '1_week' ? 'selected' : '' }}>1
                                                Minggu
                                            </option>
                                            <option value="1_month" {{ old('period') === '1_month' ? 'selected' : '' }}>1
                                                Bulan
                                            </option>
                                            <option value="1_year" {{ old('period') === '1_year' ? 'selected' : '' }}>1
                                                Tahun
                                            </option>
                                        </select>
                                        @if ($errors->has('period'))
                                            <span class="text-danger">{{ $errors->first('period') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Harga</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control password-input" id="username"
                                                name="price" placeholder="Minimal 0 rupiah" required
                                                value="{{ old('number') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Tambah Foto</label>
                                        <div class="position-relative">
                                            <input type="file" class="form-control password-input" id="picture"
                                                name="picture"
                                                placeholder="Paket Dasar untuk memulai perjalanan Anda bersama kami"
                                                required>
                                            @if ($errors->has('picture'))
                                                <span class="text-danger">{{ $errors->first('picture') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Deskripsi Langganan</label>
                                        <div class="position-relative">
                                            <textarea class="form-control" id="editor" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <a type="button" href="{{ route('subscribe') }}"
                                class="btn btn-light button"><i class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>Kembali</a>
                                <button type="submit" class="btn right ms-auto" style="background-color: #088C0D; color: #fff;">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@endsection
