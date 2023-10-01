<style>
    .go_top {

        background-color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .go_top i {
        font-size: 24px;
        color: #000;
    }
</style>
@auth
<footer>
    <div class="top_footer" id="kontak">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="abt_side">
                        <div class="logo">
                            <img src="https://i.postimg.cc/QxLvZmbf/linkbaru.png" alt="image"
                                style="margin-top: -10%;">
                            <ul style="margin-bottom: -5%; margin-right:10px;">
                                <li style="color: white; font-size:14px;">{!! $data->description !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Footer Links -->

                <div class="col-lg-2 col-md-6 col-12">
                    <div class="links">
                        <h3>Dukungan</h3>
                        <ul>
                            <li><a href="/HelpSupport">Bantuan dan Dukungan</a></li>
                            <li><a href="/Privacy">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <div class="links">
                        <h3>Peta Situs</h3>
                        <ul>
                            <li><a href="/">Beranda</a></li>
                            <li><a href="/Shortlink">Perpendek Link</a></li>
                            <li><a href="/Microsite">Situs Mikro</a></li>
                            <li><a href="/Subscribe">Berlanggaan</a></li>

                        </ul>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-2 col-md-6 col-12">
                    <div class="links" >
                        <h3>Hubungi Kami</h3>
                        <ul style="text-align: justify-center;">
                            <li>
                                <a href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}&text=Halo%2C%20saya%20pengguna%20GOLINK"
                                    target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    Whatsapp
                                    {{-- {{ $data->whatsapp }} --}}
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                    Instagram
                                    {{-- {{ $data->instagram }} --}}
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/{{ $data->twitter }}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                    Twitter
                                    {{-- {{ $data->twitter }} --}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @auth
                    <!-- Comment Form -->
                    <div class="col-lg-3 col-md-6 col-12 mb-1">
                        <form action="/create/{{ Auth::user()->id }}" id="commentForm" method="POST"
                            enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Tambahkan Komentar" name="isikomentar" style="font-size:12px ;"></textarea>
                            @error('isikomentar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-start mt-2">
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="bottom_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <p>© Go.Link Dikelola oleh PT. Hummatech</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Go Top Button -->
    <div class="go_top">
        <span><img src="https://i.postimg.cc/MZtYYpPg/go-top.png" alt="image"></span>
    </div>
</footer>
    <!-- Footer-Section end -->
@else
    <footer>
        <div class="top_footer" id="kontak">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="abt_side">
                            <div class="logo">
                                <img src="{{ asset('linkbaru.png') }}" alt="image" style="margin-top: -10%;">
                                <ul  style="margin-top: 10%; margin-right:10px;">
                                    <li style="color: white; font-size:14px;">{!! $data->description !!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Links -->

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links" style="margin-left: 6%;">
                            <h3>Dukungan</h3>
                            <ul>
                                <li><a href="/HelpSupport">Bantuan dan Dukungan</a></li>
                                <li><a href="/Privacy">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links" style="margin-left: 6%;">
                            <h3>Peta Situs</h3>
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li><a href="/Shortlink">Perpendek Link</a></li>
                                <li><a href="/Microsite">Situs Mikro</a></li>
                                <li><a href="/Subscribe">Berlanggaan</a></li>
                              

                            </ul>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links" style="margin-left: 6%;">
                            <h3>Hubungi Kami</h3>
                            <ul style="text-align:justify-center;">
                                <li>
                                    <a href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}&text=Halo%2C%20saya%20pengguna%20LINKID"
                                        target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        Whatsapp
                                        {{-- {{ $data->whatsapp }} --}}
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                        Instagram
                                        {{-- {{ $data->instagram }} --}}
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/{{ $data->twitter }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                        Twitter
                                        {{-- {{ $data->twitter }} --}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- @auth
                        <!-- Comment Form -->
                        <div class="col-lg-3 col-md-6 col-12 mb-1">
                            <form action="/create/{{ Auth::user()->id }}" id="commentForm" method="POST"
                                enctype="multipart/form-data" class="mt-3">
                                @csrf
                                <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Tambahkan Komentar" name="isikomentar" style="font-size:12px ;"></textarea>
                                @error('isikomentar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="text-start mt-2">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </form>
                        </div>
                    @endauth --}}

                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="bottom_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">© Go.Link Dikelola oleh PT. Hummatech</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Go Top Button -->
        <div class="go_top">
            <span><i class="fas fa-arrow-up"></i></span>
        </div>
    </footer>
    <!-- Footer-Section end -->
@endauth
