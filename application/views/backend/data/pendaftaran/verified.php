<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="calonsiswabaru-tab" data-toggle="tab" href="#calonsiswabaru" role="tab" aria-controls="calonsiswabaru" aria-selected="true">Calon Siswa Baru</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="siswaditerima-tab" data-toggle="tab" href="#siswaditerima" role="tab" aria-controls="siswaditerima" aria-selected="false">Di Terima</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="siswaditolak-tab" data-toggle="tab" href="#siswaditolak" role="tab" aria-controls="siswaditolak" aria-selected="false">Di Tolak</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="calonsiswabaru" role="tabpanel" aria-labelledby="calonsiswabaru-tab">
                    <br>
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
                                            <td><?= ++$st ?></td>
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
                                                <a href="#" data-toggle="modal" data-target="#rejectModal-<?= $verify['id_pendaftaran'] ?>" class="badge badge-danger">Tolak</a>
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
                <div class="tab-pane fade" id="siswaditerima" role="tabpanel" aria-labelledby="siswaditerima-tab">
                    <br>
                    <!-- Pesanan Di Proses -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Pendaftaran</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Asal SMP</th>
                                    <th>Foto Pendaftar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($countAcc > 0) : ?>
                                    <?php foreach ($accepts as $accept) : ?>
                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td><?= $accept['no_pendaftaran'] ?></td>
                                            <td><?= $accept['nama_pendaftar'] ?></td>
                                            <td><?= $accept['asal_smp'] ?></td>
                                            <td><img src="<?= base_url('assets/img/pendaftar/' . $accept['image_pendaftar']) ?>" width="100" height="100" alt=""></td>
                                            <td>
                                                <div class=" badge badge-success">
                                                    <?php if ($accept['lolos'] == 1) {
                                                        echo 'Diterima';
                                                    } ?>
                                                </div>
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
                <div class="tab-pane fade" id="siswaditolak" role="tabpanel" aria-labelledby="siswaditolak-tab">
                    <br>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($countRej > 0) : ?>
                                    <?php foreach ($rejects as $rejects) : ?>
                                        <tr>
                                            <td><?= ++$st ?></td>
                                            <td><?= $rejects['no_pendaftaran'] ?></td>
                                            <td><?= $rejects['nama_pendaftar'] ?></td>
                                            <td><?= $rejects['asal_smp'] ?></td>
                                            <td><img src="<?= base_url('assets/img/pendaftar/' . $rejects['image_pendaftar']) ?>" width="100" height="100" alt=""></td>
                                            <td>
                                                <div class=" badge badge-danger">
                                                    <?php if ($rejects['lolos'] == 2) {
                                                        echo 'Ditolak';
                                                    } ?>
                                                </div>
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

<!-- Modal -->
<?php foreach ($verifies as $verify) : ?>
    <form action="<?= base_url('administrator/reject') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="rejectModal-<?= $verify['id_pendaftaran'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Tolak Siswa?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span>Dengan menekan tombol tolak dibawah <?= $verify['nama_pendaftar'] ?> akan ditolak di SMK Darussalam</span>
                        <div class="form-group row" hidden>
                            <input type="text" name="id" id="id" value="<?= $verify['id_pendaftaran'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>