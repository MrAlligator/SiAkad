<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $_table = "tb_siswa";

    public function getAll()
    {
        $this->db->select(
            'a.id_siswa, a.nis, a.nama_siswa, a.foto_siswa, a.id_kelas, a.id_jurusan, a.jk_siswa, a.agama_siswa,
            a.tmptlhr_siswa, a.tgllhr_siswa, a.alamat_siswa, a.telp_siswa, b.id_kelas, b.kelas, c.id_jurusan, c.jurusan'
        );
        $this->db->from('tb_siswa a');
        $this->db->join('tb_kelas b', 'a.id_kelas = b.id_kelas');
        $this->db->join('tb_jurusan c', 'a.id_jurusan = c.id_jurusan');
        $this->db->group_by('a.id_siswa');
        $this->db->order_by('a.id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getByNIS($where)
    {
        return $this->db->where($where)->get($this->_table)->row_array();
    }

    public function get_latest_id_user()
    {
        $this->db->select('id_siswa');
        $this->db->order_by('id_siswa', 'desc');
        $this->db->limit(1);
        return $this->db->get($this->_table)->row_array();
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
        $row = $this->db->where($id, 'id_siswa')->get($this->_table)->row_array();
        if ($row['foto_siswa'] != 'default.png') {
            unlink('./assets/img/siswa/' . $row['foto_siswa']);
        }
        return $this->db->where($id)->delete($this->_table);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, $id)->row_array();
    }

    public function updateData($id, $data)
    {
        return $this->db->where($id)->update($this->_table, $data);
    }
}
