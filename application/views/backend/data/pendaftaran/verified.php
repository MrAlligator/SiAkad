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
                                        <div class=" badge badge-success">
                                            <?php if ($verify['verified_berkas_pendaftar'] == 1) {
                                                echo 'Sudah Diverifikasi';
                                            } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#acceptModal-<?= $verify['id_pendaftaran'] ?>" class="badge badge-primary">Terima</a>
                                        <a href="#" data-toggle="modal" data-target="#verifyModal-<?= $verify['id_pendaftaran'] ?>" class="badge badge-danger">Tolak</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <h4 class="text-danger text-center">Belum ada Data yang di Input</h4>
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

<!-- Modal -->
<?php foreach ($verifies as $verify) : ?>
    <form action="<?= base_url('administrator/verify') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="acceptModal-<?= $verify['id_pendaftaran'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="acceptModalLabel">Terima Siswa?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span>Dengan menekan tombol terima dibawah <?= $verify['nama_pendaftar'] ?> akan diterima di SMK Darussalam</span>
                        <div class="form-group row" hidden>
                            <input type="text" name="nis" id="nis" value="<?php if (strlen($countSiswa) == 1) {
                                                                                echo 'N' . date('Y') . '00' . ++$countSiswa;
                                                                            } elseif (strlen($countSiswa) == 2) {
                                                                                echo 'N' . date('Y') . '0' . ++$countSiswa;
                                                                            } elseif (strlen($countSiswa) == 3) {
                                                                                echo 'N' . date('Y') . ++$countSiswa;
                                                                            }
                                                                            ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="nama" id="nama" value="<?= $verify['nama_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="foto" id="foto" value="<?= $verify['image_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="jurusan" id="jurusan" value="<?= $verify['pilihan_jurusan'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="jk" id="jk" value="<?= $verify['jk_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="agama" id="agama" value="<?= $verify['agama_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="tmptlhr" id="tmptlhr" value="<?= $verify['tmptlhr_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="tgllhr" id="tgllhr" value="<?= $verify['tgllhr_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="alamat" id="alamat" value="<?= $verify['alamat_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="telp" id="telp" value="<?= $verify['telp_pendaftar'] ?>">
                        </div>
                        <div class="form-group row" hidden>
                            <input type="text" name="id" id="id" value="<?= $verify['id_pendaftaran'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>