<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Kantin_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->db->get_where('kantin', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getById($data['kantin']['id']);
        $this->load->view("layout/header", $data);
        $this->load->view("menu/vw_menu", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->db->get_where('kantin', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Menu', 'required',[
            'required'=>'Nama Menu Wajib diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga Menu', 'required',[
            'required'=>'Harga Menu Wajib diisi'
        ]);
        if($this->form_validation->run()==false){
        $this->load->view("layout/header", $data);
        $this->load->view("menu/vw_tambah_menu", $data);
        $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'kantin' => $data['kantin']['id'],
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = 'assets/assets/img/menu/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Menu_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Menu Berhasil Ditambahkan!</div>');
            redirect('Menu');
        }
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("menu/vw_detail_menu", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Menu_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Menu Berhasil Dihapus!</div>');
        redirect('Menu');
    }

    // function upload()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'harga' => $this->input->post('harga'),
    //         'email' => $this->input->post('email'),
    //         'kantin' => $this->input->post('kantin'),
    //         'alamat' => $this->input->post('alamat'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'asal_sekolah' => $this->input->post('asal_sekolah'),
    //     ];
    //     $this->Menu_model->insert($data);
    //     redirect('Menu');
    // }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Menu";
        $data['menu'] = $this->Menu_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->Kantin_model->get();
        $this->form_validation->set_rules('nama', 'Nama Menu', 'required',[
            'required'=>'Nama Menu Wajib diisi'
        ]);
        $this->form_validation->set_rules('gambar', 'Gambar Menu', 'required',[
            'required'=>'Gambar Menu Wajib diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga Menu', 'required',[
            'required'=>'Harga Menu Wajib diisi'
        ]);
        $this->form_validation->set_rules('kantin', 'Kantin Menu', 'required',[
            'required'=>'Kantin Menu Wajib diisi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
            $this->load->view("menu/vw_ubah_menu", $data);
            $this->load->view("layout/footer", $data);
        } else{
            $data = [
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'kantin' => $this->input->post('kantin'),
            ];
            $id = $this->input->post('id');
            $this->Menu_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Menu Berhasil Diubah!</div>');
            redirect('Menu');
        }
    }

    // public function update()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'harga' => $this->input->post('harga'),
    //         'email' => $this->input->post('email'),
    //         'kantin' => $this->input->post('kantin'),
    //         'alamat' => $this->input->post('alamat'),
    //         'no_hp' => $this->input->post('no_hp'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'asal_sekolah' => $this->input->post('asal_sekolah')
    //     ];
    //     $id = $this->input->post('id');
    //     $this->Menu_model->update(['id' => $id], $data);
    //     redirect('Menu');
    // }
}
?>