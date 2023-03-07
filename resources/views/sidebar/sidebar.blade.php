<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        {{-- <div class="sidebar-brand-icon">
            <img src="{{ asset('img/laundry.png') }}" class="rounded-circle" style="width: 50px; heigth:auto;" alt="">
        </div> --}}
        {{-- <div class="sidebar-brand-text mx-3">ARSYILA <sup style="text-transform:lowercase">LAUNDRY</sup></div> --}}
        <div class="sidebar-brand-text mx-3">ARSYILA LAUNDRY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item side {{ Request::is('dashboard')  ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
        
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item side {{ Request::is('dashboard/master/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-table"></i>
        <span>Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kategori</h6>
            <a class="collapse-item" href="/dashboard/master/pelanggan">Pelanggan</a>
            <a class="collapse-item" href="/dashboard/master/jenis_pengeluaran">Jenis Pengeluaran</a>
            <a class="collapse-item" href="/dashboard/master/produk">Produk</a>
        </div>
    </div>
</li>


@if (!auth()->user()->role_id)
    
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item side {{ Request::is('dashboard/invoice') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/invoice">
        <i class="fas fa-dollar-sign"></i>        
        <span>Transaksi</span></a>
    </li>
    
    @endif
@can('admin')

<!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item side {{ Request::is('dashboard/invoice') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/invoice">
            <i class="fas fa-dollar-sign"></i>              
             <span>Transaksi</span></a>
    </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item side {{ Request::is('dashboard/laporan') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard/laporan">
                <i class="fas fa-fw fa-chart-area"></i>           
                <span>Laporan P+/P-</span></a>
            </li>
            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item side">
                <a class="nav-link" href="/dashboard/user">
                    <i class="fas fa-fw fa-user"></i>           
                    <span>Pengguna</span></a>
                </li>
                {{-- <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item side">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-fw fa-cog"></i>           
                            <span>Hak Akses</span></a>
                        </li> --}}
                        
                        @endcan
                        <li class="nav-item side {{ Request::is('dashboard/cetak_laporan/*') ? 'active' : '' }}">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree"
                            aria-expanded="true" aria-controls="collapseTree">
                            <i class="fas fa-table"></i>
                            <span>Cetak Laporan</span>
                        </a>
                        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Kategori</h6>
                                <a class="collapse-item" href="/dashboard/cetak_laporan/laporan_transaksi">Laporan Transaksi</a>
                                <a class="collapse-item" href="/dashboard/cetak_laporan/laporan_jenis_pengeluaran">Laporan Jenis Pengeluaran</a>
                                <a class="collapse-item" href="/dashboard/cetak_laporan/laporan_produk">Laporan Produk</a>
                            </div>
                        </div>
                    </li>
                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">
                        
                        <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
