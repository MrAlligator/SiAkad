<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table = "tb_user";

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function countUsers()
    {
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_latest_id_user()
    {
        $this->db->select('user_id');
        $this->db->order_by('user_id', 'desc');
        $this->db->limit(1);
        return $this->db->get($this->_table)->row_array();
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
