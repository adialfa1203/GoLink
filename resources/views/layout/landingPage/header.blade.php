@auth
    <header>
        <!-- container start -->
        <div class="container">
            <!-- navigation bar -->
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('template/image/milink-putih.png') }}" alt="image" style="margin-bottom: -15px; margin-top:-2px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
                        <div class="toggle-wrap">
                            <span class="toggle-bar"></span>
                        </div>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- secondery menu start -->
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('landing.page') ? 'active' : '' }}"
                                href="{{ url('id/home') }}">Beranda</a>
                        </li>

                        <!-- secondery menu start -->
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('short.link') ? 'active' : '' }}"
                                href="{{ url('id/short-link') }}">Perpendek Link</a>
                        </li>
                        <!-- secondery menu end -->

                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('microsite.page') ? 'active' : '' }}"
                                href="{{ url('id/microsite') }}">Situs Mikro</a>
                        </li>
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('subscribe.page') ? 'active' : '' }}"
                                href="{{ url('id/subscribe') }}">Berlangganan</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link dark_btn " style="font-weight: 600;" href="{{ url('user/dashboard-user') }}">
                                Beranda&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- navigation end -->
        </div>
        <!-- container end -->
    </header>
@else
    <header>
        <!-- container start -->
        <div class="container">
            <!-- navigation bar -->
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('template/image/milink-putih.png') }}"  style="margin-bottom: -3px; margin-top: 3px;" alt="image">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
                        <div class="toggle-wrap">
                            <span class="toggle-bar"></span>
                        </div>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- secondery menu start -->
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('landing.page') ? 'active' : '' }}"
                                href="{{ url('id/home') }}">Beranda</a>
                        </li>

                        <!-- secondery menu start -->
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('short.link') ? 'active' : '' }}"
                                href="{{ url('id/short-link') }}">Perpendek Link</a>
                        </li>
                        <!-- secondery menu end -->

                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('microsite.page') ? 'active' : '' }}"
                                href="{{ url('id/microsite') }}">Situs Mikro</a>
                        </li>
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('subscribe.page') ? 'active' : '' }}"
                                href="{{ url('id/subscribe') }}">Berlangganan</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link dark_btn" style="font-weight: 600;">
                                <a class="text-dark" href="{{ url('/id/login') }}">Masuk |</a><a class="text-dark"
                                    href="{{ url('/id/register') }}"> Daftar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- navigation end -->
        </div>
        <!-- container end -->
    </header>
@endauth
