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
                <img src="{{ asset('template/image/milink-putih.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/image/milink-putih.png') }}" alt="" height="30">
            </span>
        </a>
        <a href="" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('template/image/M.png') }}" alt="" width="20" height="20">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/image/milink-putih.png') }}" alt="" width="120" height="30">
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
            <ul class="navbar-nav" id="navbar-nav" style="padding-bottom: 20px;">
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
                        @if (auth()->user()->profile_picture)
                        @if(auth()->user()->google_id)
                        <img src="{{ auth()->user()->profile_picture }}" alt="{{ auth()->user()->name }}"
                        class="header-profile-user"  alt="Header Avatar" style="margin-right: 10px; object-fit: cover;">
                        @else
                        <img src="{{ asset('profile_pictures/' . auth()->user()->profile_picture) }}"
                            alt="{{ auth()->user()->name }}"
                            class="header-profile-user" alt="Header Avatar" style="margin-right: 10px; object-fit: cover;">
                        @endif
                        @else
                        <img src="{{ asset('default/default.jpg') }}"
                            alt="{{ auth()->user()->name }}"
                            class="header-profile-user" alt="Default Avatar" style="margin-right: 10px; object-fit: cover;">
                        @endif

                        <div class="text-start ms-xl-2 ">
                            <span>
                                <div class="ellipsis" style=" text-overflow: ellipsis !important;
  overflow: hidden !important;
  -webkit-line-clamp: 2 !important;
  -webkit-box-orient: vertical !important;
  display: -webkit-box !important;
  word-break: break-word !important;
  max-width: 100px; /* Sesuaikan dengan lebar yang sesuai */">
                                    {!! Auth::user()->name !!}
                                </div>
                            </span>
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
                    <a style="margin-top:10px;" class="nav-link menu-link {{ request()->routeIs('dashboard.user') ? 'active' : '' }}" href="{{ url('user/dashboard-user') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bi bi-house-fill"></i> <span data-key="t-dashboards">Beranda</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a style="margin-top:10px;" class="nav-link menu-link {{ request()->routeIs('analytic.user') ? 'active' : '' }}" href="{{ url('user/analytic-user') }}" class="nav-link menu-link"> <i class="bi bi-bar-chart-line-fill"></i>
                        <span data-key="t-email">Analitik</span></a>
                </li>

                <li class="nav-item">
                    <a style="margin-top:10px;" class="nav-link menu-link {{ request()->routeIs('link.show') ? 'active' : '' }}" href="{{ url('user/link/short-code') }}">
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
            <a style="margin-top:10px;" class="nav-link menu-link {{ request()->routeIs('microsite') ? 'active' : '' }} {{ request()->routeIs('add.microsite') ? 'active' : '' }} {{ request()->routeIs('edit.microsite') ? 'active' : '' }}" href="{{ url('user/microsite-user') }}"><i class="bi bi-person-badge-fill"></i>
                <span data-key="t-file-manager">Microsite</span>
            </a>
        </li>
        <li class="nav-item">
            <a style="margin-top:10px;" class="nav-link menu-link {{ request()->routeIs('subscribe.user') ? 'active' : '' }} {{ request()->routeIs('subscribe.product.user') ? 'active' : '' }}" href="{{ url('user/subscribe-user') }}">
                <i class="bi bi-fire"></i> <span data-key="t-widgets">Berlangganan</span>
            </a>
        </li>
        <li class="nav-item">
            <a style="margin-top:10px;" class="nav-link menu-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ url('user/profil-user') }}" class="nav-link menu-link"> <i class="bi bi-person-fill"></i>
                <span data-key="t-chat">Profil</span> </a>
        </li>
        <li class="nav-item">
            <a style="margin-top:10px;" class="nav-link menu-link" href="#" onclick="confirmLogout()"> <i class="mdi mdi-logout"></i>
                <span data-key="t-chat">Keluar</span> </a>
        </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin keluar?',
            text: "Anda akan keluar dari sesi ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to logout URL
                window.location.href = "{{ url('logout/logout') }}";
            }
        });
    }
</script>
