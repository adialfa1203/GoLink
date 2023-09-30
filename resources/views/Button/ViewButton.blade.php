@extends('layout.admin.app')
@section('title', 'Sosial')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-4">
                    <a class="btn btn-success btn-label" href="{{ route('create.button') }}" role="button">
                        <i class="ri-add-line label-icon align-middle fs-lg"></i>Tambah Button
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                @if ($button->isEmpty())
                    <div class="card page-content">
                        <div class="container-fluid">
                            <div class="d-flex flex-column align-items-center">
                                <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.jpg') }}"
                                    alt="Gambar">
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <i class="ph-magnifying-glass fs-2 text-primary"></i>
                                    <h5 class="mt-2">Maaf! Tidak Ada Data Ditemukan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($button as $data)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
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
                                                href="{{ route('edit.button', ['id' => $data->id]) }}">Edit</a>
                                            <a class="dropdown-item"
                                                href="{{ route('delete.button', ['id' => $data->id]) }}">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
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
                {{-- <div class="pagination-wrap hstack justify-content-center gap-2">
                    <a class="page-item pagination-prev {{ $button->previousPageUrl() ? '' : 'disabled' }}" href="{{ $button->previousPageUrl() ? $button->previousPageUrl() : '#' }}">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0">
                        @if ($button->currentPage() > 2)
                            <li>
                                <a class="page" href="{{ $button->url(1) }}">1</a>
                            </li>
                            @if ($button->currentPage() > 3)
                                <li class="ellipsis">
                                    <span>...</span>
                                </li>
                            @endif
                        @endif

                        @for ($i = max(1, $button->currentPage() - 1); $i <= min($button->lastPage(), $button->currentPage() + 1); $i++)
                            <li class="{{ $i == $button->currentPage() ? 'active' : '' }}">
                                <a class="page" href="{{ $button->url($i) }}" data-i="{{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($button->currentPage() < $button->lastPage() - 1)
                            @if ($button->currentPage() < $button->lastPage() - 2)
                                <li class="ellipsis">
                                    <span>...</span>
                                </li>
                            @endif
                            <li>
                                <a class="page" href="{{ $button->url($button->lastPage()) }}">{{ $button->lastPage() }}</a>
                            </li>
                        @endif
                    </ul>
                    <a class="page-item pagination-next {{ $button->nextPageUrl() ? '' : 'disabled' }}" href="{{ $button->nextPageUrl() ? $button->nextPageUrl() : '#' }}">
                        Next
                    </a>
                </div> --}}
            </div>
        </div>
    </div>

@endsection
{{-- @section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function handlePaginate(pagination) {
            const paginate = $('<ul>').addClass('pagination')
            if (pagination.last_page >= 11) {
                var startPage = pagination.current_page
                var endPage = pagination.current_page + 1
                if (startPage > 1) startPage = pagination.current_page - 1
                if (pagination.current_page == pagination.last_page) endPage -= 1
                for (var page = startPage; page <= endPage; page++) {
                    const pageItem = $('<li>').addClass('page-item')
                    page == pagination.current_page ? pageItem.addClass('active') : '';
                    const pageLink = '<button class ="page-link" onclick="get(${page})">${page}</button>'
                    pageItem.html(pageLink)
                    paginate.append(pageItem)
                }

                const morePage =
                    '<li class = "page-item-disabled"> <button class = "page-link" tabindex = "-1" aria-disabled = "true">...</button></li>'

                if (pagination.current_page >= 3) {
                    var leftPage = 3;
                    if (pagination.current_page == 3) leftPage = 1
                    if (pagination.current_page == 4) leftPage = 2
                    if (pagination.current_page >= 6) paginate.prepend(morePage)
                    for (var page = leftPage; page >= 1; page--) {
                        const pageItem = $('<li').addClass('page-item')
                        const pageLink = '<button class = "page-link" onclick = "get(${page})">${page}</button>'
                        pageItem.html(pageLink)
                        paginate.prepend(pageItem)
                    }
                }
                if (pagination.current_page >= 2) {
                    var rightPage = 1;
                    if (pagination.current_page == 2) rightPage = 0
                    if (pagination.current_page == 3) rightPage = 1
                    if (pagination.current_page >= 4) paginate.prepend(morePage)
                    for (var page = rightPage; page >= 1; page--) {
                        const pageItem = $('<li').addClass('page-item')
                        const pageLink = '<button class = "page-link" onclick = "get(${page})">${page}</button>'
                        pageItem.html(pageLink)
                        paginate.prepend(pageItem)
                    }
                } else {
                    for (var page = 1; page <= pagination.last_page; page++) {
                        const pageItem = $('<li>').addClass('page-item')
                        page == pagination.current_page ? pageItem.addClass('active') : '';
                        const pageLink = '<button class = "page-link" onclick = "get(${page})">${page}</button>'
                        pageItem.html(pageLink)
                        paginate.prepend(pageItem)
                    }
                }
                const previous =
                    `<li class="page-item ${pagination.current_page == 1 ? 'disabled' : ''}"><button class="page-link" tabindex="-1" aria-disabled="true" ${pagination.current_page != 1 ? `onclick="get(${pagination.current_page - 1})"` : ''}>Previous</button></li>`
                const next =
                    const next =
                        `<li class="page-item ${pagination.current_page == pagination.last_page ? 'disabled' : ''}" ${pagination.current_page != pagination.last_page ? `onclick="get(${pagination.current_page + 1})"` : ''}><button class="page-link" href="#">Next</button></li>`
                paginate.prepend(previous)
                paginate.append(next)
                return paginate
            }
        }
    </script>
@endsection --}}
