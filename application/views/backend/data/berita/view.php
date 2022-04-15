<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="h3 mb-2 text-gray-800 text-center"><?= $newsdata['judul_konten'] ?></h1>
            <br>
            <div class="text-center">
                <img src="<?= base_url('assets/img/berita/' . $newsdata['image_konten']) ?>" class="" width="500" alt="<?= $newsdata['slug_konten'] ?>">
            </div>
            <p></p>
            <p class="text-center small mb-0">Dipublikasikan pada <?= date('d, M Y, H:i', $newsdata['uploaded_at']) ?>.</p>
            <div class="text-center mt-3">
                <a href="<?= base_url('data-berita') ?>" class="btn btn-info btn-user btn-sm">Kembali</a>
            </div>

            <div class="text-center mt-4">
                <?= $newsdata['body_konten'] ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->