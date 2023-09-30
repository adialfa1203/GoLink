@extends('layout.admin.app')
@section('title', 'Microsite')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex align-items-start gap-3 mt-4">
                    <a class="btn btn-success btn-label" href="{{ route('create.component') }}" role="button">
                        <i class="ri-add-line label-icon align-middle fs-lg ms-2"></i>Tambah Komponen
                    </a>
                </div>
                <div class="row mt-4">
                    @if ($component->isEmpty())
                        <div class="card page-content">
                            <div class="container-fluid">
                                <div class="d-flex flex-column align-items-center">
                                    <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.jpg') }}"
                                        alt="Gambar">
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <i class="ph-magnifying-glass mb-2 fs-2 text-primary"></i>
                                        <h5 class="mt-2 mb-3">Maaf! Tidak Ada Data Ditemukan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach ($component as $item)
                            <div class="col-xl-4 col-sm-6 mb-4">
                                <div class="card">
                                    <div class="card-footer text-center">
                                        <div class="dropdown float-end">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted fs-lg"><i
                                                        class="mdi mdi-dots-vertical align-middle"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.component', ['id' => $item->id]) }}">Edit</a>
                                                <button type="button" class="dropdown-item"
                                                    data-bs-target="#hapus{{ $item->id }}"
                                                    data-bs-toggle="modal">Hapus</button>
                                                {{-- <a class="dropdown-item"
                                                href="{{ route('delete.component', ['id' => $item->id]) }}">Hapus</a> --}}
                                            </div>
                                        </div>
                                        <strong class="fs-md text-muted mb-0">{{ $item->component_name }}</strong>
                                    </div>
                                    <div>
                                        <img src="{{ asset('component/' . $item->cover_img) }}" alt=""
                                            class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
                                    </div>
                                    <div class="card-body pt-0 mt-n5">
                                        <div class="text-center">
                                            <div class="profile-user position-relative d-inline-block mx-auto">
                                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/default.jpg') }}"
                                                    alt=""
                                                    class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal hapus --}}
                                <div class="modal fade" id="hapus{{ $item->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="/delete-component/{{ $item->id }}" method="GET">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <h4 style="font-size: 19px">Yakin Ingin Menghapus Komponen Ini?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-xs form-control1">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="pagination-wrap hstack justify-content-center gap-2 mb-3">
                        <a class="page-item pagination-prev {{ $component->previousPageUrl() ? '' : 'disabled' }}"
                            href="{{ $component->previousPageUrl() ? $component->previousPageUrl() : '#' }}">
                            Previous
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
                                    <a class="page" href="{{ $component->url($i) }}"
                                        data-i="{{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($component->currentPage() < $component->lastPage() - 1)
                                @if ($component->currentPage() < $component->lastPage() - 2)
                                    <li class="ellipsis">
                                        <span>...</span>
                                    </li>
                                @endif
                                <li>
                                    <a class="page"
                                        href="{{ $component->url($component->lastPage()) }}">{{ $component->lastPage() }}</a>
                                </li>
                            @endif
                        </ul>
                        <a class="page-item pagination-next {{ $component->nextPageUrl() ? '' : 'disabled' }}"
                            href="{{ $component->nextPageUrl() ? $component->nextPageUrl() : '#' }}">
                            Next
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
