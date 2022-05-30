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
                    <div class="dropdown-header">Dropdown Header:</div>
                    <?php if ($user['status_user'] == 1) : ?>
                        <a class="dropdown-item" href="<?= base_url('tambah-siswa') ?>">Tambah Baru (BranchFlow1)</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?= base_url('truncate-artikel') ?>">Kosongkan Tabel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0) : ?>
                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $student['nis'] ?></td>
                                    <td><?= $student['nama_siswa'] ?></td>
                                    <td><?= $student['kelas'] ?></td>
                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#detailModal-<?= $student['id_siswa'] ?>" class="badge badge-primary"><i class="fas fa-fw fa-info-circle"></i></a>
                                        <?php if ($user['status_user'] == 1) : ?>
                                            <a href="<?= base_url('ubah-siswa/' . $student['id_siswa']) ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal-<?= $student['id_siswa'] ?>" class=" badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                                        <?php endif; ?>
                                    </td>
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
<?php foreach ($students as $student) : ?>
    <div class="modal fade" id="deleteModal-<?= $student['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('hapus-siswa/' . $student['id_siswa']) ?>">Yakin</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Detail Modal-->
<?php foreach ($students as $student) : ?>
    <div class="modal fade" id="detailModal-<?= $student['id_siswa'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/siswa/' . $student['foto_siswa']) ?>" height="200" width="200" alt="">
                        </div>
                        <div class="col-md-8">
                            <table>
                                <tr>
                                    <td>Nomor Induk Siswa</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['nis'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['nama_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['tmptlhr_siswa'] . ', ' . date('d, M Y', $student['tgllhr_siswa']) ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['jk_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['agama_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['kelas'] . ' ' . $student['jurusan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['alamat_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>&nbsp;</td>
                                    <td>:</td>
                                    <td><?= $student['telp_siswa'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>