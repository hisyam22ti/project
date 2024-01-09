<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('User_model');
        $this->load->model('Menu_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman Pesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("pesanan/vw_pesanan", $data);
        $this->load->view("layout/footer");
    }
    public function tambah($menu)
    {
        $data['judul'] = "Silahkan isi form pesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('menu', ['id' => $menu])->row_array();
        $data['menu'] = $this->Menu_model->getById($menu);
        $data['kantin'] = $this->db->get_where('menu', ['kantin' => $data['menu']['kantin']])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getSumById($data['menu']['kantin']);
        $estimasi = ($data['pesanan']['estimasi'] + 1) * 5;
        $this->form_validation->set_rules('porsi', 'Porsi Pesanan', 'required', [
            'required' => 'Porsi Pesanan Wajib diisi'
        ]);
        $this->form_validation->set_rules('meja', 'Meja Pesanan', 'required', [
            'required' => 'Meja Pesanan Wajib diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header_customer", $data);
            $this->load->view("pesanan/vw_tambah_pesanan", $data);
            $this->load->view("layout/footer_customer", $data);
        } else {
            $data = [
                'menu' => $menu,
                'deskripsi' => $this->input->post('deskripsi'),
                'porsi' => $this->input->post('porsi'),
                'harga' => $this->input->post('porsi') * $data['menu']['harga'],
                'meja' => $this->input->post('meja'),
                'customer' => $data['user']['id'],
                'estimasi' => $estimasi,
                'status' => 'Belum diantar',
            ];
            $this->Pesanan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pesanan Berhasil Ditambahkan!</div>');
            redirect('Customer/pesanan');
        }
    }
    public function riwayattambah($menu)
    {
        $data['judul'] = "Silahkan isi form pesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('menu', ['id' => $menu])->row_array();
        $data['menu'] = $this->Menu_model->getById($menu);
        $data['kantin'] = $this->db->get_where('menu', ['kantin' => $data['menu']['kantin']])->row_array();
        $this->form_validation->set_rules('porsi', 'Porsi Pesanan', 'required', [
            'required' => 'Porsi Pesanan Wajib diisi'
        ]);
        $this->form_validation->set_rules('meja', 'Meja Pesanan', 'required', [
            'required' => 'Meja Pesanan Wajib diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header_customer", $data);
            $this->load->view("pesanan/vw_riwayat_tambah_pesanan", $data);
            $this->load->view("layout/footer_customer", $data);
        } else {
            $data = [
                'menu' => $menu,
                'deskripsi' => $this->input->post('deskripsi'),
                'porsi' => $this->input->post('porsi'),
                'harga' => $this->input->post('porsi') * $data['menu']['harga'],
                'meja' => $this->input->post('meja'),
                'customer' => $data['user']['id'],
                'status' => 'Belum diantar'
            ];
            $this->Pesanan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pesanan Berhasil Ditambahkan!</div>');
            redirect('Customer/pesanan');
        }
    }

    public function hapus($id)
    {
        $this->Pesanan_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-check-circle"></i>Data Tidak Dapat Dihapus(sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Berhasil Dihapus!</div>');
        }
        redirect('Pesanan');
    }

    // function upload()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'menu' => $this->input->post('menu'),
    //         'deskripsi' => $this->input->post('deskripsi'),
    //         'porsi' => $this->input->post('porsi'),
    //         'harga' => $this->input->post('harga'),
    //         'meja' => $this->input->post('meja'),
    //         'customer' => $this->input->post('customer'),
    //     ];
    //     $this->Pesanan_model->insert($data);
    //     redirect('Pesanan');
    // }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Pesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getById($id);
        $this->form_validation->set_rules('menu', 'Menu Pesanan', 'required', [
            'required' => 'Menu Pesanan Wajib diisi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Pesanan', 'required', [
            'required' => 'Deskripsi Pesanan Wajib diisi'
        ]);
        $this->form_validation->set_rules('porsi', 'Porsi Pesanan', 'required', [
            'required' => 'Porsi Pesanan Wajib diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga Wajib diisi'
        ]);
        $this->form_validation->set_rules('meja', 'Meja Pesanan', 'required', [
            'required' => 'Meja Pesanan Wajib diisi'
        ]);
        $this->form_validation->set_rules('customer', 'Customer Pesanan', 'required', [
            'required' => 'Customer Pesanan Wajib diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("pesanan/vw_ubah_pesanan", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'menu' => $this->input->post('menu'),
                'deskripsi' => $this->input->post('deskripsi'),
                'porsi' => $this->input->post('porsi'),
                'harga' => $this->input->post('harga'),
                'meja' => $this->input->post('meja'),
                'customer' => $this->input->post('customer'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = 'assets/assets/img/pesanan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['pesanan']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/assets/img/pesanan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Pesanan_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pesanan Berhasil Diubah!</div>');
            redirect('Pesanan');
        }
    }
    public function ubahstatus($id)
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getById($id);
        if ($data['pesanan']['status'] == 'Belum diantar') {
            $data = [
                'menu' => $data['pesanan']['menu'],
                'deskripsi' => $data['pesanan']['deskripsi'],
                'porsi' => $data['pesanan']['porsi'],
                'harga' => $data['pesanan']['harga'],
                'meja' => $data['pesanan']['meja'],
                'customer' => $data['pesanan']['customer'],
                'status' => 'Belum dibayar',
            ];
            $this->Pesanan_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pesanan Berhasil Diubah!</div>');
            redirect('Kantin/pesanan');
        } elseif ($data['pesanan']['status'] == 'Belum dibayar') {
            $data = [
                'menu' => $data['pesanan']['menu'],
                'deskripsi' => $data['pesanan']['deskripsi'],
                'porsi' => $data['pesanan']['porsi'],
                'harga' => $data['pesanan']['harga'],
                'meja' => $data['pesanan']['meja'],
                'customer' => $data['pesanan']['customer'],
                'status' => 'Sudah dibayar',
            ];
            $this->Pesanan_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pesanan Berhasil Diubah!</div>');
            redirect('Kantin/pesanan');
        } else {
        }
    }

    // public function update()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'menu' => $this->input->post('menu'),
    //         'deskripsi' => $this->input->post('deskripsi'),
    //         'porsi' => $this->input->post('porsi'),
    //         'harga' => $this->input->post('harga'),
    //         'meja' => $this->input->post('meja'),
    //         'customer' => $this->input->post('customer'),
    //     ];
    //     $id = $this->input->post('id');
    //     $this->Pesanan_model->update(['id' => $id], $data);
    //     redirect('Pesanan');
    // }
}
