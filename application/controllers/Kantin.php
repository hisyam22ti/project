<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Kantin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kantin_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Customer_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->Kantin_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_kantin", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Kantin', 'required',[
            'required'=>'Nama Kantin Wajib diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email Kantin', 'required',[
            'required'=>'Email Kantin Wajib diisi'
        ]);
        if($this->form_validation->run()==false){
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_tambah_kantin", $data);
        $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = 'assets/assets/img/kantin/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Kantin_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Ditambahkan!</div>');
            redirect('Kantin');
        }
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->Kantin_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_detail_kantin", $data);
        $this->load->view("layout/footer", $data);
    }
    public function pesanan()
    {
        $data['judul'] = "Halaman Detail Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->db->get_where('kantin', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->Customer_model->get();
        $data['pesanan'] = $this->Pesanan_model->getJoinCustomer($data['kantin']['id']);
        $this->load->view("layout/header", $data);
        $this->load->view("kantin/vw_pesanan_kantin", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Kantin_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Dihapus!</div>');
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
    //     $this->Kantin_model->insert($data);
    //     redirect('Kantin');
    // }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Kantin";
        $data['kantin'] = $this->Kantin_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Kantin', 'required',[
            'required'=>'Nama Kantin Wajib diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email Kantin', 'required',[
            'required'=>'Email Kantin Wajib diisi'
        ]);
        $this->form_validation->set_rules('gambar', 'Gambar Kantin', 'required',[
            'required'=>'Gambar Kantin Wajib diisi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
            $this->load->view("kantin/vw_ubah_kantin", $data);
            $this->load->view("layout/footer", $data);
        } else{
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'gambar' => $this->input->post('gambar'),
            ];
            $id = $this->input->post('id');
            $this->Kantin_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kantin Berhasil Diubah!</div>');
            redirect('Kantin');
        }
    }

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
    //     $this->Kantin_model->update(['id' => $id], $data);
    //     redirect('Kantin');
    // }
}
?>