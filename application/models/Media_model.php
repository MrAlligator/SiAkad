<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media_model extends CI_Model
{
    private $_table = "tb_media";

    public function getAll()
    {
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
        $row = $this->db->where($id, 'id_media')->get($this->_table)->row_array();
        if ($row['file_name'] != 'default.png') {
            unlink('./assets/media/' . $row['file_name']);
        }
        return $this->db->where($id)->delete($this->_table);
    }
}
