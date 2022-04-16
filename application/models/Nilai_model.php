<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    private $_table = "tb_nilai";

    // siswa, guru, jurusan, kelas, mapel
    public function getAll($where)
    {
        $this->db->select(
            'a.id_nilai, a.nis, a.id_kelas, a.id_jurusan, a.kode_mapel, a.nip, a.nilai_uh_1, a.nilai_uh_2,
            a.nilai_uh_3, a.nilai_uh_4, a.nilai_uts, a.nilai_uas, a.nilai_sikap, b.id_siswa, b.nis,
            b.nama_siswa, c.id_guru, c.nip, c.nama_guru, d.id_kelas, d.kelas, e.id_jurusan, e.jurusan,
            f.id_mapel, f.kode_mapel,f.nama_mapel'
        );
        $this->db->from('tb_nilai a');
        $this->db->join('tb_siswa b', 'a.nis = b.nis');
        $this->db->join('tb_guru c', 'a.nip = c.nip');
        $this->db->join('tb_kelas d', 'a.id_kelas = d.id_kelas');
        $this->db->join('tb_jurusan e', 'a.id_jurusan = e.id_jurusan');
        $this->db->join('tb_mapel f', 'a.kode_mapel = f.kode_mapel');
        $this->db->group_by('a.id_nilai');
        $this->db->order_by('a.id_nilai', 'DESC');
        return $this->db->where($where)->get($this->_table)->result_array();
    }
}
