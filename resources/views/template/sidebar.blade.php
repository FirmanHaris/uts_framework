<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index-2.html" class="header-logo">
            <img src="{{ asset('assets') }}/images/brand-logos/logospk.png" alt="logo" class="desktop-dark">
            <img src="{{ asset('assets') }}/images/brand-logos/spk.png" alt="logo" class="toggle-dark">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('dashboard') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('bagian') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Bagian</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('pegawai') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Pegawai</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('pic') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">PIC</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('kategori') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Kategori</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('progres') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Progres</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('kebutuhan') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Kebutuhan</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('pengajuan') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">Pengajuan Kebutuhan</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('register') }}" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon"></i>
                        <span class="side-menu__label">User</span>
                    </a>
                </li>

                <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
