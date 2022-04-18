<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color text-center">Data <?= $detailSiswa['nama_siswa']; ?></h3>
            <br>
            <br>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/' . $detailSiswa['foto_siswa']) ?>" class="img-fluid">
                    <!-- <a href="<?= $detailSiswa['foto_siswa']; ?>" class="img-gal">
                        <div class="single-gallery-image" style="background: url(<?= $detailSiswa['foto_siswa']; ?>);"></div>
                    </a> -->
                </div>
                <div class="card" style="width: 30rem;">
                    <div class="card-header">
                        <h5 class="card-title text-center"><strong><?= $detailSiswa['nama_siswa']; ?></strong></h5>
                        <h6 class="card-subtitle mb-2 text-muted text-center"><?= strtoupper($detailSiswa['nis']); ?></h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>Tempat Tanggal Lahir</strong></td>
                                    <td><?= $detailSiswa["tmptlhr_siswa"]; ?>, <?php echo date("d F Y", strtotime($detailSiswa['tgllhr_siswa'])); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Kelamin</strong></td>
                                    <td><?= $detailSiswa['jk_siswa']; ?>
                                </tr>
                                <tr>
                                    <td><strong>Agama</strong></td>
                                    <td><?= $detailSiswa['agama_siswa']; ?>
                                </tr>
                                <tr>
                                    <td><strong>Alamat</strong></td>
                                    <td><?= $detailSiswa['alamat_siswa']; ?>
                                </tr>
                                <tr>
                                    <td><strong>Telepon</strong></td>
                                    <td><?= $detailSiswa['telp_siswa']; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
        <br>
    </div>
</div>
</div>
<br>