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
                                    <td><a href="#" data-toggle="modal" data-target="#verifyModal-<?= $verify['id_pendaftaran'] ?>" class="badge badge-primary">Cek Berkas</a></td>
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