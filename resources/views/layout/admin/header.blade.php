<style>
    .dal {
        margin-left: -3%;
    }

    @media (min-width: 601px) and (max-width: 1024px) {
        .dal {
            margin-left: 3%;
        }
    }

    @media (max-width: 768px) {
        .dal {
            margin-left: 3%;
        }
    }
</style>
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-sm.png') }}"
                                alt="" height="22">
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
                </div>

                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>


            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                </div>
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                    data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class='bi bi-bell fs-2xl'></i>
                    <span
                        class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span
                            class="notification-badge" id="count-messages"></span><span class="visually-hidden">unread
                            messages</span></span>
                </button>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bi bi-arrows-fullscreen fs-lg'></i>
                    </button>
                </div>

                {{-- <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/users/32/avatar-1.jpg') }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Richard
                                    Marshall</span>
                                <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">Founder</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome Richard!</h6>
                        <a class="dropdown-item" href="pages-profile.html"><i
                                class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="apps-chat.html"><i
                                class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i>
                            <span class="align-middle">Messages</span></a>
                        <a class="dropdown-item" href="apps-tickets-overview.html"><i
                                class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i>
                            <span class="align-middle">Taskboard</span></a>
                        <a class="dropdown-item" href="pages-faqs.html"><i
                                class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle">Help</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-profile.html"><i
                                class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle">Balance : <b>$8451.36</b></span></a>
                        <a class="dropdown-item" href="pages-profile-settings.html"><span
                                class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                                class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle">Settings</span></a>
                        <a class="dropdown-item" href="auth-lockscreen.html"><i
                                class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle">Lock screen</span></a>
                        <a class="dropdown-item" href="auth-logout.html"><i
                                class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</header>
<div id="myModal" class="modal fade mt-5 dal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;overflow: hidden;">
    <div class="modal-dialog modal-dialog-right modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pesan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div id="data-admin"></div>
                <div id="empty-messages" style="display: none; text-align: center;">
                    <img src="{{ asset('no-notification.png') }}" alt="Empty Messages Image"
                        style="width: 200px; height: 200px;">
                    <p>Tidak ada pesan masuk!</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('set.all.messages.seen.admin') }}" style="margin-right: 22%; color: red;">Hapus Semua</a>
                <a href="{{ url('milink/chat') }}">Lihat lebih banyak</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
