@extends('layout.admin.app')
@section('title', 'Sosial')
@section('style')
    <style>
        .page-content {
            overflow-x: hidden;
            background-color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-4">
                    <button class="btn btn-label" style="background-color: #088C0D; color:#fff;" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop" role="button">
                        <i class="ri-add-line label-icon align-middle fs-lg" style="color: #fff"></i>Tambah Sosial
                    </button>
                </div>
            </div>

            <div class="row mt-4">
                @if ($button->isEmpty())
                    <div class="card page-content">
                        <div class="container-fluid">
                            <div class="d-flex flex-column align-items-center">
                                <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.png') }}"
                                    alt="Gambar">
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                    <h5 class="mt-2">Maaf! Belum Ada Data Yang Ditemukan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($button as $data)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card"
                                style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);">
                                <div class="card-body">
                                    <div class=" text-center d-flex">
                                        <div class="col-10">
                                            <p class="ms-2" style="float: left; font-weight: bold;">
                                                {{ $data->name_button }}</p>
                                        </div>
                                        <div class="col-2">
                                            <div class="dropdown float-end">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted fs-lg"><i
                                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit.button', ['id' => $data->id]) }}">Edit</a>
                                                    <button type="button" class="dropdown-item delete-button"
                                                        data-id="{{ $data->id }}">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button style="background-color: {{ $data->color_hex }}; color: white;" type="button"
                                        class="col-xl-12 col-12 btn btn-label rounded-pill" data-bs-toggle="collapse"
                                        data-bs-target="{{ $data->id }}" aria-expanded="true"
                                        aria-controls="{{ $data->id }}">
                                        <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                            style="color: white;"></i>
                                        {{ $data->name_button }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Sosial</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save.button') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="col-xxl-12 mt-2 col-md-12">
                            <div class="mt-2">
                                <label for="name_button" class="form-label">Nama Sosial</label>
                                <input type="text" name="name_button" class="form-control" id="name_button"
                                    placeholder="Masukkan Nama Sosial" required value="{{ old('name_button') }}">
                                <div class="invalid-feedback">
                                    Harap isi kolom ini sebelum melanjutkan proses.
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 mt-2 col-md-12">
                            <div class="mt-2">
                                <label for="icon" class="form-label">Sosial Media</label>
                                <select name="icon" class="form-select" id="icon" required>
                                    <option value="" disabled selected>Pilih Sosial Media...</option>
                                    <option value="bi bi-facebook"
                                        {{ old('icon') === 'bi bi-facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="bi bi-twitter" {{ old('icon') === 'bi bi-twitter' ? 'selected' : '' }}>
                                        Twitter</option>
                                    <option value="bi bi-instagram"
                                        {{ old('icon') === 'bi bi-instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="bi bi-linkedin"
                                        {{ old('icon') === 'bi bi-linkedin' ? 'selected' : '' }}>Linkedin</option>
                                    <option value="bi bi-telegram"
                                        {{ old('icon') === 'bi bi-telegram' ? 'selected' : '' }}>Telegram</option>
                                    <option value="bi bi-tiktok" {{ old('icon') === 'bi bi-tiktok' ? 'selected' : '' }}>
                                        Tiktok</option>
                                    <option value="bi bi-spotify" {{ old('icon') === 'bi bi-spotify' ? 'selected' : '' }}>
                                        Spotify</option>
                                </select>
                                <div class="invalid-feedback">
                                    Harap isi kolom ini sebelum melanjutkan proses.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-2 col-md-6">
                            <div>
                                <label for="colorPicker" class="form-label">Color Picker</label>
                                <input type="color" class="form-control form-control-color w-100" id="colorPicker"
                                    name="color_hex" required value="{{ old('color_hex') }}">
                                <div class="invalid-feedback">
                                    Harap isi kolom ini sebelum melanjutkan proses.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start justify-content-between gap-3 mt-4">
                            <button type="button" class="btn btn-light button" style="background-color: #FF2323; color:#fff;" data-bs-dismiss="modal">
                                <i class="ri-arrow-left-line label-icon align-middle fs-lg me-2" style="color: #fff"></i>
                                Batal
                            </button>
                            <button type="submit" class="btn" style="background-color: #088C0D; color: #fff;">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                confirmDelete(id);
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/delete-button/' + id;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Dibatalkan',
                        'Data tetap aman :)',
                        'error'
                    );
                }
            });
        }
    </script>

@endsection
