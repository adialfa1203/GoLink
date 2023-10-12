@extends('layout.admin.app')
@section('title', 'Footer')
@section('style')

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ route('edit.footer') }}" method="POST" class="page-content" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Footer</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card">
        <div class="card-body">
            <div class="row">
                {{-- <div class="col-lg-2">
                    <div class="mb-3">
                        <div>
                            <label for="lastnameInput" class="form-label fw-semibold">Logo</label>
                        </div>
                        <div class="profile-user position-relative d-inline-block mx-auto">
                            <img src="{{ asset($data->logo ? $data->logo : 'logo/default.jpg') }}" alt=""
                            class="avatar-lg rounded object-fit-cover border-0 img-thumbnail user-profile-image"
                            style="width: 100%; height: 100%;">
                            <div class="avatar-xs p-0 rounded profile-photo-edit position-absolute end-0 bottom-0">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input d-none"
                                    name="logo">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded bg-light text-body">
                                        <i class="bi bi-camera"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="lastnameInput" class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="description" id="editor">{{ $data->description }}</textarea>
                    </div>
                </div>
                <div>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-2 mt-2 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-success-subtle text-success">
                            <i class="bi bi-whatsapp"></i>
                        </span>
                    </div>
                    <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="+62..."
                        value="{{ $data->whatsapp }}">
                </div>
                <div class="mb-2 mt-2 d-flex">
                    @if ($errors->has('whatsapp'))
                        <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                    @endif
                </div>
                <div class="mb-2 mt-2 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-danger-subtle text-danger">
                            <i class="bi bi-instagram"></i>
                        </span>
                    </div>
                    <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Link_id"
                        value="{{ $data->instagram }}">
                </div>
                <div class="mb-2 mt-2 d-flex">
                    @if ($errors->has('instagram'))
                        <span class="text-danger">{{ $errors->first('instagram') }}</span>
                    @endif
                </div>
                <div class="mb-2 mt-2 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-info-subtle text-info">
                            <i class="bi bi-twitter"></i>
                        </span>
                    </div>
                    <input type="text" name="twitter" class="form-control" id="twitter" placeholder="LinkId_"
                        value="{{ $data->twitter }}">
                </div>
                <div class="mb-2 mt-2 d-flex">
                    @if ($errors->has('twitter'))
                        <span class="text-danger">{{ $errors->first('twitter') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <br>
@endsection
@section('script')
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/libs/dropzone/dropzone-min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/ecommerce-create-product.init.js') }}">
    </script>
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/profile-setting.init.js') }}"></script>
    {{-- <script>
        var myDropzone = new Dropzone("#myDropzone", {
            maxFiles: 1,
            acceptedFiles: 'image/*',
            init: function() {
                this.on("addedfile", function() {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });

                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }
        });
    </script> --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
