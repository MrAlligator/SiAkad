<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $pageTitle ?></h1>

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $pageTitle ?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Pilihan :</div>
                    <?php if ($user['status_user'] == 2) : ?>
                        <a class="dropdown-item" href="<?= base_url('tambah-materi') ?>">Tambah Baru</a>
                    <?php else : ?>
                        <a class="dropdown-item" href="<?= base_url('truncate-artikel') ?>">Kosongkan Tabel</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Diupload Oleh</th>
                            <th>Diupload Pada</th>
                            <?php if ($user['status_user'] == 2 || $user['status_user'] == 1) : ?>
                                <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0) : ?>
                            <?php foreach ($theories as $theory) :
                                $id_kelas = $theory['id_kelas'];
                                $kelas = $this->db->where(['id_kelas' => $id_kelas])->get('tb_kelas')->row_array();
                                $id_jurusan = $theory['id_jurusan'];
                                $jurusan = $this->db->where(['id_jurusan' => $id_jurusan])->get('tb_jurusan')->row_array();
                                $kode_mapel = $theory['kode_mapel'];
                                $mapel = $this->db->where(['kode_mapel' => $kode_mapel])->get('tb_mapel')->row_array();
                                $nip = $theory['uploaded_by'];
                                $guru = $this->db->where(['nip' => $nip])->get('tb_guru')->row_array();
                            ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $theory['judul_materi'] ?></td>
                                    <td><?= $mapel['nama_mapel'] ?></td>
                                    <td><?= $kelas['kelas'] ?></td>
                                    <td><?= $jurusan['jurusan'] ?></td>
                                    <td><?= $guru['nama_guru'] ?></td>
                                    <td><?= date('d M Y', $theory['uploaded_at']) ?></td>
                                    <?php if ($user['status_user'] == 2 || $user['status_user'] == 1) : ?>
                                        <td class="text-center">
                                            <a href="#" data-toggle="modal" data-target="#deleteModal-<?= $theory['id_materi'] ?>" class=" badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <h4 class="text-danger text-center">Belum ada Data yang di Input</h4>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Delete Modal-->
<?php foreach ($theories as $theory) : ?>
    <div class="modal fade" id="deleteModal-<?= $theory['id_materi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang Dihapus tidak bisa dikembalikan</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('hapus-materi/' . $theory['id_materi']) ?>">Yakin</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>