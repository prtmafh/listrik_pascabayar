<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{route('pelanggan.dashboard')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="./assets/img/AdminLTELogo.png" alt="PLN Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">PLN</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item menu-open">
                    <a href="{{ route('pelanggan.dashboard') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="{{ route('pelanggan.penggunaan_saya') }}" class="nav-link">
                        <i class="nav-icon bi bi-graph-up"></i>
                        <p>Penggunaan Saya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pelanggan.tagihan_saya') }}" class="nav-link">
                        <i class="nav-icon bi bi-receipt"></i>
                        <p>Tagihan Saya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pelanggan.riwayat_pembayaran') }}" class="nav-link">
                        <i class="nav-icon bi bi-credit-card"></i>
                        <p>Riwayat Pembayaran</p>
                    </a>
                </li>
                <li class="nav-header">OPSI</li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>