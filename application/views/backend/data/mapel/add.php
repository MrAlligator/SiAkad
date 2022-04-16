<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="<?= base_url('tambah-mapel') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="kode" id="kode" placeholder="Kode Mapel" readonly value="<?php
                                                                                                                                                    $n = $count;
                                                                                                                                                    if ($count < 99) {
                                                                                                                                                        echo 'M0' . ++$n;
                                                                                                                                                    } elseif ($count < 10) {
                                                                                                                                                        echo 'M00' . ++$n;
                                                                                                                                                    } ?>"><?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="mapel" id="mapel" placeholder="Mata Pelajaran"><?= form_error('mapel', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Simpan Data</button>
                    <a href="javascript:window.history.go(-1);" class="btn btn-secondary btn-user">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->