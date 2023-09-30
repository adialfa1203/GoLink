@extends('layout.admin.app')

@section('title','Berlangganan')
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
          <a href="{{ url ('add-subscribe')}}"> <button type="button" class="btn btn-success">Tambah</button></a>

      </div><br>

      <div class="col-sm-6 col-xl-3">
          <!-- Simple card -->
          <div class="card">
              <img class="card-img-top img-fluid" src="{{ asset('plugin/cat-berlangganan.jpg') }}" style="display: block; margin: 0 auto; width: 80%;" alt="Card image cap">
              <br>
              <div class="card-body text-center">
                <h2 class=" mb-2">Rp:0</h2>
                  <h4 class="card-title mb-2">Gratis</h4>
                  <p class="card-text">Paket Dasar untuk memulai perjalanan Anda bersama kami</p>
                  <p>Benar-benar Gratis</p>
              </div>
          </div><!-- end card -->
      </div><!-- end col -->

  </div>
  <!-- container-fluid -->

@section('script')
<script>

</script>
@endsection
@endsection
