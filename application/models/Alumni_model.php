<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alumni_model extends CI_Model
{

    public function getAlumni($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('kelamin', $keyword);
            $this->db->or_like('angkatan', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('no_hp', $keyword);
            $this->db->or_like('pekerjaan', $keyword);
        }
        return $this->db->get('alumni', $limit, $start)->result_array();
    }
}
