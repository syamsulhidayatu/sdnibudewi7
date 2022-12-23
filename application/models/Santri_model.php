<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Santri_model extends CI_Model
{
    public function getSantri($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('kelas', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('angkatan', $keyword);
        }
        return $this->db->get('data_santri', $limit, $start)->result_array();
    }

    public function fotosantri($foto)
    {
        // upload foto santri 

        $config1['upload_path'] = './assets/admin/img/data_foto_santri/';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['max_size']     = '2048';

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload($foto)) {
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function kk($kk)
    {
        $config1['upload_path'] = './assets/admin/img/data_foto_santri/';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['max_size']     = '2048';

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload($kk)) {
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function ktp($ktp)
    {
        $config1['upload_path'] = './assets/admin/img/data_foto_santri/';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['max_size']     = '2048';

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload($ktp)) {
        } else {
            echo $this->upload->display_errors();
        }
    }
}
