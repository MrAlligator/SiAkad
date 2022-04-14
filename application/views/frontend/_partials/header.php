<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-4 header-top-left">
                    <a href="tel:+6285231821348">
                        <span class="lnr lnr-phone"></span>
                        <span class="text">
                            <span class="text">(+62)8523 1821 348</span>
                        </span>
                    </a>
                    <a href="mailto:darussalamsmk11@yahoo.com">
                        <span class="lnr lnr-envelope"></span>
                        <span class="text">
                            <span class="text">darussalamsmk11@yahoo.com</span>
                        </span>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                    <a href="<?= base_url('login') ?>" class="text-uppercase">Masuk</a>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu">
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" id="cari" method="" action="">
                    <input type="text" class="form-control" id="search_input" name="search_input" placeholder="Cari">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Tutup"></span>
                </form>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="<?= base_url('assets/') ?>img/logo2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="sambutan.php">Sambutan</a></li>
                                <li class="nav-item"><a class="nav-link" href="sejarah.php">Sejarah</a></li>
                                <li class="nav-item"><a class="nav-link" href="profilsingkat.php">Profil Singkat</a></li>
                                <li class="nav-item"><a class="nav-link" href="visimisi.php">Visi dan Misi</a></li>
                                <li class="nav-item"><a class="nav-link" href="struktur.php">Struktur</a></li>
                            </ul>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="siswa.php">Siswa</a></li>
                                <li class="nav-item"><a class="nav-link" href="guru.php">Guru</a></li>
                                <li class="nav-item"><a class="nav-link" href="karyawan.php">Karyawan</a></li>
                                <li class="nav-item"><a class="nav-link" href="jadwal.php">Jadwal</a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jurusan</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="multimedia.php">Multimedia</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ekstrakurikuler</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="pencak_silat.php">Pencak Silat</a></li>
                                <li class="nav-item"><a class="nav-link" href="pramuka.php">Pramuka</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="photo.php">Foto</a></li>
                                <li class="nav-item"><a class="nav-link" href="video.php">Video</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="pengumuman.php">Pengumuman</a></li>
                                <li class="nav-item"><a class="nav-link" href="berita.php">Berita</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="akademik2.php">Prestasi</a></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link search" id="search" data-target="#cari">
                                <i class="lnr lnr-magnifier"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->