@extends('layout.admin.app')

@section('title', 'Berlangganan')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Tipe Berlangganan</h4>
                    </div>
                </div>
                <form action="" class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Tipe Langganan</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control password-input" id="username"
                                                placeholder="Lite" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="periode" class="form-label">Pilih Periode Berakhir:</label>
                                        <select name="periode" class="form-select" id="periode" required>
                                            <option value="" disabled selected>Pilih Masa Periode...</option>
                                            <option value="1_week" {{ old('periode') === '1_week' ? 'selected' : '' }}>1
                                                Minggu
                                            </option>
                                            <option value="1_month" {{ old('periode') === '1_month' ? 'selected' : '' }}>1
                                                Bulan
                                            </option>
                                            <option value="1_year" {{ old('periode') === '1_year' ? 'selected' : '' }}>1
                                                Tahun
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Harga</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control password-input" id="username"
                                                placeholder="Rp : 1.000.000,00" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Tambah Foto</label>
                                        <div class="position-relative">
                                            <input type="file" class="form-control password-input" id="username"
                                                placeholder="Paket Dasar untuk memulai perjalanan Anda bersama kami"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Deskripsi Langganan</label>
                                        <div class="position-relative">
                                            <textarea class="form-control" id="editor" name="isi" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div id="editor"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <a type="button" href="{{ route('subscribe') }}" class="btn btn-light btn-label previestab"
                                    data-previous="v-pills-bill-address-tab"><i
                                        class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                    Kembali</a>
                                <button type="submit" id="submitButton"
                                    class="btn btn-success btn-label right ms-auto nexttab nexttab"><i
                                        class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Simpan</button>
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
