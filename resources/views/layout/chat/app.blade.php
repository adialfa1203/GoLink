@section('style')
    <style>
    /* CSS untuk chat bubbles */
    .chat-bubble {
        max-width: 70%;
        margin: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        clear: both;
    }

    .user {
        background: #DCF8C6;
        float: right;
    }

    .admin {
        background: #ECE5DD;
        float: left;
    }

    .admin-right {
        float: right;
    }
    </style>
@endsection
    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
            <div class="me-2">
                <div class="d-flex align-items-center">
                    <img style="width: 60px; height: 60px" src="{{ asset('default/default.jpg') }}" alt="Admin"
                        class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                    <div class="ms-2">
                        <h5 class="mb-1 text-white">Admin</h5>
                        <p class="text-white">Web Developer</p>
                    </div>
                </div>
            </div>
    
            <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-4 chat-container">
                    <!-- Tambahkan chat baru di bawah ini -->
                    <div class="chat-bubble user">
                        <div class="chat-time text-center">11:51</div>
                        <div class="chat-message" style="float: left; border-radius: 15px">Halo?</div>
                    </div>
                    <div class="chat-bubble admin admin-right">
                        <div class="chat-time text-center">16:00</div>
                        <div class="chat-message" style="float: right; border-radius: 15px">Iya, Apa ada yang bisa saya bantu?</div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        @csrf <!-- Tambahkan ini jika Anda menggunakan Laravel untuk menyertakan token CSRF -->
                        
                        <div class="input-group mb-3">
                            <!-- Inputan -->
                            <input type="text" class="form-control" name="input_field" placeholder="Masukkan inputan Anda">
                            
                            <!-- Tombol Kirim -->
                            <button type="submit" class="btn btn-primary bi bi-send"></button>
                        </div>
                    </form>
                </div>              
            </div>                        
        </div>
    </div>
    