<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="<?= base_url('tambah-materi') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm">
                        <input type="text" class="form-control form-control-user" name="judul_materi" id="judul_materi" placeholder="Judul Materi"><?= form_error('judul_materi', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <select type="text" class="form-control form-control-user" name="mapel" id="mapel" placeholder="Mata Pelajaran"><?= form_error('mapel', '<small class="text-danger pl-3">', '</small>') ?>
                            <option disabled selected>Mata Pelajaran</option>
                            <?php foreach ($mapel as $mapel) { ?>
                                <option value=<?= $mapel['kode_mapel'] ?>><?= $mapel['kode_mapel'] . ' - ' . $mapel['nama_mapel'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select type="text" class="form-control form-control-user" name="kelas" id="kelas" placeholder="Kelas"><?= form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
                            <option disabled selected>Kelas</option>
                            <?php foreach ($kelas as $kelas) { ?>
                                <option value=<?= $kelas['id_kelas'] ?>><?= $kelas['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <select type="text" class="form-control form-control-user" name="jurusan" id="jurusan" placeholder="Jurusan"><?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>') ?>
                            <option disabled selected>Jurusan</option>
                            <?php foreach ($jurusan as $jurusan) { ?>
                                <option value=<?= $jurusan['id_jurusan'] ?>><?= $jurusan['jurusan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm">
                        <input type="file" accept=".doc,.docx,.ppt,.pptx,.pdf" class="form-control form-control-user" name="file_materi" id="file_materi" placeholder="File Materi">
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