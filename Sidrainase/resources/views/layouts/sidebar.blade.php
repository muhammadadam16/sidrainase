        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('front.welcome') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-search"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SiDrainase</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $menudashboard ?? '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (auth()->user()->status == 'Admin')
                <div class="sidebar-heading">
                    ADMIN
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Charts -->
                <li class="nav-item {{ $menuAdminUser ?? '' }}">
                    <a class="nav-link" href="{{ route('pegawai') }}">
                        <i class="bi bi-person-add"></i>
                        <span>Data Pegawai</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Nav Item - Tables -->
                <li class="nav-item {{ $menuAdminSaluranDrainase ?? '' }}">
                    <a class="nav-link" href="{{ route('salurandrainase') }}">
                        <i class="bi bi-water"></i>
                        <span>Saluran Drainase</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            @else
                <div class="sidebar-heading">
                    KARYAWAN
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item {{ $menuKaryawanSaluranDrainase ?? '' }}">
                    <a class="nav-link" href="{{ route('salurandrainase') }}">
                        <i class="bi bi-water"></i>
                        <span>Saluran Drainase</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
