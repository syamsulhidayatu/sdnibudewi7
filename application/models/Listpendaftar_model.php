<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Listpendaftar_model extends CI_Model
{

    public function getPendaftar($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('email_pendaftar', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('tempat_lahir', $keyword);
            $this->db->or_like('nama_wali', $keyword);
        }
        return $this->db->get('pendaftar', $limit, $start)->result_array();
    }
}
