<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $pageTitle ?></h1>

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <table>
                    <tr>
                        <th>Kelas</th>
                        <th>: X</th>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>: Multimedia</th>
                    </tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>: Matematika</th>
                    </tr>
                    <tr>
                        <th>Pengajar</th>
                        <th>: Mila Marda Fatmawati</th>
                    </tr>
                </table>
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <?php if ($user['status_user'] == 1) : ?>
                        <a class="dropdown-item" href="<?= base_url('tambah-karyawan') ?>">Tambah Baru</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?= base_url('truncate-artikel') ?>">Kosongkan Tabel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2">NIS</th>
                            <th rowspan="2">Nama</th>
                            <th colspan="4">Nilai Ulangan Harian</th>
                            <th rowspan="2">UTS</th>
                            <th rowspan="2">UAS</th>
                            <th rowspan="2">Nilai Sikap</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->