@extends('layout.admin.app')

@section('title', 'Berlangganan')
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Berlangganan </h4>

                    {{-- <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                          <li class="breadcrumb-item active">Products Grid</li>
                      </ol>
                  </div> --}}

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div>
            <a href="{{ url('admin/add-subscribe') }}"> <button type="button" class="btn btn-success">Tambah</button></a>

        </div><br>
        {{-- <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <img class="card-img-top img-fluid mt-3" src="{{ asset('plugin/cat-berlangganan.jpg') }}"
        style="display: block; margin: 0 auto; width: 80%; height: 50%;" alt="Card image cap">
        <br>
        <div class="card-body text-center">
            <h2 class=" mb-2">Rp:0</h2>
            <h4 class="card-title mb-2">Gratis</h4>
            <p class="card-text">Paket Dasar untuk memulai perjalanan Anda bersama kami</p>
            <p>Benar-benar Gratis</p>
        </div>
    </div>
</div> --}}
<div class="row">
    @foreach ($subscribe as $subs)
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="d-flex justify-content-end dropdown float-end m-2">
                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('edit.subscribe', ['id' => $subs->id]) }}">Edit</a>
                    <button type="button" class="dropdown-item" onclick="confirmDelete('{{ $subs->id }}')">Hapus</button>
                </div>
            </div>
            <img class="mt-3" src="{{ asset('pictureSubs/' . $subs->picture) }}" width="260" height="160" style="display: block; margin: 0 auto; object-fit: cover;" alt="Card image cap">
            <br>
            <div class="card-body text-center">
                <h2 class="mb-2">Rp.{{ number_format($subs->price, 0, ',', '.') }}</h2>
                <h4 class="card-title mb-2">
                    @if (strtolower(trim($subs->tipe)) === 'free')
                    <span class="badge bg-success">Gratis</span>
                    @elseif (strtolower(trim($subs->tipe)) === 'silver')
                    <span class="badge bg-primary">Dasar</span>
                    @elseif (strtolower(trim($subs->tipe)) === 'gold')
                    <span class="badge bg-warning">Menengah</span>
                    @elseif (strtolower(trim($subs->tipe)) === 'platinum')
                    <span class="badge bg-danger">Premium</span>
                    @else
                    <span class="badge bg-secondary">Data Kosong</span>
                    @endif
                </h4>
                <p class="card-text" style="     text-overflow: ellipsis!important;
        overflow: hidden!important;
        -webkit-line-clamp: 2!important;
        -webkit-box-orient: vertical!important;
        display: -webkit-box!important;
        word-break: break-word!important;">
                    {!! strip_tags($subs->description) !!}
                </p>
                <a href="#" data-bs-toggle="modal" data-bs-target="#{{$subs->id}}" style="color: #FF7E01;">Baca Selengkapnya</a>

                <div id="{{$subs->id}}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="width: 90%;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                            </div>
                            <div class="modal-body">
                                    <img class="mb-2" src="{{ asset('pictureSubs/' . $subs->picture) }}" width="100%" style="display: block; margin: 0 auto; object-fit: cover;" alt="Card image cap">
                                <h2 class="mt-2">Rp.{{ number_format($subs->price, 0, ',', '.') }}</h2>
                                <h4 class="card-title mb-2">
                                    @if (strtolower(trim($subs->tipe)) === 'gratis')
                                    <span class="badge bg-success">{{ $subs->tipe }}</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'dasar')
                                    <span class="badge bg-primary">{{ $subs->tipe }}</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'menengah')
                                    <span class="badge bg-warning">{{ $subs->tipe }}</span>
                                    @elseif (strtolower(trim($subs->tipe)) === 'premium')
                                    <span class="badge bg-danger">{{ $subs->tipe }}</span>
                                    @else
                                    <span class="badge bg-secondary">{{ $subs->tipe }}</span>
                                    @endif
                                </h4>
                                <p>{!! strip_tags($subs->description) !!}</p>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

@section('script')
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
                window.location.href = '/admin/delete-subscribe/' + id;
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
@endsection
