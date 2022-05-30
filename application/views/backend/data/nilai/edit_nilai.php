<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h5>
        </div>
        <form action="<?= base_url('tambah-guru') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <label class="col-sm-4 col-form-label"><?= $data['nama_siswa'] ?></label>
                    <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <label class="col-sm-4 col-form-label">: <?= $data['kode_mapel'] . ' - ' . $data['nama_mapel'] ?>
                    </label>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <label class="col-sm-4 col-form-label">: <?= $data['kelas'] ?></label>
                    <label class="col-sm-2 col-form-label">Jurusan</label>
                    <label class="col-sm-4 col-form-label">: <?= $data['jurusan'] ?></label>
                </div>
                <h5 class="m-0 font-weight-bold text-primary">Masukkan Nilai</h5><br>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ulangan Harian 1</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" placeholder="<?= $data['nilai_uh_1'] ?>">
                    </div>
                    <label class="col-sm-3 col-form-label">Ujian Tengah Semester</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" placeholder="<?= $data['nilai_uts'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ulangan Harian 2</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" placeholder="<?= $data['nilai_uh_2'] ?>">
                    </div>
                    <label class="col-sm-3 col-form-label">Ujian Akhir Semester</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" placeholder="<?= $data['nilai_uas'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ulangan Harian 3</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" placeholder="<?= $data['nilai_uh_3'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ulangan Harian 4</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" placeholder="<?= $data['nilai_uh_4'] ?>">
                    </div>
                    <label class="col-sm-3 col-form-label">Nilai Sikap</label>
                    <div class="col-sm-3">
                        <select type="password" class="form-control">
                            <option value="A">Sangat Baik</option>
                            <option value="B">Baik</option>
                            <option value="C">Cukup</option>
                            <option value="D">Kurang</option>
                        </select>
                    </div>
                </div>

                <script>
                    function previewFile(input) {
                        var file = $("input[type=file]").get(0).files[0];
                        if (file) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                $("#image-prev").attr("src", reader.result);
                            }
                            reader.readAsDataURL(file);
                        }
                    }
                </script>
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