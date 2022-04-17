<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="<?= base_url('tambah-siswa') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nis" id="nis" placeholder="Nomor Induk Siswa" readonly value="<?php if (strlen($count) == 1) {
                                                                                                                                                            echo 'N' . date('Y') . '00' . ++$count;
                                                                                                                                                        } elseif (strlen($count) == 2) {
                                                                                                                                                            echo 'N' . date('Y') . '0' . ++$count;
                                                                                                                                                        } elseif (strlen($count) == 3) {
                                                                                                                                                            echo 'N' . date('Y') . ++$count;
                                                                                                                                                        }
                                                                                                                                                        ?>"><?= form_error('nis', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="fname" id="fname" placeholder="Nama Depan"><?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="lname" id="lname" placeholder="Nama Belakang"><?= form_error('lname', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <select class="form-control" name="jk" id="jk" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col mb-3 mb-sm-0">
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
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="tempatlhr" id="tempatlhr" placeholder="Tempat Lahir"><?= form_error('tempatlhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" name="tanggallhr" id="tanggallhr" placeholder="Tanggal Lahir"><?= form_error('tanggallhr', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat"><?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control form-control-user" name="telp" id="telp" placeholder="No. Telepon"><?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <img src="<?= base_url('assets/images/default-image/default.png') ?>" width="300" id="image-prev" class="img-thumbnails" alt="">
                        <p></p>
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