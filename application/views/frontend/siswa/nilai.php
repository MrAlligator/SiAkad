<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" rowspan="2">Mata Pelajaran</th>
                        <th class="text-center" colspan="4">Nilai Ulangan Harian</th>
                        <th class="text-center" rowspan="2">UTS</th>
                        <th class="text-center" rowspan="2">UAS</th>
                        <th class="text-center" rowspan="2">Sikap</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $data) {
                        $mapel = $this->db->where(['kode_mapel' => $data['kode_mapel']])->get('tb_mapel')->row_array(); ?>
                        <tr>
                            <th class="text-center"><?= $mapel['nama_mapel'] ?></th>
                            <th class="text-center"><?= $data['nilai_uh_1'] ?></th>
                            <th class="text-center"><?= $data['nilai_uh_2'] ?></th>
                            <th class="text-center"><?= $data['nilai_uh_3'] ?></th>
                            <th class="text-center"><?= $data['nilai_uh_4'] ?></th>
                            <th class="text-center"><?= $data['nilai_uts'] ?></th>
                            <th class="text-center"><?= $data['nilai_uas'] ?></th>
                            <th class="text-center"><?= $data['nilai_sikap'] ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>