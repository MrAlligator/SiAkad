<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $_table = "tb_jadwal";

    public function getAll()
    {
        $this->db->select(
            'a.id_jadwal, a.kode_mapel, a.id_kelas, a.id_jurusan, a.nip,
            a.jam, a.hari, b.id_mapel, b.kode_mapel, b.nama_mapel, c.id_kelas,
            c.kelas, d.id_jurusan, d.jurusan, e.id_guru, e.nip, e.nama_guru'
        );
        $this->db->from('tb_jadwal a');
        $this->db->join('tb_mapel b', 'a.kode_mapel = b.kode_mapel');
        $this->db->join('tb_kelas c', 'a.id_kelas = c.id_kelas');
        $this->db->join('tb_jurusan d', 'a.id_jurusan = d.id_jurusan');
        $this->db->join('tb_guru e', 'a.nip = e.nip');
        $this->db->group_by('a.id_jadwal');
        $this->db->order_by('a.id_jadwal', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function count()
    {
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function deleteData($id)
    {
        return $this->db->where($id)->delete($this->_table);
    }
}
