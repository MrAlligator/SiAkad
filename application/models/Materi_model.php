<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi_model extends CI_Model
{
    private $_table = "tb_materi";

    public function getAll($where)
    {
        return $this->db->where($where)->get($this->_table)->result_array();
    }
    public function getAllAdmin()
    {
        $this->db->select(
            'a.id_materi, a.judul_materi, a.kode_mapel, a.file_name, a.id_kelas,
            a.uploaded_by, a.uploaded_at, b.id_mapel, b.kode_mapel, b.nama_mapel,
            c.id_kelas, c.kelas'
        );
        $this->db->from('tb_materi a');
        $this->db->join('tb_mapel b', 'a.kode_mapel = b.kode_mapel');
        $this->db->join('tb_kelas c', 'a.id_kelas = c.id_kelas');
        $this->db->group_by('a.id_materi');
        $this->db->order_by('a.id_materi', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }
    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
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
}
