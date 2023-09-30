@extends('layout.app')
@section('title', 'Microsite')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Microsite</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Instructors</a></li>
                                <li class="breadcrumb-item active">Grid View</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center g-2">
                        <div class="col-lg-3 me-auto">
                            <a href="#addInstructor" data-bs-toggle="modal" class="btn btn-success"><i
                                    class="bi bi-plus-circle align-baseline me-1"></i> Buat Baru</a>
                        </div><!--end col-->
                        <div class="col-lg-auto">
                            <div class="hstack gap-2">
                                <a href="" class="btn rounded-pill btn-danger"> Semua</a>
                                <a href="" class="btn rounded-pill btn-secondary"> Terakhir Diperbarui</a>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-2">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Cari...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div><!--end col-->
                    </div>
                </div>
            </div><!--end card-->

            <div class="col-12">
                <div class="card card-body">
                    <div class="wrapper d-flex align-items-center">
                        <div class="avatar-md">
                            <div class="avatar-title bg-success-subtle text-success fs-xl rounded mx-3">
                                <img src="https://i.postimg.cc/tR5pMsYz/orang-gtg.jpg" style="width: 150%; height: 100%;"
                                    alt="Gambar">
                            </div>
                        </div>
                        <div class="wrapper mx-5">
                            <h5 class="card-title">Adi</h5>
                            <p class="card-text text-muted">ShortLink.id/Adi</p>
                        </div>
                        <div style="margin-left:55%;"  >
                            <a href="" class="btn btn-primary btn-xs"><i class="bi bi-bar-chart-fill"></i> Statistik</a>
                            <a href="" class="btn btn-primary btn-xs"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="" class="btn btn-primary btn-xs"><i class="bi bi-share-fill"></i> </a>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
