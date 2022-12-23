<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // supaya harus login terlebih dahuulu sebelum login
        is_logged_in();
    }

    // menu

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules(
            'menu',
            'Menu',
            'required',
            [
                'required' => 'Kolom Harus Diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function deletemenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('menu');
    }

    public function editmenu($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Menu';
        $data['id_menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Menu harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('menu/edit-menu', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $data = [
                'menu' => $this->input->post('menu', true),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data berhasil diubah!</div>');
            redirect('menu');
        }
    }

    // end menu

    // submenu

    public function submenu()
    {
        $data['judul'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules(
            'title',
            'Title',
            'required',
            [
                'required' => 'Kolom Title Harus Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'menu_id',
            'Menu_id',
            'required',
            [
                'required' => 'Kolom Menu_id Harus Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'url',
            'URL',
            'required',
            [
                'required' => 'Kolom URL Harus Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'icon',
            'Icon',
            'required',
            [
                'required' => 'Kolom Icon Harus Diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete_submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data berhasil dihapus!</div>');
        redirect('menu/submenu');
    }

    public function edit_submenu($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Submenu';
        $data['id_submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules(
            'title',
            'Title',
            'required',
            [
                'required' => 'Kolom Title Harus Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'menu_id',
            'Menu',
            'required',
            [
                'required' => 'Kolom Menu Harus Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'url',
            'URL',
            'required',
            [
                'required' => 'Kolom URL Harus Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'icon',
            'Icon',
            'required',
            [
                'required' => 'Kolom Icon Harus Diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('menu/edit-submenu', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id', true),
                'title' => $this->input->post('title', true),
                'url' => $this->input->post('url', true),
                'icon' => $this->input->post('icon', true),
                'is_active' => $this->input->post('is_active', true),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data berhasil diubah!</div>');
            redirect('menu/submenu');
        }


        // end submenu
    }
}
