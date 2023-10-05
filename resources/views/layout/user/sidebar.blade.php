@section('style')
<style>
    [data-theme=default][data-topbar=dark] .text-light {
        color: #EEF0F7 !important;
    }

    .marquee {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
    }

    .marquee {
        animation: scroll 20s linear infinite;
        white-space: nowrap;
        overflow: hidden;
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    marquee {
        width: 100%;
        color: white;
        overflow: hidden;
        white-space: nowrap;
        background-color: #EE3232;
        font: 'Cairo', sans-serif;
    }

    marquee {
        display: flex;
        justify-content: space-between;
    }

    .sidebar-hidden {
        display: none;
    }

    /* Tombol aktif */
    .nav-item .nav-link.active {
        background-color: #007bff;
        /* Warna latar belakang tombol aktif */
        color: #fff;
        /* Warna teks tombol aktif */
    }

    /* Hover pada tombol yang aktif */
    .nav-item .nav-link.active:hover {
        background-color: #007bff;
        /* Warna latar belakang hover tombol aktif (sama dengan tombol aktif) */
        color: #fff;
        /* Warna teks hover tombol aktif (sama dengan tombol aktif) */
    }
</style>
<script>
    // Ambil semua elemen tombol dengan kelas "nav-link"
    const navLinks = document.querySelectorAll('.nav-link');

    // Iterasi melalui setiap tombol dan tambahkan event listener
    navLinks.forEach((link) => {
        link.addEventListener('click', () => {
            // Hapus kelas "active" dari semua tombol
            navLinks.forEach((otherLink) => {
                otherLink.classList.remove('active');
            });

            // Tambahkan kelas "active" pada tombol yang sedang diklik
            link.classList.add('active');
        });
    });
</script>
@endsection
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" height="30">
            </span>
        </a>
        <a href="" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" width="50" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" width="150" height="75">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    {{-- <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span data-key="t-apps" class="d-flex align-items-center">
                            <img class="header-profile-user"
                                src="{{ asset(Auth::user()->profile_picture ? 'storage/' . Auth::user()->profile_picture : 'profile_pictures/default.jpg') }}" alt="Header Avatar">
                    <div class="text-start ms-xl-2">
                        <span>Hi! {{ Auth::user()->name }}</span>

                        @php
                        $email = Auth::user()->email;
                        @endphp

                        @if (strlen($email) < 15) <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text text-white" data-key="t-hot">
                            {{ $email }}
                            </span>
                            @else
                            <marquee behavior="scroll" direction="right" scrollamount="4" class="d-none d-xl-block ms-1 fs-sm user-name-sub-text text-white">
                                {{ $email }}
                            </marquee>
                            @endif
                    </div>
                    </span>
                    </button> --}}
                    <button class="nav-link bg-transparent text-white" type="button" role="button" aria-expanded="false" data-bs-toggle="dropdown" aria-controls="sidebarDashboards">
                        @if (Auth::user()->profile_picture)
                        <img class="header-profile-user" src="{{ asset('profile_pictures/' . Auth::user()->profile_picture) }}" alt="Header Avatar" style="margin-right: 10px; object-fit: cover;">
                        @else
                        <img class="header-profile-user" src="{{ asset('profile_pictures/public/default.jpg') }}" alt="Header Avatar" style="margin-right: 10px; object-fit: cover;">
                        @endif
                        <div class="text-start ms-xl-2">
                            <span><b>{{ Auth::user()->name }}</b></span>

                            {{-- @php
                                $email = Auth::user()->email;
                            @endphp


                            <span data-key="t-hot">
                                {{ $email }}
                            </span> --}}
                        </div>
                    </button>
                </li>

                <style>
                    .navbar-menu .navbar-nav .nav-link:hover {
                        background: #ffffff;
                    }
                </style>

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.user') ? 'active' : '' }}" href="{{ url('dashboard-user') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bi bi-house-fill"></i> <span data-key="t-dashboards">Beranda</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('analytic.user') ? 'active' : '' }}" href="{{ url('analytic-user') }}" class="nav-link menu-link"> <i class="bi bi-bar-chart-line-fill"></i>
                        <span data-key="t-email">Analitik</span> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('link.show') ? 'active' : '' }}" href="{{ url('/Link/short-code') }}">
                        <i class="bi bi-link-45deg"></i>
                        <span data-key="t-email">Tautan</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#sidebarEcommerce" class="nav-link menu-link collapsed" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarEcommerce">
                        <i class="bi bi-link-45deg"></i> <span data-key="t-ecommerce">Tautan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEcommerce">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('Link/{shortCode}') }}" class="nav-link" data-key="t-products">Tautan
                Aktif</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('history') }}" class="nav-link" data-key="t-products-grid">Riwayat</a>
                </li>
            </ul>
        </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link menu-link {{ request()->routeIs('microsite') ? 'active' : '' }} {{ request()->routeIs('add.microsite') ? 'active' : '' }} {{ request()->routeIs('edit.microsite') ? 'active' : '' }}" href="{{ url('microsite-user') }}"><i class="bi bi-person-badge-fill"></i>
                <span data-key="t-file-manager">Microsite</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu-link {{ request()->routeIs('subscribe.user') ? 'active' : '' }} {{ request()->routeIs('subscribe.product.user') ? 'active' : '' }}" href="{{ url('subscribe-user') }}">
                <i class="bi bi-fire"></i> <span data-key="t-widgets">Berlangganan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ url('profil-user') }}" class="nav-link menu-link"> <i class="bi bi-person-fill"></i>
                <span data-key="t-chat">Profil</span> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ url('logout') }}" class="nav-link menu-link"> <i class="mdi mdi-logout"></i>
                <span data-key="t-chat">Keluar</span> </a>
        </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
</div>
