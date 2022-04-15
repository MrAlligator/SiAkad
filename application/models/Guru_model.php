<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    private $_table = "tb_guru";

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function getGuru()
    {
        return $this->db->where('status', 2)->get($this->_table)->result_array();
    }

    public function getKaryawan()
    {
        return $this->db->where('status', 3)->get($this->_table)->result_array();
    }

    public function getByNIS($where)
    {
        return $this->db->where($where)->get($this->_table)->row_array();
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

    public function countG()
    {
        $query = $this->db->where('status', 2)->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countK()
    {
        $query = $this->db->where('status', 3)->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_latest_id_user()
    {
        $this->db->select('id_guru');
        $this->db->order_by('id_guru', 'desc');
        $this->db->limit(1);
        return $this->db->get($this->_table)->row_array();
    }

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, $id)->row_array();
    }

    public function updateData($id, $data)
    {
        return $this->db->where($id)->update($this->_table, $data);
    }

    public function deleteData($id)
    {
        $row = $this->db->where($id, 'id_guru')->get($this->_table)->row_array();
        if ($row['image_guru'] != 'default.png') {
            unlink('./assets/img/guru/' . $row['image_guru']);
        }
        return $this->db->where($id)->delete($this->_table);
    }
}
