<!-- Begin Page Content -->
<div class="container-fluid">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
        </div>
        <form action="<?= base_url('tambah-berita') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control form-control-user" name="judul" id="judul" placeholder="Masukkan Judul"><?= form_error('judul', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <img src="<?= base_url('assets/images/default-image/default.png') ?>" width="500" id="image-prev" class="img-thumbnails" alt="">
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
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <label for="excerpt">Ringkasan Artikel <i class="fas fa-fw fa-info-circle"></i></label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                        <label for="body">Artikel <i class="fas fa-fw fa-info-circle"></i></label>
                        <textarea name="body" id="body" cols="30" rows="10"></textarea>
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