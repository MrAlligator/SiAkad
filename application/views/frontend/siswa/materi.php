<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <table class="table" id="myTable">
                <thead class="thead-dark">
                    <tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Judul</th>
                        <th>Diupload Oleh</th>
                        <th>Pilihan</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($theories as $theory) :
                        $kode_mapel = $theory['kode_mapel'];
                        $mapel = $this->db->where(['kode_mapel' => $kode_mapel])->get('tb_mapel')->row_array();
                        $nip = $theory['uploaded_by'];
                        $guru = $this->db->where(['nip' => $nip])->get('tb_guru')->row_array();
                    ?>
                        <tr>
                            <td><?= $mapel['nama_mapel'] ?></td>
                            <td><?= $theory['judul_materi'] ?></td>
                            <td><?= $guru['nama_guru'] ?></td>
                            <td><a href="#">Download</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
        </table>
    </div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>