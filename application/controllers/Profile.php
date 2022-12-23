<?php

class Profile extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Halaman Utama';
        $data['pengumuman'] = $this->db->order_by('id', "desc")->limit(3)->get('pengumuman')->result_array();
        $data['berita'] = $this->db->order_by('id', "desc")->limit(3)->get('berita')->result_array();
        $data['pihak'] = $this->db->get('pihak')->result_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/beranda/index', $data);
        $this->load->view('profile/templates/footer', $data);
    }

    public function courses()
    {
        $data['judul'] = 'Halaman Pelajaran';
        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/courses/index');
        $this->load->view('profile/templates/footer');
    }

    public function teacher()
    {
        $data['judul'] = 'Halaman Guru';
        $data['guru'] = $this->db->get('guru')->result_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/teacher/index', $data);
        $this->load->view('profile/templates/footer');
    }

    public function About()
    {
        $data['judul'] = 'Halaman Tentang';
        $data['pihak'] = $this->db->get('pihak')->result_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/about/index', $data);
        $this->load->view('profile/templates/footer');
    }

    public function pricing()
    {
        $data['judul'] = 'Halaman Biaya';
        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/pricing/index');
        $this->load->view('profile/templates/footer');
    }

    public function contact()
    {
        $data['judul'] = 'Halaman Kontak';
        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/contact/index');
        $this->load->view('profile/templates/footer');
    }

    public function announcement()
    {
        $data['judul'] = 'Halaman Pengumuman';
        $data['pengumuman'] = $this->db->order_by('id', 'desc')->get('pengumuman')->result_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/announcement/index', $data);
        $this->load->view('profile/templates/footer');
    }

    public function news()
    {
        $data['judul'] = 'Halaman Berita';
        $data['berita'] = $this->db->order_by('id', 'desc')->get('berita')->result_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/news/index', $data);
        $this->load->view('profile/templates/footer');
    }

    public function pengumuman($id)
    {
        $data['judul'] = 'Halaman Kegiatan';
        $data['pengumuman'] = $this->db->get_where('pengumuman', ['id' => $id])->row_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/pengumuman', $data);
        $this->load->view('profile/templates/footer');
    }

    public function berita($id)
    {
        $data['judul'] = 'Halaman Kegiatan';
        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();

        $this->load->view('profile/templates/header', $data);
        $this->load->view('profile/berita', $data);
        $this->load->view('profile/templates/footer');
    }
}
