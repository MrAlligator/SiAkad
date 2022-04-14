<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-bug"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Expert <sup>DF</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Navigation
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($is_active == 'dsh') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Konten
    </div>

    <li class="nav-item <?php if ($is_active == 'brt') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-berita') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Berita</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'pgn') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-pengumuman') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Pengumuman</span>
        </a>
    </li>

    <?php if ($user['status_user'] == 1) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            Administrator
        </div>

        <li class="nav-item <?php if ($is_active == 'adm') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('administrator/data-pakar') ?>">
                <i class="fas fa-fw fa-user-md"></i>
                <span>Data Admin</span>
            </a>
        </li>

        <li class="nav-item <?php if ($is_active == 'usr') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('administrator/data-user') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span>
            </a>
        </li>

        <li class="nav-item <?php if ($is_active == 'sbr') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('administrator/data-user') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Siswa Baru</span>
            </a>
        </li>

        <li class="nav-item <?php if ($is_active == 'jwl') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('administrator/data-user') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Jadwal Pembelajaran</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Sistem
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($is_active == 'ssw') {
                            echo 'active';
                        } ?>">
        <a class="nav-link collapsed pb-0" href="<?= base_url('data-siswa') ?>">
            <i class="fas fa-fw fa-bug"></i>
            <span>Siswa</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'gru') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-guru') ?>">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Guru</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'kry') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-karyawan') ?>">
            <i class="fas fa-fw fa-file-medical-alt"></i>
            <span>Karyawan</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'abs') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-absensi') ?>">
            <i class="fas fa-fw fa-notes-medical"></i>
            <span>Absensi</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'gal') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-galeri') ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Galeri</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'prs') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-prestasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Prestasi</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'wks') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-walikelas') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Wali Kelas</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider mt-3 d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->