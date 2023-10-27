<style>
.dal{
    margin-left: -8%;
}
@media (min-width: 601px) and (max-width: 1024px) {
    .dal{
    margin-left: 3%;
}
        }
        @media (max-width: 768px) {
            .dal{
    margin-left: 3%;
}
        }
    </style>
<header id="page-topbar">
    <div class="atas">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-dark.png') }}" alt="" height="22">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/logo-light.png') }}" alt="" height="22">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
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

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" data-toggle="fullscreen">
                            <i class='bi bi-arrows-fullscreen fs-lg'></i>
                        </button>
                    </div>

                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class='bi bi-bell fs-2xl'></i>
                        <span class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span class="notification-badge">4</span><span class="visually-hidden">unread
                                messages</span></span>
                    </button>
                    <div class="dropdown topbar-head-dropdown ms-1 header-item"><a href="/user/subscribe-product-user" type="button" class="btn" style="background-color: #0E2954;><i class=" bi bi-fire"></i>
                            <span style="color: #ffff;">Berlangganan</span></a>
                    </div>

                    <!-- <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown"> -->
                    <!-- Default Modals -->


                    <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head rounded-top">
                                <div class="p-3 border-bottom border-bottom-dashed">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="mb-0 fs-lg fw-semibold"> Pesan Baru</h6>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn-close" data-bs-dismiss="dropdown" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2 ps-2" id="notificationItemsTabContent">
                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                    <div class="d-flex">

                                        <div class="position-relative me-3 flex-shrink-0">
                                            <img src="https://i.postimg.cc/nLqMtBQJ/default.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                            <span class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                <span class="visually-hidden">New alerts</span>
                                            </span>
                                        </div>

                                        <div class="flex-grow-1">
                                            <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-md fw-semibold">Maureen Gibson</h6>
                                            </a>
                                            <div class="fs-sm text-muted">
                                                <p class="mb-1">We talked about a project.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center align-items-center">
                                        Select <div id="select-content" class="text-body fw-semibold px-1">0
                                        </div> Result <button type="button" class="btn btn-link link-danger p-0 ms-2" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i>
                            <span class="align-middle">Messages</span></a>
                        <a class="dropdown-item" href="apps-tickets-overview.html"><i class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i>
                            <span class="align-middle">Taskboard</span></a>
                        <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Help</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Balance : <b>$8451.36</b></span></a>
                        <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                        <a class="dropdown-item" href="auth-lockscreen.html"><i class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                        <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
</header>
<div id="myModal" class="modal fade mt-5 dal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;overflow: hidden;">
    <div class="modal-dialog modal-dialog-right modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pesan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="d-flex mt-2">

                    <div class="position-relative me-3 flex-shrink-0">
                        <img src="{{ asset('template/image/Saly-17.png') }}" class="rounded-circle avatar-xs" alt="user-pic">
                        <span class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </div>

                    <div class="flex-grow-1">
                        <a href="#!" class="stretched-link">
                            <h6 class="mt-0 mb-1 fs-md fw-semibold">Adi alfa</h6>
                        </a>
                        <div class="fs-sm text-muted">
                            <p class="mb-1" style="text-overflow: ellipsis !important;
                                                overflow: hidden !important;
                                                -webkit-line-clamp: 1 !important;
                                                -webkit-box-orient: vertical !important;
                                                display: -webkit-box !important;
                                                word-break: break-word !important;
                                                max-width: 300px;">Boleh saya tahu informasi lebih lanjut mengenai Milink?</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-2">

                    <div class="position-relative me-3 flex-shrink-0">
                        <img src="{{ asset('template/image/Saly-17.png') }}" class="rounded-circle avatar-xs" alt="user-pic">
                        <span class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </div>

                    <div class="flex-grow-1">
                        <a href="#!" class="stretched-link">
                            <h6 class="mt-0 mb-1 fs-md fw-semibold">Putri</h6>
                        </a>
                        <div class="fs-sm text-muted">
                            <p class="mb-1" style="text-overflow: ellipsis !important;
                                                overflow: hidden !important;
                                                -webkit-line-clamp: 1 !important;
                                                -webkit-box-orient: vertical !important;
                                                display: -webkit-box !important;
                                                word-break: break-word !important;
                                                max-width: 300px;">Coba ceritakan lebih banyak lagi tentang MiLink</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <a href="#" style="margin-right: 22%;color: red; ">Hapus Semua</a>
                    <a href="#">Lihat lebih banyak</a>
                </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@section('script')
<script src="path/to/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdown = new bootstrap.Dropdown(document.querySelector('.dropdown-toggle'));
    });
</script>
<script>
    const hamburgerButton = document.getElementById('topnav-hamburger-icon');
    const contentDiv = document.querySelector('.text-start');

    hamburgerButton.addEventListener('click', function() {
        contentDiv.classList.toggle('hamburger-icon-open');
    });
</script>

@endsection
