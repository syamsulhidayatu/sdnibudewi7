<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // supaya harus login terlebih dahuulu sebelum login
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('Santri_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Dashboard';

        // load library 
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/WebsiteITQ/admin/index';
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('kelas', $data['keyword']);
        $this->db->or_like('jenis_kelamin', $data['keyword']);
        $this->db->or_like('angkatan', $data['keyword']);
        $this->db->from('data_santri');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['santri'] = $this->Santri_model->getSantri($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('auth/templates/footer', $data);
    }
    // semua function data santri 
    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Data Santri';
        $data['santri'] = $this->db->get('data_santri')->result_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|trim',
            [
                'required' => 'Tempat lahir harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'alamat_lengkap',
            'Alamat Lengkap',
            'required|trim',
            [
                'required' => 'Alamat lengkap harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'nama_wali',
            'Nama Wali',
            'required|trim',
            [
                'required' => 'Nama wali harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'angkatan',
            'Angkatan',
            'required|trim',
            [
                'required' => 'Angkatan harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/tambah', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $config1['upload_path'] = './assets/admin/img/data_foto_santri/';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            $config1['max_size']     = '2048';

            $this->load->library('upload', $config1);

            if ($this->upload->do_upload('foto_santri')) {
                $new_image = $this->upload->data();
                $this->db->set('foto_santri', $new_image['file_name']);
            } else {
                echo $this->upload->display_errors();
            }

            if ($this->upload->do_upload('foto_kk_santri')) {
                $new_image = $this->upload->data();
                $this->db->set('foto_kk_santri', $new_image['file_name']);
            } else {
                echo $this->upload->display_errors();
            }

            if ($this->upload->do_upload('foto_ktp_wali')) {
                $new_image = $this->upload->data();
                $this->db->set('foto_ktp_wali', $new_image['file_name']);
            } else {
                echo $this->upload->display_errors();
            }

            $data = [
                'email_pendaftar' => $data['user']['email'],
                'nama' => $this->input->post('nama', true),
                'nama_panggilan' => $this->input->post('nama_panggilan', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'kelas' => $this->input->post('kelas', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'alamat_lengkap' => $this->input->post('alamat_lengkap', true),
                'asal_pesantren_sekolah' => $this->input->post('asal_pesantren_sekolah', true),
                'no_hp_santri' => $this->input->post('no_hp_santri', true),
                'nama_wali' => $this->input->post('nama_wali', true),
                'no_hp_wali' => $this->input->post('no_hp_wali', true),
                'angkatan' => $this->input->post('angkatan', true)
            ];

            $this->db->insert('data_santri', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        $data['data_santri'] = $this->db->get_where('data_santri', ['id' => $id])->row_array();
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['data_santri']['foto_santri']);
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['data_santri']['foto_kk_santri']);
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['data_santri']['foto_ktp_wali']);
        $this->db->where('id', $id);
        $this->db->delete('data_santri');
        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil dihapus!</div>');
        redirect('admin');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Detail santri';
        $data['detail_santri'] = $this->db->get_where('data_santri', ['id' => $id])->row_array();
        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function ubah($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Ubah Data Santri';
        $data['detail_santri'] = $this->db->get_where('data_santri', ['id' => $id])->row_array();
        $data['kelamin'] = ['putra', 'putri'];
        $data['kelas'] = ['1 Ibtida', '2 Ibitda', '3 Ibtida', '1 Tsanawi', '2 Tsanawi', '3 Tsanawi'];

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|trim',
            [
                'required' => 'Tempat lahir harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat Lengkap',
            'required|trim',
            [
                'required' => 'Alamat lengkap harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'nama_wali',
            'Nama Wali',
            'required|trim',
            [
                'required' => 'Nama wali harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'angkatan',
            'Angkatan',
            'required|trim',
            [
                'required' => 'Angkatan harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $upload_image1 = $_FILES['foto_santri']['name'];
            $upload_image2 = $_FILES['foto_kk_santri']['name'];
            $upload_image3 = $_FILES['foto_ktp_wali']['name'];
            $old_image1 = $this->input->post('ft_santri', true);
            $old_image2 = $this->input->post('ft_kk_santri', true);
            $old_image3 = $this->input->post('ft_ktp_wali', true);

            if ($upload_image1) {
                $config['upload_path'] = './assets/admin/img/data_foto_santri/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_santri')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $old_image1);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_santri', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_image2) {
                $config['upload_path'] = './assets/admin/img/data_foto_santri/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_kk_santri')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $old_image2);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_kk_santri', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_image3) {
                $config['upload_path'] = './assets/admin/img/data_foto_santri/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_ktp_wali')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $old_image3);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_ktp_wali', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'email_pendaftar' => $data['user']['email'],
                'nama' => $this->input->post('nama', true),
                'nama_panggilan' => $this->input->post('nama_panggilan', true),
                'jenis_kelamin' => $this->input->post('kelamin', true),
                'kelas' => $this->input->post('kelas', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'alamat_lengkap' => $this->input->post('alamat', true),
                'asal_pesantren_sekolah' => $this->input->post('asal_pesantren_sekolah', true),
                'no_hp_santri' => $this->input->post('no_hp_santri', true),
                'nama_wali' => $this->input->post('nama_wali', true),
                'no_hp_wali' => $this->input->post('no_hp_wali', true),
                'angkatan' => $this->input->post('angkatan', true)
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('data_santri', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil diubah!</div>');
            redirect('admin');
        }
    }

    // end dari function data santri 

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Data harus di isi terlebih dahulu'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $data = [
                'role' => $this->input->post('role')
            ];

            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Role berhasil ditambahkan!</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Role Access';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Telah Diubah!</div>');
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data berhasil dihapus!</div>');
        redirect('admin/role');
    }

    public function editrole($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Role';
        $data['id_role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $data = [
                'role' => $this->input->post('role', true),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data berhasil diubah!</div>');
            redirect('admin/role');
        }
    }

    // semua function dari data alumni

    public function alumni()
    {
        $this->load->model('Alumni_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Alumni';

        // load library 
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/WebsiteITQ/admin/alumni';
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('kelamin', $data['keyword']);
        $this->db->or_like('angkatan', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('no_hp', $data['keyword']);
        $this->db->or_like('pekerjaan', $data['keyword']);
        $this->db->from('alumni');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['alumni'] = $this->Alumni_model->getAlumni($config['per_page'], $data['start'], $data['keyword']);

        // end Pagination

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/alumni', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function hapus_alumni($id)
    {
        $data['alumni'] = $this->db->get_where('alumni', ['id' => $id])->row_array();
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['alumni']['foto_alumni']);
        $this->db->where('id', $id);
        $this->db->delete('Alumni');
        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil dihapus!</div>');
        redirect('admin/alumni');
    }

    public function tambah_alumni()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Data Alumni';
        $data['alumni'] = $this->db->get('Alumni')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus di isi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus di isi!'
        ]);
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required', [
            'required' => 'Angkatan harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/tambah_alumni', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $config1['upload_path'] = './assets/admin/img/data_foto_alumni/';
            $config1['allowed_types'] = 'gif|jpg|png';
            $config1['max_size']     = '2048';

            $this->load->library('upload', $config1);

            if ($this->upload->do_upload('foto_alumni')) {

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'kelamin' => $this->input->post('kelamin', true),
                    'angkatan' => $this->input->post('angkatan', true),
                    'alamat' => $this->input->post('alamat', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'pekerjaan' => $this->input->post('pekerjaan', true),
                    'foto_alumni' => $this->upload->data('file_name'),
                ];

                $this->db->insert('alumni', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
                redirect('admin/alumni');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function ubah_alumni($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Ubah Data Alumni';
        $data['detail_alumni'] = $this->db->get_where('alumni', ['id' => $id])->row_array();
        $data['kelamin'] = ['putra', 'putri'];

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus di isi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus di isi!'
        ]);
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required', [
            'required' => 'Angkatan harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/ubah_alumni', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $upload_image = $_FILES['foto_alumni']['name'];
            $old_image = $this->input->post('ft_alumni', true);

            if ($upload_image) {
                $config['upload_path'] = './assets/admin/img/data_foto_santri/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_alumni')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_alumni', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $this->input->post('nama', true),
                'kelamin' => $this->input->post('kelamin', true),
                'angkatan' => $this->input->post('angkatan', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'pekerjaan' => $this->input->post('pekerjaan', true)
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('alumni', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil diubah!</div>');
            redirect('admin/alumni');
        }
    }

    public function jadikan_alumni($id)
    {
        $data['jadikan_alumni'] = $this->db->get_where('data_santri', ['id' => $id])->row_array();

        $data = [
            'nama' => $data['jadikan_alumni']['nama'],
            'kelamin' => $data['jadikan_alumni']['jenis_kelamin'],
            'angkatan' => $data['jadikan_alumni']['angkatan'],
            'alamat' => $data['jadikan_alumni']['alamat_lengkap'],
            'no_hp' => $data['jadikan_alumni']['no_hp_santri'],
            'pekerjaan' => '',
            'foto_alumni' => $data['jadikan_alumni']['foto_santri']
        ];

        if ($this->db->insert('Alumni', $data)) {
            $this->db->where('id', $id);
            $this->db->delete('data_santri');
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
            redirect('admin/alumni');
        }
    }

    // semua function dari List Pendaftar
    public function listpendaftar()
    {
        $this->load->model('Listpendaftar_model');
        $data['judul'] = 'List Pendaftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // load library 
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/WebsiteITQ/admin/listpendaftar';
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('email_pendaftar', $data['keyword']);
        $this->db->or_like('jenis_kelamin', $data['keyword']);
        $this->db->or_like('tempat_lahir', $data['keyword']);
        $this->db->or_like('nama_wali', $data['keyword']);
        $this->db->from('pendaftar');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pendaftar'] = $this->Listpendaftar_model->getPendaftar($config['per_page'], $data['start'], $data['keyword']);

        // end Pagination

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/listpendaftar', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function detail_calon_santri($id)
    {
        $data['judul'] = 'Detail Calon santri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pendaftar'] = $this->db->get_where('pendaftar', ['id' => $id])->row_array();

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/detail_calon_santri', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function hapuslistpendaftar($id)
    {
        $data['pendaftar'] = $this->db->get_where('pendaftar', ['id' => $id])->row_array();
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['pendaftar']['foto_santri']);
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['pendaftar']['foto_kk_santri']);
        unlink(FCPATH . './assets/admin/img/data_foto_santri/' . $data['pendaftar']['foto_ktp_wali']);
        $this->db->where('id', $id);
        $this->db->delete('pendaftar');
        $this->session->set_flashdata('message', '<div class="alert alert-success ml-3 mt-3 w-25 " role="alert">Data berhasil dihapus!</div>');
        redirect('admin/listpendaftar');
    }

    public function jadikan_santri($id)
    {
        $data['jadikan_santri'] = $this->db->get_where('pendaftar', ['id' => $id])->row_array();

        $data = [
            'email_pendaftar' => $data['jadikan_santri']['email_pendaftar'],
            'nama' => $data['jadikan_santri']['nama'],
            'nama_panggilan' => $data['jadikan_santri']['nama_panggilan'],
            'jenis_kelamin' => $data['jadikan_santri']['jenis_kelamin'],
            'kelas' => '1 ibtida',
            'tempat_lahir' => $data['jadikan_santri']['tempat_lahir'],
            'tanggal_lahir' => $data['jadikan_santri']['tanggal_lahir'],
            'alamat_lengkap' => $data['jadikan_santri']['alamat_lengkap'],
            'asal_pesantren_sekolah' => $data['jadikan_santri']['asal_pesantren_sekolah'],
            'no_hp_santri' => $data['jadikan_santri']['no_hp_santri'],
            'nama_wali' => $data['jadikan_santri']['nama_wali'],
            'no_hp_wali' => $data['jadikan_santri']['no_hp_wali'],
            'angkatan' => $data['jadikan_santri']['angkatan'],
            'foto_santri' => $data['jadikan_santri']['foto_santri'],
            'foto_kk_santri' => $data['jadikan_santri']['foto_kk_santri'],
            'foto_ktp_wali' => $data['jadikan_santri']['foto_ktp_wali'],
        ];

        if ($this->db->insert('data_santri', $data)) {
            $this->db->where('id', $id);
            $this->db->delete('pendaftar');
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
            redirect('admin');
        }
    }

    public function edit_calon_santri($id = '')
    {
        $data['judul'] = 'Ubah Calon Santri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['calon_santri'] = $this->db->get_where('pendaftar', ['id' => $id])->row_array();
        $data['kelamin'] = ['putra', 'putri'];
        $data['kelas'] = ['1 Ibtida', '2 Ibitda', '3 Ibtida', '1 Tsanawi', '2 Tsanawi', '3 Tsanawi'];

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|trim',
            [
                'required' => 'Tempat lahir harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat Lengkap',
            'required|trim',
            [
                'required' => 'Alamat lengkap harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'nama_wali',
            'Nama Wali',
            'required|trim',
            [
                'required' => 'Nama wali harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'angkatan',
            'Angkatan',
            'required|trim',
            [
                'required' => 'Angkatan harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/edit_calon_santri', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $upload_image1 = $_FILES['foto_santri']['name'];
            $upload_image2 = $_FILES['foto_kk_santri']['name'];
            $upload_image3 = $_FILES['foto_ktp_wali']['name'];
            $old_image1 = $this->input->post('ft_santri', true);
            $old_image2 = $this->input->post('ft_kk_santri', true);
            $old_image3 = $this->input->post('ft_ktp_wali', true);

            if ($upload_image1) {
                $config['upload_path'] = './assets/admin/img/data_foto_pendaftar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_santri')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_pendaftar/' . $old_image1);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_santri', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_image2) {
                $config['upload_path'] = './assets/admin/img/data_foto_pendaftar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_kk_santri')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_pendaftar' . $old_image2);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_kk_santri', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_image3) {
                $config['upload_path'] = './assets/admin/img/data_foto_pendaftar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_ktp_wali')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/admin/img/data_foto_pendaftar/' . $old_image3);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_ktp_wali', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'email_pendaftar' => $data['user']['email'],
                'nama' => $this->input->post('nama', true),
                'nama_panggilan' => $this->input->post('nama_panggilan', true),
                'jenis_kelamin' => $this->input->post('kelamin', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'alamat_lengkap' => $this->input->post('alamat', true),
                'asal_pesantren_sekolah' => $this->input->post('asal_pesantren_sekolah', true),
                'no_hp_santri' => $this->input->post('no_hp_santri', true),
                'nama_wali' => $this->input->post('nama_wali', true),
                'no_hp_wali' => $this->input->post('no_hp_wali', true),
                'angkatan' => $this->input->post('angkatan', true)
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('pendaftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil diubah!</div>');
            redirect('admin/listpendaftar');
        }
    }

    // pengumuman
    public function pengumuman()
    {
        $this->load->model('Pengumuman_model');
        $data['judul'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // load library 
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/WebsiteITQ/admin/pengumuman';
        $this->db->like('judul', $data['keyword']);
        $this->db->from('pengumuman');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pengumuman'] = $this->Pengumuman_model->getPengumuman($config['per_page'], $data['start'], $data['keyword']);

        // end Pagination

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function detail_pengumuman($id)
    {
        $data['judul'] = 'Detail Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->db->get_where('pengumuman', ['id' => $id])->row_array();

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/detail_pengumuman', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function delete_pengumuman($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');
        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil dihapus!</div>');
        redirect('admin/pengumuman');
    }

    public function edit_pengumuman($id = '')
    {
        $data['judul'] = 'Ubah Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->db->get_where('pengumuman', ['id' => $id])->row_array();

        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'required',
            [
                'required' => 'Judul harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'isi_pengumuman',
            'Isi Pengumuman',
            'required',
            [
                'required' => 'Isi Pengumuman harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/edit_pengumuman', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $data = [
                'judul' => $this->input->post('judul', true),
                'isi_pengumuman' => $this->input->post('isi_pengumuman', true)
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('pengumuman', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data berhasil diubah!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function add_pengumuman()
    {
        $data['judul'] = 'Tambah Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'required',
            [
                'required' => 'Judul harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'isi_pengumuman',
            'Isi Pengumuman',
            'required',
            [
                'required' => 'Isi Pengumuman harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/add_pengumuman', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'isi_pengumuman' => $this->input->post('isi_pengumuman'),
                'date_created' => time()
            ];

            $this->db->insert('pengumuman', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
            redirect('admin/pengumuman');
        }
    }

    // Berita 
    public function berita()
    {
        $this->load->model('Berita_model');
        $data['judul'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // load library 
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/WebsiteITQ/admin/berita';
        $this->db->like('judul_berita', $data['keyword']);
        $this->db->from('berita');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['berita'] = $this->Berita_model->getBerita($config['per_page'], $data['start'], $data['keyword']);

        // end Pagination

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/berita', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function detail_berita($id)
    {
        $data['judul'] = 'Detail Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/detail_berita', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function delete_berita($id)
    {
        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();
        unlink(FCPATH . './assets/profile/images/berita/' . $data['berita']['foto_berita']);
        $this->db->where('id', $id);
        $this->db->delete('berita');
        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil dihapus!</div>');
        redirect('admin/berita');
    }

    public function add_berita()
    {
        $data['judul'] = 'Tambah Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'judul_berita',
            'Judul Berita',
            'required',
            [
                'required' => 'Judul harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'isi_berita',
            'Isi Berita',
            'required',
            [
                'required' => 'Isi Berita harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/add_berita', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $config1['upload_path'] = './assets/profile/images/berita/';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            $config1['max_size']     = '2048';

            $this->load->library('upload', $config1);

            if ($this->upload->do_upload('foto_berita')) {

                $data = [
                    'judul_berita' => $this->input->post('judul_berita'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'date_created' => time(),
                    'foto_berita' => $this->upload->data('file_name')
                ];

                $this->db->insert('berita', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
                redirect('admin/berita');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function edit_berita($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Ubah Berita';
        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();

        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required', [
            'required' => 'Judul Berita harus di isi!'
        ]);
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', [
            'required' => 'isi berita harus di isi!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/edit_berita', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $upload_image = $_FILES['foto_berita']['name'];
            $old_image = $this->input->post('ft_berita', true);

            if ($upload_image) {
                $config['upload_path'] = './assets/profile/images/berita/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_berita')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/profile/images/berita/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_berita', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'judul_berita' => $this->input->post('judul_berita'),
                'isi_berita' => $this->input->post('isi_berita'),
                'date_created' => time(),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('berita', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil diubah!</div>');
            redirect('admin/berita');
        }
    }

    // Guru

    public function guru()
    {
        $this->load->model('Guru_model');
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['guru'] = $this->db->get('guru')->result_array();

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // load library 
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $config['base_url'] = 'http://localhost/WebsiteITQ/admin/guru';
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('pelajaran', $data['keyword']);
        $this->db->from('guru');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // inisialisasi
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['guru'] = $this->Guru_model->getGuru($config['per_page'], $data['start'], $data['keyword']);

        // end Pagination

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function add_guru()
    {
        $data['judul'] = 'Tambah Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => 'Nama harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'pelajaran',
            'Pelajaran',
            'required',
            [
                'required' => 'Pelajaran harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/add_guru', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $config1['upload_path'] = './assets/profile/images/guru/';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            $config1['max_size']     = '2048';

            $this->load->library('upload', $config1);

            if ($this->upload->do_upload('foto_guru')) {

                $data = [
                    'nama' => $this->input->post('nama'),
                    'pelajaran' => $this->input->post('pelajaran'),
                    'pesan' => $this->input->post('pesan'),
                    'link_fb' => $this->input->post('link_fb'),
                    'foto_guru' => $this->upload->data('file_name')
                ];

                $this->db->insert('guru', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil ditambahkan!</div>');
                redirect('admin/guru');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function delete_guru($id)
    {
        $data['guru'] = $this->db->get_where('guru', ['id' => $id])->row_array();
        unlink(FCPATH . './assets/profile/images/guru/' . $data['guru']['foto_guru']);
        $this->db->where('id', $id);
        $this->db->delete('guru');
        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil dihapus!</div>');
        redirect('admin/guru');
    }

    public function edit_guru($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Ubah Guru';
        $data['guru'] = $this->db->get_where('guru', ['id' => $id])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => 'Nama harus diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'pelajaran',
            'Pelajaran',
            'required',
            [
                'required' => 'Pelajaran harus diisi!'
            ]
        );


        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/edit_guru', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $upload_image = $_FILES['foto_guru']['name'];
            $old_image = $this->input->post('ft_guru', true);

            if ($upload_image) {
                $config['upload_path'] = './assets/profile/images/guru/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_guru')) {

                    // menghapus foto yang telah diganti
                    unlink(FCPATH . './assets/profile/images/guru/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_guru', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $this->input->post('nama'),
                'pelajaran' => $this->input->post('pelajaran'),
                'pesan' => $this->input->post('pesan'),
                'link_fb' => $this->input->post('link_fb')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('guru', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data berhasil diubah!</div>');
            redirect('admin/guru');
        }
    }

    // Pihak 
    public function pihak()
    {
        $data['judul'] = 'Pihak Terkait';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pihak'] = $this->db->get('pihak')->result_array();

        $this->load->view('auth/templates/header', $data);
        $this->load->view('auth/templates/sidebar', $data);
        $this->load->view('auth/templates/topbar', $data);
        $this->load->view('admin/pihak', $data);
        $this->load->view('auth/templates/footer', $data);
    }

    public function edit_pihak($id = '')
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Pihak';
        $data['pihak'] = $this->db->get_where('pihak', ['id' => $id])->row_array();

        $this->form_validation->set_rules(
            'jumlah_putra',
            'Jumlah Putra',
            'required|numeric',
            [
                'required' => 'Jumlah putra harus diisi!',
                'numeric' => 'Harus angka atuh bray!',
            ]
        );

        $this->form_validation->set_rules(
            'jumlah_putri',
            'Jumlah putri',
            'required|numeric',
            [
                'required' => 'Jumlah putra harus diisi!',
                'numeric' => 'Harus angka atuh bray!',
            ]
        );

        $this->form_validation->set_rules(
            'jumlah_pengurus',
            'Jumlah pengurus',
            'required|numeric',
            [
                'required' => 'Jumlah putra harus diisi!',
                'numeric' => 'Harus angka atuh bray!',
            ]
        );

        $this->form_validation->set_rules(
            'jumlah_alumni',
            'Jumlah alumni',
            'required|numeric',
            [
                'required' => 'Jumlah putra harus diisi!',
                'numeric' => 'Harus angka atuh bray!',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/templates/sidebar', $data);
            $this->load->view('auth/templates/topbar', $data);
            $this->load->view('admin/edit_pihak', $data);
            $this->load->view('auth/templates/footer', $data);
        } else {

            $data = [
                'jumlah_putra' => $this->input->post('jumlah_putra'),
                'jumlah_putri' => $this->input->post('jumlah_putri'),
                'jumlah_pengurus' => $this->input->post('jumlah_pengurus'),
                'jumlah_alumni' => $this->input->post('jumlah_alumni')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('pihak', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success  w-25 " role="alert">Data berhasil diubah!</div>');
            redirect('admin/pihak');
        }
    }
    
}
