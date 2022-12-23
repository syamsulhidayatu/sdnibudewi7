<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function getGuru($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('pelajaran', $keyword);
        }
        return $this->db->order_by('id', 'Desc')->get('guru', $limit, $start)->result_array();
    }
}
