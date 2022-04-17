<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    private $_table = "tmp_pendaftaran";

    public function getAll()
    {
        $this->db->select(
            'a.id_pendaftaran, a.no_pendaftaran, a.asal_smp, a.nama_pendaftar, a.tmptlhr_pendaftar,
            a.tgllhr_pendaftar, a.jk_pendaftar, a.agama_pendaftar, a.alamat_pendaftar, a.telp_pendaftar,
            a.pilihan_jurusan, a.image_pendaftar, a.verified_berkas_pendaftar, a.lolos, b.id_jurusan, b.jurusan'
        );
        $this->db->from('tmp_pendaftaran a');
        $this->db->join('tb_jurusan b', 'a.pilihan_jurusan = b.id_jurusan');
        $this->db->group_by('a.id_pendaftaran');
        $this->db->order_by('a.id_pendaftaran', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getUnverified()
    {
        $this->db->select(
            'a.id_pendaftaran, a.no_pendaftaran, a.asal_smp, a.nama_pendaftar, a.tmptlhr_pendaftar,
            a.tgllhr_pendaftar, a.jk_pendaftar, a.agama_pendaftar, a.alamat_pendaftar, a.telp_pendaftar,
            a.pilihan_jurusan, a.image_pendaftar, a.verified_berkas_pendaftar, a.lolos, b.id_jurusan, b.jurusan'
        );
        $this->db->from('tmp_pendaftaran a');
        $this->db->join('tb_jurusan b', 'a.pilihan_jurusan = b.id_jurusan');
        $this->db->group_by('a.id_pendaftaran');
        $this->db->order_by('a.id_pendaftaran', 'DESC');
        return $this->db->where('a.verified_berkas_pendaftar', 0)->where('a.lolos', 0)->get($this->_table)->result_array();
    }

    public function getVerified()
    {
        $this->db->select(
            'a.id_pendaftaran, a.no_pendaftaran, a.asal_smp, a.nama_pendaftar, a.tmptlhr_pendaftar,
            a.tgllhr_pendaftar, a.jk_pendaftar, a.agama_pendaftar, a.alamat_pendaftar, a.telp_pendaftar,
            a.pilihan_jurusan, a.image_pendaftar, a.verified_berkas_pendaftar, a.lolos, b.id_jurusan, b.jurusan'
        );
        $this->db->from('tmp_pendaftaran a');
        $this->db->join('tb_jurusan b', 'a.pilihan_jurusan = b.id_jurusan');
        $this->db->group_by('a.id_pendaftaran');
        $this->db->order_by('a.id_pendaftaran', 'DESC');
        return $this->db->where('a.verified_berkas_pendaftar', 1)->where('a.lolos', 0)->get($this->_table)->result_array();
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

    public function countUV()
    {
        $query = $this->db->where('verified_berkas_pendaftar', 0)->where('lolos', 0)->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countV()
    {
        $query = $this->db->where('verified_berkas_pendaftar', 1)->where('lolos', 0)->get($this->_table);
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
        $row = $this->db->where($id, 'id_siswa')->get($this->_table)->row_array();
        if ($row['image_siswa'] != 'default.png') {
            unlink('./assets/img/siswa/' . $row['image_siswa']);
        }
        return $this->db->where($id)->delete($this->_table);
    }
}
