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
                <form action="{{ route('update.subscribe', ['id' => $subscribe->id]) }}" method="post"
                    enctype="multipart/form-data" class="col-lg-12">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="tipe" class="form-label">Tipe Langganan</label>
                                        <select name="tipe" class="form-select" id="tipe" required>
                                            <option value="" disabled selected>Pilih Tipe Langganan...</option>

                                            <option value="silver"
                                                {{ old('tipe', $subscribe->tipe) === 'silver' ? 'selected' : '' }}>
                                                Silver
                                            </option>
                                            <option value="gold"
                                                {{ old('tipe', $subscribe->tipe) === 'gold' ? 'selected' : '' }}>
                                                Gold
                                            </option>
                                            <option value="platinum"
                                                {{ old('tipe', $subscribe->tipe) === 'platinum' ? 'selected' : '' }}>
                                                Platinum
                                            </option>
                                        </select>
                                        @if ($errors->has('tipe'))
                                            <span class="text-danger">{{ $errors->first('tipe') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Harga</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control password-input" id="username"
                                                name="price" placeholder="Rp : 1.000.000,00" required
                                                value="{{ old('price', $subscribe->price) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="discount" class="form-label">Diskon</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control password-input" id="discount" name="discount" placeholder="Masukkan Jumlah Diskon" max="80" oninput="checkDiscount()">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 md-12 sm-12">
                                    <div class="mb-3">
                                        <label for="discountType" class="form-label">Jenis Diskon</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control password-input" id="type_of_discount" name="type_of_discount" value="{{ old('type_of_discount', $subscribe->type_of_discount) }}" placeholder="Masukkan Jenis Diskon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 md-12 sm-12">
                                    <label for="picture" class="form-label me-3">Tambah Foto</label>
                                    <div class="mb-3 d-flex align-items-center">
                                        <div class="position-relative" style="width: 100%;">
                                            <input type="file" class="form-control password-input" id="picture"
                                                name="picture">
                                            <span id="file-name"></span>
                                            @if ($errors->has('picture'))
                                                <span class="text-danger">{{ $errors->first('picture') }}</span>
                                            @endif
                                        </div>
                                        <button type="button" class="btn btn-link btn-light" data-bs-toggle="modal"
                                            data-bs-target="#imageModal">
                                            <i class="bi bi-eye text-dark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Deskripsi Langganan</label>
                                        <div class="position-relative">
                                            <textarea class="form-control" id="editor" name="description" cols="30" rows="10">{{ old('description', $subscribe->description) }}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                    <div id="editor" name="description">{{ old('description') }}</div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <a type="button" href="{{ route('subscribe') }}"
                                    class="btn btn-light btn-label previestab" data-previous="v-pills-bill-address-tab"><i
                                        class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                    Kembali</a>
                                <button type="submit" id="submitButton"
                                    class="btn btn-success btn-label right ms-auto nexttab nexttab"><i
                                        class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Gambar Langganan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img id="modalImage" src="" alt="Gambar Langganan" style="max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Langganan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Gambar Langganan" style="max-width: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
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
    <script>
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        const imgPreview = document.querySelector('#modalImage');
        const imgButton = document.querySelector('.btn-link');
        const inputPicture = document.getElementById('picture');

        imgButton.addEventListener('click', function() {
            const imgSrc = inputPicture.files.length ?
                URL.createObjectURL(inputPicture.files[0]) :
                "{{ asset('pictureSubs/' . $subscribe->picture) }}";
            imgPreview.src = imgSrc;
            imageModal.show();
        });

        inputPicture.addEventListener('change', function() {
            const imgSrc = inputPicture.files.length ?
                URL.createObjectURL(inputPicture.files[0]) :
                "{{ asset('pictureSubs/' . $subscribe->picture) }}";
            imgPreview.src = imgSrc;
        });
    </script>
    <script>
        function checkDiscount() {
            var discountInput = document.getElementById('discount');
            var discountTypeInput = document.getElementById('type_of_discount');

            if (discountInput.value.trim() !== '') {
                discountTypeInput.required = true;
            } else {
                discountTypeInput.required = false;
            }
        }
    </script>
@endsection
@endsection
