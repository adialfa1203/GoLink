@extends('layout.admin.app')
@section('title', 'Sosial')
@section('style')
    <style>
        .page-content {
            overflow-x: hidden;
            background-color: #fff;
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
                                                {{ $data->name_button }}
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <div class="dropdown float-end">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted fs-lg"><i
                                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop1{{ $data->id }}"
                                                        role="button">Edit</a>
                                                    <button type="button" class="dropdown-item delete-button"
                                                        data-id="{{ $data->id }}">Hapus</button>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="staticBackdrop1{{ $data->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit
                                                                Sosial</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('update.button', ['id' => $data->id]) }}">
                                                                @csrf
                                                                <!-- Tambahkan input untuk mengidentifikasi data yang akan diubah -->
                                                                <input type="hidden" name="sosial_id"
                                                                    value="{{ $data->id }}">
                                                                <div class="col-xxl-12 mt-2 col-md-12">
                                                                    <div class="mt-2">
                                                                        <label for="name_button" class="form-label"
                                                                            style="float: left;">Nama Sosial</label>
                                                                        <input type="text" name="name_button"
                                                                            class="form-control" id="name_button"
                                                                            placeholder="Masukkan Nama Sosial" required
                                                                            value="{{ $data->name_button }}">
                                                                        <div class="invalid-feedback">
                                                                            Harap isi kolom ini sebelum melanjutkan proses.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12 col-md-12">
                                                                    <div class="mt-2">
                                                                        <label for="icon" class="form-label"
                                                                            style="float: left;">Options</label>
                                                                        <select name="icon" class="form-select"
                                                                            id="icon" required>
                                                                            <option value="" disabled selected>
                                                                                Choose...</option>
                                                                            <option value="bi bi-whatsapp"
                                                                                {{ $data->icon == 'bi bi-whatsapp' ? 'selected' : '' }}>
                                                                                WhatsApp</option>
                                                                            <option value="bi bi-facebook"
                                                                                {{ $data->icon == 'bi bi-facebook' ? 'selected' : '' }}>
                                                                                Facebook</option>
                                                                            <option value="bi bi-twitter"
                                                                                {{ $data->icon == 'bi bi-twitter' ? 'selected' : '' }}>
                                                                                Twitter</option>
                                                                            <option value="bi bi-telephone-fill"
                                                                                {{ $data->icon == 'bi bi-telephone-fill' ? 'selected' : '' }}>
                                                                                Telephone
                                                                            </option>
                                                                            <option value="bi bi-instagram"
                                                                                {{ $data->icon == 'bi bi-instagram' ? 'selected' : '' }}>
                                                                                Instagram</option>
                                                                            <option value="bi bi-linkedin"
                                                                                {{ $data->icon == 'bi bi-linkedin' ? 'selected' : '' }}>
                                                                                LinkedIn</option>
                                                                            <option value="bi bi-telegram"
                                                                                {{ $data->icon == 'bi bi-telegram' ? 'selected' : '' }}>
                                                                                Telegram</option>
                                                                            <option value="bi bi-tiktok"
                                                                                {{ $data->icon == 'bi bi-tiktok' ? 'selected' : '' }}>
                                                                                TikTok</option>
                                                                            <option value="bi bi-spotify"
                                                                                {{ $data->icon == 'bi bi-spotify' ? 'selected' : '' }}>
                                                                                Spotify</option>
                                                                            <option value="bi bi-youtube"
                                                                                {{ $data->icon == 'bi bi-youtube' ? 'selected' : '' }}>
                                                                                YouTube</option>
                                                                            <option value="bi bi-bag-fill"
                                                                                {{ $data->icon == 'bi bi-bag-fill' ? 'selected' : '' }}>
                                                                                Online Shop</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between gap-3 mt-4">
                                                                    <button type="button" class="btn btn-light button"
                                                                        style="background-color: #FF2323; color: #fff;"
                                                                        data-bs-dismiss="modal">
                                                                        Batal
                                                                    </button>
                                                                    <button type="submit" class="btn"
                                                                        style="background-color: #088C0D; color: #fff;">
                                                                        Kirim
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (strtolower(trim($data->icon)) === 'bi bi-facebook')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill face"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-twitter')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill twi"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-instagram')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill insta"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-linkedin')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill link"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-telegram')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill tele"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-tiktok')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill tiktok"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-spotify')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill spo"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-youtube')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill youtube"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @elseif (strtolower(trim($data->icon)) === 'bi bi-bag-fill')
                                        <button style="color: white;" type="button"
                                            class="col-xl-12 col-12 btn btn-label rounded-pill olshop"
                                            data-bs-toggle="collapse" data-bs-target="{{ $data->id }}"
                                            aria-expanded="true" aria-controls="{{ $data->id }}">
                                            <i class="{{ $data->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                                style="color: white;"></i>
                                            {{ $data->name_button }}
                                        </button>
                                    @else
                                    @endif
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
                </div>
                <div class="modal-body">
                    <form action="{{ route('save.button') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="col-xxl-12 mt-2 col-md-12">
                            <div class="mt-2">
                                <label for="name_button" class="form-label">Nama Sosial</label>
                                <input type="text" name="name_button" class="form-control" id="name_button"
                                    placeholder="Masukkan Nama Sosial" required value="{{ old('name_button') }}">
                            </div>
                            @if ($errors->has('name_button'))
                                <span class="text-danger">{{ $errors->first('name_button') }}</span>
                            @endif
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
                                    <option value="bi bi-youtube" {{ old('icon') === 'bi bi-youtube' ? 'selected' : '' }}>
                                        YouTube</option>
                                    <option value="bi bi-bag-fill"
                                        {{ old('icon') === 'bi bi-bag-fill' ? 'selected' : '' }}>
                                        Online Shop</option>
                                </select>
                                <div class="invalid-feedback">
                                    Harap isi kolom ini sebelum melanjutkan proses.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start justify-content-between gap-3 mt-4">
                            <button type="button" class="btn btn-light button"
                                style="background-color: #FF2323; color: #fff;" data-bs-dismiss="modal">
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
