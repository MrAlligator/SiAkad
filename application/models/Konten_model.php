<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten_model extends CI_Model
{
    private $_table = "tb_konten";

    public function getBerita()
    {
        return $this->db->where('jenis_konten', 1)->get($this->_table)->result_array();
    }

    public function getPengumuman()
    {
        return $this->db->where('jenis_konten', 2)->get($this->_table)->result_array();
    }

    public function countB()
    {
        $query = $this->db->where('jenis_konten', 1)->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countP()
    {
        $query = $this->db->where('jenis_konten', 2)->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function viewBySlug($slug)
    {
        return $this->db->get_where($this->_table, $slug)->row_array();
    }

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getBySlug($slug)
    {
        return $this->db->get_where($this->_table, $slug)->row_array();
    }

    public function updateData($slug, $data)
    {
        return $this->db->where($slug)->update($this->_table, $data);
    }

    public function deleteData($id)
    {
        $row = $this->db->where($id, 'id_konten')->get($this->_table)->row_array();
        unlink('./assets/img/berita/' . $row['image_konten']);
        return $this->db->where($id)->delete($this->_table);
    }
}
