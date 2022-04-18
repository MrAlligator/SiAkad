<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <table class="table">
                <thead class="thead-dark">
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
                        <?php } ?>\
                </tbody>
        </div>
        </table>
    </div>
</div>
</div>
</div>
</div>