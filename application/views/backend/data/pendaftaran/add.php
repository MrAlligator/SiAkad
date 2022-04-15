<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="no_daftar" id="no_daftar" placeholder="Nomor Pendaftaran" readonly value="<?= strtotime('now') ?>"><?= form_error('no_daftar', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="asal" id="asal" placeholder="Asal SMP"><?= form_error('asal', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Calon Siswa Baru"><?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="tmptlhr" id="tmptlhr" placeholder="Tempat Lahir"><?= form_error('tmptlhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user" name="tgllhr" id="tgllhr" placeholder="Tanggal Lahir"><?= form_error('tgllhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <select class="form-control" name="jk" id="jk" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <select class="form-control" name="agama" id="agama" required>
                            <option value="" selected disabled>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Katolik">Katolik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md">
                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat"><?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md">
                        <input type="text" class="form-control form-control-user" name="telp" id="telp" placeholder="No. Telepon"><?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/index.jpg') ?>" width="200" id="image-prev" class="img-thumbnails" alt="">
                    </div>
                    <div class="col-md-8">
                        <label for="image">Gambar</label>
                        <input type="file" accept="image/*" class="form-control form-control-user" name="image" id="image" onchange="previewFile(this);" required>
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