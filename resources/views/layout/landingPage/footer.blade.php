<style>
    .go_top {

        background-color: #fff;
        width: 40px;
        height:40px;
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
    .links h3 {
    margin-bottom: 10px; /* Atur margin bawah pada judul "Dukungan" */
}

.links ul {
    margin-top: 10px; /* Atur margin atas pada daftar item */
}
footer .top_footer {
    background-color: #0E2954 !important;
    padding: 17px 0 0px 0 !important;
    /* height: 220px; */
    position: relative !important;
    overflow: hidden !important;
}
@media (max-width: 768px) {
        .fote{
            display: inline-block;
        }
        .fota{
            display: none;
        }
        }

        @media (min-width: 1025px) {

            /* Atur gaya CSS khusus untuk perangkat laptop di sini */
            .fote{
            display: none;
        }
            .fota{
            display: inline-block;
        }
        }
        /* CSS untuk perangkat tablet (misalnya, lebar layar antara 600px dan 1024px) */
        @media (min-width: 601px) and (max-width: 1024px) {

            /* Atur gaya CSS khusus untuk perangkat tablet di sini */
            .fota{
            display: none;
        }
        }
</style>
    <footer>
        <div class="top_footer" id="kontak">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="abt_side">
                            <div class="logo">
                                <img src="{{ asset('template/image/milink.png') }}" alt="image" style="margin-top: 5%;">
                                <ul style="margin-top: 5%; margin-right:10px;">
                                    <li style="color: white; font-size:14px;word-wrap: break-word;padding-bottom:0;">{!! $data->description !!}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bottom_footer col-12" style="margin-bottom: 4%; padding-top: 0;">
                                    <p class="fota" style="white-space: nowrap; text-align">© MiLink Dikelola oleh PT. Hummatech</p>
                                </div>

                    </div>

                    <!-- Footer Links -->

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links" style="margin-left: 6%;">
                            <h3>Dukungan</h3>
                            <ul>
                                <li><a href="{{ url ('id/help-support')}}">Bantuan dan Dukungan</a></li>
                                <li><a href="{{ url ('id/privacy')}}">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links" style="margin-left: 6%;">
                            <h3>Peta Situs</h3>
                            <ul>
                                <li><a href="{{ url ('id/home')}}">Beranda</a></li>
                                <li><a href="{{ url ('id/short-link')}}">Perpendek Link</a></li>
                                <li><a href="{{ url ('id/microsite')}}">Situs Mikro</a></li>
                                <li><a href="{{ url ('id/subscribe')}}">Berlanggaan</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links" style="margin-left: 6%;">
                            <h3>Hubungi Kami</h3>
                            <ul style="text-align:justify-center;">
                                <li>
                                    <a href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}&text=Halo%2C%20saya%20pengguna%20MiLink"
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
                                    <a href="https://tiktok.com/{{ $data->twitter }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                        Tiktok
                                        {{-- {{ $data->twitter }} --}}
                                    </a>
                                </li>
                            </ul>
                            <p class="fote" style="white-space: nowrap; text-align">© MiLink Dikelola oleh PT. Hummatech</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->


        <!-- Go Top Button -->
        <div class="go_top">
            <span><i class="fas fa-arrow-up"></i></span>
        </div>
    </footer>

