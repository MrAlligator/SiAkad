<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                Input nilai</div><br>
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('guru/cari-nilai') ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="exampleFormControlSelect1">Kelas</label>
                                        <select name="kelas" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                            <?php foreach ($kelas as $kelas) { ?>
                                                <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['kelas'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlSelect1">Jurusan</label>
                                        <select name="jurusan" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                            <?php foreach ($jurusan as $jurusan) { ?>
                                                <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['jurusan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary">CARI</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->