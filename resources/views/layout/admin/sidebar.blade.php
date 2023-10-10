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

    /* CSS untuk sidebar */
    #scrollbar {
        /* Atur lebar sidebar saat layar besar */
        width: 250px;
        /* Tambahkan gaya lain yang Anda butuhkan */
        /* ... */
    }

    /* CSS untuk menu item */
    #navbar-nav li {
        /* Atur padding, margin, dan lain-lain */
        /* ... */
    }

    /* Media query untuk layar kecil */
    @media (max-width: 768px) {
        #scrollbar {
            /* Ubah lebar sidebar saat layar kecil */
            width: 100%;
        }

        /* Atur tampilan menu item untuk layar kecil */
        #navbar-nav li {
            /* ... */
        }
    }
</style>
@endsection
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" height="22">
            </span>
        </a>
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('template/image/linkbaru.png') }}" alt="" width="50" height="20">
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
                <li>
                    {{-- <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="header-profile-user"
                                src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/32/avatar-1.jpg') }}"
                    alt="Header Avatar">
                    <div class="text-start ms-xl-2">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium text-white user-name-text">Hi! {{ Auth::user()->name }}</span>

                        @php
                        $email = Auth::user()->email;
                        @endphp

                        @if (strlen($email) < 15) <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text text-white">
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
                        <img class="header-profile-user" src="{{ asset('default/default.jpg') }}" alt="Header Avatar" style="margin-right: 10px; object-fit: cover;">
                        @endif
                        <div class="text-start ms-xl-2">
                            <span><b>Hai! {{ Auth::user()->name }}</b></span>

                            {{-- @php
                                $email = Auth::user()->email;
                            @endphp


                            <span data-key="t-hot">
                                {{ $email }}
                            </span> --}}
                        </div>
                    </button>
                </li>

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}" href="{{ url('admin/  dashboard-admin') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bi bi-house-fill"></i> <span data-key="t-dashboards">Beranda</span>   
                    </a>    
                </li>   
                <li class="nav-item">   
                    <a class="nav-link menu-link {{ request()->routeIs('subscribe') ? 'active' : '' }} {{ request()->routeIs('addSubscribe') ? 'active' : '' }}" href="{{ url('admin/subscribe-admin') }}" class="nav-link menu-link"><i class="bi bi-fire"></i>
                        <span data-key="t-widgets">Berlangganan</span> </a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('data.user') ? 'active' : '' }}" href="{{ url('admin/data-user') }}" class="nav-link menu-link"> <i class="bi bi-person-fill"></i>
                        <span data-key="t-chat">Pengguna</span> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('linkAdmin') ? 'active' : '' }}" href="{{ url('admin/link-admin') }}" class="nav-link menu-link"><i class="bi bi-link-45deg"></i>
                        <span data-key="t-email">Tautan</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('view.component') ? 'active' : '' }} {{ request()->routeIs('create.component') ? 'active' : '' }} {{ request()->routeIs('edit.component') ? 'active' : '' }}" href="{{ url('admin/view-component') }}" class="nav-link menu-link"><i class="bi bi-grid"></i>
                        <span data-key="t-email">Kategori</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('view.button') ? 'active' : '' }} {{ request()->routeIs('create.button') ? 'active' : '' }} {{ request()->routeIs('edit.button') ? 'active' : '' }}" href="{{ url('admin/view-button') }}" class="nav-link menu-link"><i class="bi bi-back"></i>
                        <span data-key="t-email">Sosial</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('viewkomentar') ? 'active' : '' }}" href="{{ url('admin/view-komentar') }}" class="nav-link menu-link"><i class="bi bi-chat-right-text-fill"></i>
                        <span data-key="t-email">Komentar</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('blokir') ? 'active' : '' }}" href="{{ url('admin/blokir') }}" class="nav-link menu-link"><i class="fa fa-ban"></i>
                        <span data-key="t-email">Akun Di Blokir</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('view.footer') ? 'active' : '' }}" href="{{ url('admin/view-footer') }}" class="nav-link menu-link"> <i class="bi bi-exclude"></i>
                        <span data-key="t-chat">Footer</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('profileAdmin') ? 'active' : '' }}" href="{{ url('admin/profil-admin') }}" class="nav-link menu-link"> <i class="bi bi-person-fill"></i> <span data-key="t-chat">Profil</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" onclick="confirmLogout()"> <i class="mdi mdi-logout"></i>
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
                window.location.href = "{{ url('logout') }}";
            }
        });
    }
</script>
