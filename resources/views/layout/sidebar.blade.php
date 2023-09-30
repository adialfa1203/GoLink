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

    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const navItems = document.querySelectorAll(".nav-item");

          navItems.forEach((item) => {
            item.addEventListener("click", function () {
              // Hapus kelas "active" dari semua elemen
              navItems.forEach((navItem) => {
                navItem.classList.remove("active");
              });

              // Tambahkan kelas "active" ke elemen yang diklik
              item.classList.add("active");
            });
          });
        });
      </script>

@endsection
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-sm.png') }}" alt=""
                    height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-dark.png') }}"
                    alt="" height="22">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-sm.png') }}"
                    alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-light.png') }}"
                    alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li>
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
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

                                @if (strlen($email) < 15)
                                    <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text text-white">
                                        {{ $email }}
                                    </span>
                                @else
                                    <marquee behavior="scroll" direction="right" scrollamount="4"
                                        class="d-none d-xl-block ms-1 fs-sm user-name-sub-text text-white">
                                        {{ $email }}
                                    </marquee>
                                @endif
                            </div>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                        <a class="dropdown-item" href="/profil-user"><i
                                class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="{{url('logout')}}"><i
                                class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </li>

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link " href="#sidebarDashboards" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="bi bi-house-fill"></i> <span data-key="t-dashboards">Beranda</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="apps-email.html" class="nav-link menu-link"> <i class="bi bi-bar-chart-line-fill"></i>
                        <span data-key="t-email">Analitik</span> </a>
                </li>

                <li class="nav-item">
                    <a href="#sidebarEcommerce" class="nav-link menu-link collapsed" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarEcommerce">
                        <i class="bi bi-link-45deg"></i> <span data-key="t-ecommerce">Tautan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEcommerce">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-ecommerce-products.html" class="nav-link" data-key="t-products">Tutan
                                    Aktif</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-ecommerce-products-grid.html" class="nav-link"
                                    data-key="t-products-grid">Tautan Diarsip</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="apps-file-manager.html" class="nav-link menu-link"> <i class="bi bi-person-badge-fill"></i>
                        <span data-key="t-file-manager">Microsite</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="bi bi-fire"></i> <span data-key="t-widgets">Berlangganan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="apps-chat.html" class="nav-link menu-link"> <i class="bi bi-person-fill"></i> <span
                            data-key="t-chat">Profil</span> </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
