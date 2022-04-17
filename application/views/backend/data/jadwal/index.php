<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $pageTitle ?></h1>

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
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
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $jadwal) {
                            $id_kelas = $jadwal['id_kelas'];
                            $kelas = $this->db->where(['id_kelas' => $id_kelas])->get('tb_kelas')->row_array();
                            $id_jurusan = $jadwal['id_jurusan'];
                            $jurusan = $this->db->where(['id_jurusan' => $id_jurusan])->get('tb_jurusan')->row_array();
                            $kode_mapel = $jadwal['kode_mapel'];
                            $mapel = $this->db->where(['kode_mapel' => $kode_mapel])->get('tb_mapel')->row_array();
                        ?>
                            <tr>
                                <th><?= $mapel['nama_mapel'] ?></th>
                                <th><?= $kelas['kelas'] ?></th>
                                <th><?= $jurusan['jurusan'] ?></th>
                                <th><?= $jadwal['hari'] ?></th>
                                <th><?= $jadwal['jam'] ?></th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->