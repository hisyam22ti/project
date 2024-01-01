<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Kantin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['judul'] = "Daftar Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->User_model->getKantin();
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_kantin", $data);
        $this->load->view("layout/footer", $data);
    }
    public function customer()
    {
        $data['judul'] = "Halaman Tambah Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->User_model->getCustomer();
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_tambah_kantin", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah($id)
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['kantin'] = $this->User_model->getById($id);
        $data = [
            'nama' => $data['user']['nama'],
            'email' => $data['user']['email'],
            'password' => $data['user']['password'],
            'gambar' => $data['user']['gambar'],
            'role' => 'Kantin',
        ];
        $this->User_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Diubah!</div>');
        redirect('Kantin');
    }
    public function detail()
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getById($data['user']['id']);
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_profil_kantin", $data);
        $this->load->view("layout/footer", $data);
    }
    // public function edit($id)
    // {
    //     $data['judul'] = "Halaman Edit Kantin";
    //     $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
    //     $data['kantin'] = $this->User_model->getById($data['user']['id']);
    //     $this->form_validation->set_rules('nama', 'Nama Kantin', 'required', [
    //         'required' => 'Nama Kantin Wajib diisi'
    //     ]);
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout/header", $data);
    //         $this->load->view("kantin/vw_editprofil_kantin", $data);
    //         $this->load->view("layout/footer", $data);
    //     } else {
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'email' => $data['user']['email'],
    //             'password' => $data['user']['password'],
    //             'role' => $data['user']['role'],
    //         ];
    //         $upload_image = $_FILES['gambar']['name'];
    //         if ($upload_image) {
    //             $config['allowed_types'] = 'gif|jpg|jpeg|png';
    //             $config['max_size'] = '2048';
    //             $config['upload_path'] = 'assets/assets/img/profile/';
    //             $this->load->library('upload', $config);
    //             if ($this->upload->do_upload('gambar')) {
    //                 $old_image = $data['user']['gambar'];
    //                 if ($old_image != 'default.jpg') {
    //                     unlink(FCPATH . 'assets/assets/img/profile/' . $old_image);
    //                 }
    //                 $new_image = $this->upload->data('file_name');
    //                 $this->db->set('gambar', $new_image);
    //             } else {
    //                 echo $this->upload->display_errors();
    //             }
    //         }
    //         $id = $this->input->post('id');
    //         $this->User_model->update(['id' => $id], $data, $upload_image);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Diubah!</div>');
    //         redirect('Kantin/');
    //     }
    // }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Kantin";
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['kantin'] = $this->User_model->getById($data['user']['id']);
        $this->form_validation->set_rules('nama', 'Nama Kantin', 'required', [
            'required' => 'Nama Kantin Wajib diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("kantin/vw_editprofil_kantin", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $data['user']['email'],
                'password' => $data['user']['password'],
                'role' => $data['user']['role'],
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '20489';
                $config['upload_path'] = 'assets/assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['user']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->User_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Diubah!</div>');
            redirect('Kantin/detail');
        }
    }
    public function riwayat()
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getJoinCustomerRiwayat($data['user']['id']);
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_riwayat_pesanan_kantin", $data);
        $this->load->view("layout/footer", $data);
    }
    public function pesanan()
    {
        $data['judul'] = "Halaman Pesanan Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getJoinCustomer($data['user']['id']);
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_pesanan_kantin", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['kantin'] = $this->User_model->getById($id);
        $data = [
            'nama' => $data['user']['nama'],
            'email' => $data['user']['email'],
            'password' => $data['user']['password'],
            'gambar' => $data['user']['gambar'],
            'role' => 'Customer',
        ];
        $this->User_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Diubah!</div>');
        redirect('Kantin');
    }

    // function upload()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'nim' => $this->input->post('nim'),
    //         'email' => $this->input->post('email'),
    //         'prodi' => $this->input->post('prodi'),
    //         'alamat' => $this->input->post('alamat'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'asal_sekolah' => $this->input->post('asal_sekolah'),
    //     ];
    //     $this->User_model->insert($data);
    //     redirect('Kantin');
    // }

    // public function edit($id)
    // {
    //     $data['judul'] = "Halaman Edit Kantin";
    //     $data['user'] = $this->User_model->getById($id);
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $this->form_validation->set_rules('nama', 'Nama Kantin', 'required', [
    //         'required' => 'Nama Kantin Wajib diisi'
    //     ]);
    //     $this->form_validation->set_rules('email', 'Email Kantin', 'required', [
    //         'required' => 'Email Kantin Wajib diisi'
    //     ]);
    //     $this->form_validation->set_rules('gambar', 'Gambar Kantin', 'required', [
    //         'required' => 'Gambar Kantin Wajib diisi'
    //     ]);
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout/header", $data);
    //         $this->load->view("kantin/vw_ubah_kantin", $data);
    //         $this->load->view("layout/footer", $data);
    //     } else {
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'email' => $this->input->post('email'),
    //             'gambar' => $this->input->post('gambar'),
    //         ];
    //         $id = $this->input->post('id');
    //         $this->User_model->update(['id' => $id], $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Diubah!</div>');
    //         redirect('Kantin');
    //     }
    // }

    // public function update()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'nim' => $this->input->post('nim'),
    //         'email' => $this->input->post('email'),
    //         'prodi' => $this->input->post('prodi'),
    //         'alamat' => $this->input->post('alamat'),
    //         'no_hp' => $this->input->post('no_hp'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'asal_sekolah' => $this->input->post('asal_sekolah')
    //     ];
    //     $id = $this->input->post('id');
    //     $this->User_model->update(['id' => $id], $data);
    //     redirect('Kantin');
    // }
}
