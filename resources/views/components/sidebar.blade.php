<!-- Sidebar scroll-->
<div>
    <div class="brand-logo align-items-center justify-content-between">
        <a href="{{ route('dashboards.index') }}" class="text-nowrap">
            <h1 class="m-0 fs-4">SIA
            </h1>
            <p class="m-0" style="color: #007bff">Sistem Informasi Akuntansi</p>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboards.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-speedometer2"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Akun</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link {{ Request::is('dashboard/accounts*') ? 'active' : '' }}"
                    href="{{ route('dashboards.accounts.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-bookmark"></i>
                    </span>
                    <span class="hide-menu">List Akun</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Pencatatan dan Pengelolaan Transaksi</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link {{ Request::is('dashboard/transactions*') ? 'active' : '' }}"
                    href="{{ route('dashboards.transactions.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-journal-text"></i>
                    </span>
                    <span class="hide-menu">Pencatatan Transaksi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link {{ Request::is('dashboard/journals*') ? 'active' : '' }}"
                    href="{{ route('dashboards.journals.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-journal-check"></i>
                    </span>
                    <span class="hide-menu">Jurnal Umum dan Jurnal Khusus</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link {{ Request::is('dashboard/ledgers*') ? 'active' : '' }}"
                    href="{{ route('dashboards.ledgers.index') }}" aria-expanded="false">
                    <span>
                        <i class="bi bi-book"></i>
                    </span>
                    <span class="hide-menu">Buku Besar</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Penyesuaian dan Verifikasi</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span class="hide-menu">Neraca Lajur</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="bi bi-pencil-square"></i>
                    </span>
                    <span class="hide-menu">Penyesuaian</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Pelaporan Keuangan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="bi bi-file-earmark-text"></i>
                    </span>
                    <span class="hide-menu">Laporan Keuangan</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Penutupan dan Pembalikan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="bi bi-journal-richtext"></i>
                    </span>
                    <span class="hide-menu">Penutupan Buku</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="bi bi-arrow-repeat"></i>
                    </span>
                    <span class="hide-menu">Entri Pembalikan</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->

<style>
    .brand-logo {
        text-align: center;
        padding: 20px 0;
    }

    .brand-logo h1 {
        font-size: 24px !important;
        font-weight: bold;
        color: #343a40;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link {
        color: #343a40;
        display: flex;
        font-size: 14px;
        white-space: normal;
        align-items: center;
        line-height: 25px;
        position: relative;
        margin: 0 0 2px;
        padding: 10px 15px;
        border-radius: 7px;
        gap: 15px;
        font-weight: 400;
        transition: all 0.3s ease;
        width: 100%;
        overflow: hidden;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link span:first-child {
        display: flex;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link .bi {
        flex-shrink: 0;
        font-size: 21px;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
        color: #007bff;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link:hover.has-arrow::after {
        border-color: #007bff;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link.active {
        background-color: #007bff;
        color: #ffffff;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link.active:hover {
        background-color: #0056b3;
        color: #ffffff;
    }

    .sidebar-nav ul .sidebar-item .sidebar-link.active:hover.has-arrow::after {
        border-color: #ffffff;
    }

    .sidebar-nav ul .sidebar-item .link-disabled {
        opacity: 0.6;
    }

    .sidebar-nav ul .sidebar-item.selected>.sidebar-link,
    .sidebar-nav ul .sidebar-item>.sidebar-link.active {
        background-color: #007bff;
        color: #ffffff;
    }

    .sidebar-nav .sidebar-list .sidebar-list-item {
        padding: 8px 0;
    }

    .collapse.in {
        display: block;
    }

    .sidebar-nav ul .nav-small-cap {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #6c757d;
        font-weight: 600;
        font-size: 12px;
    }

    .sidebar-nav ul .nav-small-cap .nav-small-cap-icon {
        margin-right: 5px;
    }
</style>
