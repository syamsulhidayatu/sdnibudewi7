<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function getBerita($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_berita', $keyword);
        }
        return $this->db->order_by('id', 'Desc')->get('berita', $limit, $start)->result_array();
    }
}
