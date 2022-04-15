<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="<?= base_url('ubah-guru/' . $teacherdata['id_guru']) ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nip" id="nip" value="<?= $teacherdata['nip'] ?>" readonly placeholder="Nomor Induk Pegawai"><?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="fname" id="fname" placeholder="Nama Depan" value="<?= $teacherdata['nama_guru'] ?>"><?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <select class="form-control" name="jk" id="jk" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki - Laki" <?php if ($teacherdata['jk_guru'] == 'Laki - Laki') {
                                                            echo 'selected';
                                                        } ?>>Laki - Laki</option>
                            <option value="Perempuan" <?php if ($teacherdata['jk_guru'] == 'Perempuan') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col mb-3 mb-sm-0">
                        <select class="form-control" name="agama" id="agama" required>
                            <option value="" selected disabled>Pilih Agama</option>
                            <option value="Islam" <?php if ($teacherdata['agama_guru'] == 'Islam') {
                                                        echo 'selected';
                                                    } ?>>Islam</option>
                            <option value="Kristen" <?php if ($teacherdata['agama_guru'] == 'Kristen') {
                                                        echo 'selected';
                                                    } ?>>Kristen</option>
                            <option value="Hindu" <?php if ($teacherdata['agama_guru'] == 'Hindu') {
                                                        echo 'selected';
                                                    } ?>>Hindu</option>
                            <option value="Budha" <?php if ($teacherdata['agama_guru'] == 'Budha') {
                                                        echo 'selected';
                                                    } ?>>Budha</option>
                            <option value="Katolik" <?php if ($teacherdata['agama_guru'] == 'Katolik') {
                                                        echo 'selected';
                                                    } ?>>Katolik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="tempatlhr" id="tempatlhr" placeholder="Tempat Lahir" value="<?= $teacherdata['tmptlahir'] ?>"><?= form_error('tempatlhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" name="tanggallhr" id="tanggallhr" placeholder="Tanggal Lahir" value="<?= date('Y-m-d', $teacherdata['tgllahir']) ?>"><?= form_error('tanggallhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat" value="<?= $teacherdata['alamat_guru'] ?>"><?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control form-control-user" name="telp" id="telp" placeholder="No. Telepon" value="<?= $teacherdata['telp_guru'] ?>"><?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <img src="<?= base_url('assets/img/guru/' . $teacherdata['image_guru']) ?>" width="300" height="300" id="image-prev" class="img-thumbnails" alt="">
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