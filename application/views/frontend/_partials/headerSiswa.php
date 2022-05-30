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
                    <a href="<?= base_url() ?>" class="text-uppercase">menu utama</a>
                    <a href="<?= base_url('logout') ?>" class="text-uppercase">keluar</a>
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
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/jadwal') ?>">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/nilai') ?>">Nilai</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/materi') ?>">Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/profil') ?>">Profil</a></li>
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