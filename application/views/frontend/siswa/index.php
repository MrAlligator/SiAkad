<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <label>Pilih Kelas</label>
            <div class="row">
                <div class="col-lg-2">
                    <select class="form-control" name="kelas">
                        <option value="">Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-success" type="submit">Filter</button>
                </div>
            </div>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tempat, Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </div>
        <?php $i = 1;
        foreach ($dataSiswa as $dataSiswa) : ?>
            <div class="table-row">
                <tr>
                    <td><?= $i++ ?></td>
                    <td><a href="<?= base_url('detail-siswa/' . $dataSiswa['nis']) ?>"><?= $dataSiswa['nama_siswa'] ?></a></td>
                    <td><?= $dataSiswa['nis'] ?></td>
                    <td><?= $dataSiswa['jk_siswa'] ?></td>
                    <td><?= $dataSiswa['agama_siswa'] ?></td>
                    <td><?= $dataSiswa['kelas'] ?></td>
                    <td><?= $dataSiswa['tmptlhr_siswa'] . ", " . $dataSiswa['tgllhr_siswa'] ?></td>
                    <td><?= $dataSiswa['alamat_siswa'] ?></td>
                </tr>
            </div>
        <?php endforeach ?>
        </table>
    </div>
</div>
</div>
</div>
</div>