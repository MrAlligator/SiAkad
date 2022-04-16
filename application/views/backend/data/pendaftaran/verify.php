<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Pendaftaran</th>
                            <th>Nama Pendaftar</th>
                            <th>Asal SMP</th>
                            <th>Foto Pendaftar</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0) : ?>
                            <?php foreach ($verifies as $verify) : ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $verify['no_pendaftaran'] ?></td>
                                    <td><?= $verify['nama_pendaftar'] ?></td>
                                    <td><?= $verify['asal_smp'] ?></td>
                                    <td><img src="<?= base_url('assets/img/pendaftar/' . $verify['image_pendaftar']) ?>" width="100" height="100" alt=""></td>
                                    <td>
                                        <div class=" badge badge-danger">
                                            <?php if ($verify['verified_berkas_pendaftar'] == 0) {
                                                echo 'belum diverifikasi';
                                            } ?>
                                        </div>
                                    </td>
                                    <td><a href="#" data-toggle="modal" data-target="#verifyModal-<?= $verify['id_pendaftaran'] ?>" class="badge badge-primary">Cek Berkas</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <h4 class="text-danger text-center">Semua Berkas Telah di verifikasi</h4>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Verifikasi -->
<?php foreach ($verifies as $verify) : ?>
    <form action="<?= base_url('karyawan/verified/' . $verify['id_pendaftaran']) ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="verifyModal-<?= $verify['id_pendaftaran'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalLabel">Verifikasi Berkas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/pendaftar/' . $verify['image_pendaftar']) ?>" height="200" width="200" alt="">
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>Nomor Pendaftaran</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['no_pendaftaran'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['nama_pendaftar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['tmptlhr_pendaftar'] . ', ' . date('d M Y', $verify['tgllhr_pendaftar']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['jk_pendaftar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['agama_pendaftar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal SMP</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['asal_smp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['alamat_pendaftar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon</td>
                                        <td>&nbsp;</td>
                                        <td>:</td>
                                        <td><?= $verify['telp_pendaftar'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>