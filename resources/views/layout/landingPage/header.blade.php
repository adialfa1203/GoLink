@auth
<header>
    <!-- container start -->
    <div class="container">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-lg" style="margin-top:-3%">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('linkbaru.png') }}" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link {{ request()->routeIs('landing.page') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>

                    <!-- secondery menu start -->
                    <li class="nav-item has_dropdown">
                        <a class="nav-link {{ request()->routeIs('short.link') ? 'active' : '' }}" href="/Shortlink">Perpendek Link</a>
                    </li>
                    <!-- secondery menu end -->

                    <li class="nav-item has_dropdown">
                        <a class="nav-link {{ request()->routeIs('microsite.page') ? 'active' : '' }}" href="/Microsite">Situs Mikro</a>
                    </li>
                    <li class="nav-item has_dropdown">
                        <a class="nav-link {{ request()->routeIs('subscribe.page') ? 'active' : '' }}" href="/Subscribe">Berlangganan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark_btn" href="/dashboard-user">
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
            <nav class="navbar navbar-expand-lg" style="margin-top:-3%">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('linkbaru.png') }}" alt="image">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link {{ request()->routeIs('landing.page') ? 'active' : '' }}" href="/">Beranda</a>
                        </li>

                        <!-- secondery menu start -->
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('short.link') ? 'active' : '' }}" href="/Shortlink">Perpendek Link</a>
                        </li>
                        <!-- secondery menu end -->

                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('microsite.page') ? 'active' : '' }}" href="/Microsite">Situs Mikro</a>
                        </li>
                        <li class="nav-item has_dropdown">
                            <a class="nav-link {{ request()->routeIs('subscribe.page') ? 'active' : '' }}" href="/Subscribe">Berlangganan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dark_btn" href="/login">Login / Register</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- navigation end -->
        </div>
        <!-- container end -->
    </header>
@endauth
