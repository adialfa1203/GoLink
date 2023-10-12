@extends('layout.admin.app')
@section('title', 'Kategori')
<style>
    .page-content {
        overflow-x: hidden;
    }

    @media (min-width: 1025px) {

        /* Atur gaya CSS khusus untuk perangkat laptop di sini */
        .kotak {
            /* style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;" */
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
    }
</style>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="">
            <div class="d-flex align-items-start gap-3 mt-4">
                <a class="btn btn-success btn-label" href="{{ route('create.component') }}" role="button">
                    <i class="ri-add-line label-icon align-middle fs-lg ms-2"></i>Tambah Kategori
                </a>
            </div>
            <div class="row mt-4">
                @if ($component->isEmpty())
                <div class="card page-content">
                    <div class="container-fluid">
                        <div class="d-flex flex-column align-items-center">
                            <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.jpg') }}" alt="Gambar">
                            <div class="d-flex justify-content-center align-items-center mt-2">
                                <i class="ph-magnifying-glass mb-2 fs-2 text-primary"></i>
                                <h5 class="mt-2 mb-3">Maaf! Belum Ada Data Yang Ditemukan</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="kotak">
                    @foreach ($component as $item)
                            <div class="card">
                                <div class="card-footer text-center">
                                    <div class="dropdown float-end">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('edit.component', ['id' => $item->id]) }}">Edit</a>
                                            <button type="button" class="dropdown-item" onclick="confirmDelete('{{ $item->id }}')">Hapus</button>
                                            {{-- <a class="dropdown-item"
                                                href="{{ route('delete.component', ['id' => $item->id]) }}">Hapus</a> --}}
                                        </div>
                                    </div>
                                    <strong class="fs-md text-muted mb-0">{{ $item->component_name }}</strong>
                                </div>
                                <div>
                                    <img src="{{ asset('component/' . $item->cover_img) }}" alt="" class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
                                </div>
                                <div class="card-body pt-0 mt-n5">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto">
                                            <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/default.jpg') }}" alt="" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                @endif
                <div class="pagination-wrap hstack justify-content-center gap-2 mb-4">
                    <a class="page-item pagination-prev {{ $component->previousPageUrl() ? '' : 'disabled' }}" href="{{ $component->previousPageUrl() ? $component->previousPageUrl() : '#' }}">
                        Sebelumnya
                    </a>
                    <ul class="pagination listjs-pagination mb-0">
                        @if ($component->currentPage() > 2)
                        <li>
                            <a class="page" href="{{ $component->url(1) }}">1</a>
                        </li>
                        @if ($component->currentPage() > 3)
                        <li class="ellipsis">
                            <span>...</span>
                        </li>
                        @endif
                        @endif

                        @for ($i = max(1, $component->currentPage() - 1); $i <= min($component->lastPage(), $component->currentPage() + 1); $i++)
                            <li class="{{ $i == $component->currentPage() ? 'active' : '' }}">
                                <a class="page" href="{{ $component->url($i) }}" data-i="{{ $i }}">{{ $i }}</a>
                            </li>
                            @endfor

                            @if ($component->currentPage() < $component->lastPage() - 1)
                                @if ($component->currentPage() < $component->lastPage() - 2)
                                    <li class="ellipsis">
                                        <span>...</span>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="page" href="{{ $component->url($component->lastPage()) }}">{{ $component->lastPage() }}</a>
                                    </li>
                                    @endif
                    </ul>
                    <a class="page-item pagination-next {{ $component->nextPageUrl() ? '' : 'disabled' }}" href="{{ $component->nextPageUrl() ? $component->nextPageUrl() : '#' }}">
                        Selanjutnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
                window.location.href = '/admin/delete-component/' + id;
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
