<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar_model extends CI_Model
{
    private $_table = "tb_pengajar";

    public function cari($where)
    {
        return $this->db->where($where)->get($this->_table)->row_array();
    }
}
