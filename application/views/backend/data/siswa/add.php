<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('administrator/add-pakar') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nis" id="nis" placeholder="Nomor Induk Siswa"><?= form_error('nis', '<small class="text-danger pl-3">', '</small>') ?>
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
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option value="" selected disabled>Pilih Kelas</option>
                            <option value="X" selected disabled>X</option>
                            <option value="XI" selected disabled>XI</option>
                            <option value="XII" selected disabled>XII</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option value="" selected disabled>Pilih Agama</option>
                            <option value="Islam" selected disabled>Islam</option>
                            <option value="Kristen" selected disabled>Kristen</option>
                            <option value="Hindu" selected disabled>Hindu</option>
                            <option value="Budha" selected disabled>Budha</option>
                            <option value="Katolik" selected disabled>Katolik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email"><?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi"><?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" name="c_password" id="c_password" placeholder="Konfirmasi Kata Sandi"><?= form_error('c_password', '<small class="text-danger pl-3">', '</small>') ?>
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
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->