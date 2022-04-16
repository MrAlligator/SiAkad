<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-3">
            <a href="<?= base_url('karyawan/input-calon-siswa-baru') ?>" class="btn btn-primary">Input Data Pendaftar</a>
        </div>
    </div>

    <br>

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0) : ?>
                            <?php foreach ($registrants as $registrant) : ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $registrant['no_pendaftaran'] ?></td>
                                    <td><?= $registrant['nama_pendaftar'] ?></td>
                                    <td><?= $registrant['asal_smp'] ?></td>
                                    <td><img src="<?= base_url('assets/img/pendaftar/' . $registrant['image_pendaftar']) ?>" width="100" height="100" alt=""></td>
                                    <td class="text-center">
                                        <?php if ($registrant['verified_berkas_pendaftar'] == 0) : ?>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal-<?= $registrant['id_pendaftaran'] ?>" class=" badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                                        <?php else : ?>
                                            <div class="badge badge-success">Sudah diverifikasi</div>
                                        <?php endif; ?>
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

<!-- Delete Modal-->
<?php foreach ($registrants as $registrant) : ?>
    <div class="modal fade" id="deleteModal-<?= $registrant['id_pendaftaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang Dihapus tidak bisa dikembalikan</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('karyawan/hapus-calon-siswa-baru/' . $registrant['id_pendaftaran']) ?>">Yakin</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>