<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pendaftaran';
        $data['pendaftar'] = $this->db->get_where('pendaftar', ['email_pendaftar'])->row_array();

        if ($data['user']['email'] == $data['pendaftar']['email_pendaftar']) {
            redirect('Pendaftaran/tatacara');
        } else {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
         
            $this->load->view('pendaftaran/index', $data);
            $this->load->view('auth/templates/footer', $data);
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Profile';

        $this->form_validation->set_rules(
            'name',
            'Full name',
            'required|trim',
            [
                'required' => 'Nama harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/admin/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    // menghapus foto yang telah diganti
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './assets/admin/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil di update!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required' => 'Password Lama harus di isi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]', [
            'required' => 'Password baru harus di isi!',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password tidak sama dengan password kedua'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[5]|matches[new_password1]', [
            'required' => 'Password baru harus di isi!',
            'matches' => 'Password tidak sama dengan password pertama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $current_passsword = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_passsword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_passsword == $new_password) {
                    // Password Sama (yang salah)
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password sama dengan yang dulu!</div>');
                    redirect('user/changepassword');
                } else {
                    // password udah bener
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Diubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
