<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="row align-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
                </div>
                <form action="<?= base_url('tambah-pengajar') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-sm-0">
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value="" selected disabled>Pilih Kelas</option>
                                    <?php foreach ($classes as $class) : ?>
                                        <option value="<?= $class['id_kelas'] ?>"><?= $class['kelas'] ?></option>
                                    <?php endforeach; ?>
                                </select><?= form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="col-md-6 mb-3 mb-sm-0">
                                <select name="jurusan" id="jurusan" class="form-control" required>
                                    <option value="" selected disabled>Pilih Jurusan</option>
                                    <?php foreach ($majors as $major) : ?>
                                        <option value="<?= $major['id_jurusan'] ?>"><?= $major['jurusan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md">
                                <select name="mapel" id="mapel" class="form-control" required>
                                    <option value="" selected disabled>Pilih Mata Pelajaran</option>
                                    <?php foreach ($subjects as $subject) : ?>
                                        <option value="<?= $subject['kode_mapel'] ?>"><?= $subject['nama_mapel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md">
                                <select name="pengajar" id="pengajar" class="form-control" required>
                                    <option value="" selected disabled>Pilih Pengajar</option>
                                    <?php foreach ($teachers as $teacher) : ?>
                                        <option value="<?= $teacher['nip'] ?>"><?= $teacher['nama_guru'] ?></option>
                                    <?php endforeach; ?>
                                </select>
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
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->