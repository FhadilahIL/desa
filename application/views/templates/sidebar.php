<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="<?= base_url('/assets/img/settings/logo.png') ?>">
            </div>
            <div class="sidebar-brand-text mx-3">DESA CIKANDE</div>
        </a>
        <div class="sidebar-heading mt-3">
            Menu
        </div>
        <hr class="sidebar-divider">
        <li class="nav-item <?= $active[0] ?>">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?= $active[1] ?>">
            <a class="nav-link" href="<?= base_url('admin/data_admin') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Admin</span>
            </a>
        </li>
        <li class="nav-item <?= $active[2] ?>">
            <a class="nav-link" href="<?= base_url('admin/data_warga') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Warga</span>
            </a>
        </li>
        <li class="nav-item <?= $active[3] ?>">
            <a class="nav-link" href="<?= base_url('admin/data_pengaduan') ?>">
                <i class="fas fa-fw fa-file-contract"></i>
                <span>Data Pengaduan</span>
            </a>
        </li>
        <li class="nav-item <?= $active[4] ?>">
            <a class="nav-link" href="<?= base_url('admin/data_surat') ?>">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Data Surat</span>
            </a>
        </li>
        <li class="nav-item <?= $active[5] ?>">
            <a class="nav-link" href="<?= base_url('admin/data_berita') ?>">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Data Berita</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Auth
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
    <!-- Sidebar -->