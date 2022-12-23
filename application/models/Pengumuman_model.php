<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{
    public function getPengumuman($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
        }
        return $this->db->order_by('id', 'Desc')->get('pengumuman', $limit, $start)->result_array();
    }
}
