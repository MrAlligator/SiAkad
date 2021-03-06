<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <i><img src="<?= base_url('assets/') ?>img/logosmk.png" width="50" alt=""></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMK <sup>DARUSSALAM</sup></div>
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

        <li class="nav-item <?php if ($is_active == 'sbr') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('administrator/data-calon-siswa-baru') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Siswa Baru</span>
            </a>
        </li>

        <li class="nav-item <?php if ($is_active == 'jwl') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('administrator/data-jadwal-pembelajaran') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Jadwal Pembelajaran</span>
            </a>
        </li>

    <?php elseif ($user['status_user'] == 2) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            Guru
        </div>

        <li class="nav-item <?php if ($is_active == 'inl') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('guru/nilai') ?>">
                <i class="fas fa-fw fa-user-md"></i>
                <span>Input Nilai</span>
            </a>
            <a class="nav-link pb-0" href="<?= base_url('guru/jadwal') ?>">
                <i class="fas fa-fw fa-user-md"></i>
                <span>Jadwal KBM</span>
            </a>
        </li>

    <?php elseif ($user['status_user'] == 3) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            Karyawan
        </div>

        <li class="nav-item <?php if ($is_active == 'pdf') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('karyawan/pendaftaran') ?>">
                <i class="fas fa-fw fa-user-md"></i>
                <span>Pendaftaran Siswa Baru</span>
            </a>
        </li>

        <li class="nav-item <?php if ($is_active == 'ver') {
                                echo 'active';
                            } ?>">
            <a class="nav-link pb-0" href="<?= base_url('karyawan/verifikasi') ?>">
                <i class="fas fa-fw fa-user-md"></i>
                <span>Verifikasi Berkas</span>
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

    <li class="nav-item <?php if ($is_active == 'mtr') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-materi') ?>">
            <i class="fas fa-fw fa-file-medical-alt"></i>
            <span>Materi</span>
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

    <li class="nav-item <?php if ($is_active == 'jrs') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-jurusan') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Jurusan</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'mpl') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-mapel') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mapel</span>
        </a>
    </li>

    <li class="nav-item <?php if ($is_active == 'pgj') {
                            echo 'active';
                        } ?>">
        <a class="nav-link pb-0" href="<?= base_url('data-pengajar') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengajar</span>
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