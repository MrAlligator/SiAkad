<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="<?= base_url('ubah-siswa/' . $studentdata['id_siswa']) ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nis" id="nis" value="<?= $studentdata['nis'] ?>" readonly placeholder="Nomor Induk Siswa"><?= form_error('nis', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="fname" id="fname" placeholder="Nama Depan" value="<?= $studentdata['nama_siswa'] ?>"><?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <select class="form-control" name="jk" id="jk" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki - Laki" <?php if ($studentdata['jk_siswa'] == 'Laki - Laki') {
                                                            echo 'selected';
                                                        } ?>>Laki - Laki</option>
                            <option value="Perempuan" <?php if ($studentdata['jk_siswa'] == 'Perempuan') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col mb-3 mb-sm-0">
                        <select class="form-control" name="agama" id="agama" required>
                            <option value="" selected disabled>Pilih Agama</option>
                            <option value="Islam" <?php if ($studentdata['agama_siswa'] == 'Islam') {
                                                        echo 'selected';
                                                    } ?>>Islam</option>
                            <option value="Kristen" <?php if ($studentdata['agama_siswa'] == 'Kristen') {
                                                        echo 'selected';
                                                    } ?>>Kristen</option>
                            <option value="Hindu" <?php if ($studentdata['agama_siswa'] == 'Hindu') {
                                                        echo 'selected';
                                                    } ?>>Hindu</option>
                            <option value="Budha" <?php if ($studentdata['agama_siswa'] == 'Budha') {
                                                        echo 'selected';
                                                    } ?>>Budha</option>
                            <option value="Katolik" <?php if ($studentdata['agama_siswa'] == 'Katolik') {
                                                        echo 'selected';
                                                    } ?>>Katolik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <select name="kelas" id="kelas" class="form-control" required>
                            <option value="" selected disabled>Pilih Kelas</option>
                            <?php foreach ($classes as $class) : ?>
                                <?php if ($studentdata['id_kelas'] == $class['id_kelas']) : ?>
                                    <option value="<?= $class['id_kelas'] ?>" selected><?= $class['kelas'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $class['id_kelas'] ?>"><?= $class['kelas'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select><?= form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <select name="jurusan" id="jurusan" class="form-control" required>
                            <option value="" selected disabled>Pilih Jurusan</option>
                            <?php foreach ($majors as $major) : ?>
                                <?php if ($studentdata['id_jurusan'] == $major['id_jurusan']) : ?>
                                    <option value="<?= $major['id_jurusan'] ?>" selected><?= $major['jurusan'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $major['id_jurusan'] ?>"><?= $major['jurusan'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="tempatlhr" id="tempatlhr" placeholder="Tempat Lahir" value="<?= $studentdata['tmptlhr_siswa'] ?>"><?= form_error('tempatlhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" name="tanggallhr" id="tanggallhr" placeholder="Tanggal Lahir" value="<?= date('Y-m-d', $studentdata['tgllhr_siswa']) ?>"><?= form_error('tanggallhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat" value="<?= $studentdata['alamat_siswa'] ?>"><?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control form-control-user" name="telp" id="telp" placeholder="No. Telepon" value="<?= $studentdata['telp_siswa'] ?>"><?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <img src="<?= base_url('assets/img/siswa/' . $studentdata['foto_siswa']) ?>" width="300" height="300" id="image-prev" class="img-thumbnails" alt="">
                        <p></p>
                        <label for="image">Gambar</label>
                        <input type="file" accept="image/*" class="form-control form-control-user" name="image" id="image" onchange="previewFile(this);">
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