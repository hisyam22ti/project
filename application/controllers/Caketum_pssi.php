<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Caketum_pssi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Caketum_pssi_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman Calon Ketua Umum PSSI";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['caketum_pssi'] = $this->Caketum_pssi_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("caketum_pssi/vw_caketum_pssi", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Calon Ketua Umum PSSI";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Calon Ketua Umum PSSI', 'required',[
            'required'=>'Nama Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('nik', 'NIK Calon Ketua Umum PSSI', 'required',[
            'required'=>'NIK Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('asal', 'Asal Calon Ketua Umum PSSI', 'required',[
            'required'=>'Asal Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('umur', 'Umur Calon Ketua Umum PSSI', 'required|integer',[
            'required'=>'Umur Calon Ketua Umum PSSI Wajib diisi',
            'integer'=>'Umur harus angka'
        ]);
        $this->form_validation->set_rules('pengalaman', 'Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI', 'required',[
            'required'=>'Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('durasi', 'Durasi Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI', 'required|integer',[
            'required'=>'Durasi Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI Wajib diisi',
            'integer'=>'Durasi Pengalaman di Sepak Bola Professional harus angka'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
            $this->load->view("caketum_pssi/vw_tambah_caketum_pssi", $data);
            $this->load->view("layout/footer", $data);
        } else{
            $data = [
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'asal' => $this->input->post('asal'),
                'umur' => $this->input->post('umur'),
                'pengalaman' => $this->input->post('pengalaman'),
                'durasi' => $this->input->post('durasi'),
            ];
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = 'assets/assets/img/caketum_pssi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Caketum_pssi_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Calon Ketua Umum PSSI Berhasil Ditambahkan!</div>');
            redirect('Caketum_pssi');
        }
    }
    public function hapus($id)
    {
        $this->Caketum_pssi_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Calon Ketua Umum PSSI Berhasil Dihapus!</div>');
        redirect('Caketum_pssi');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Calon Ketua Umum PSSI";
        $data['caketum_pssi'] = $this->Caketum_pssi_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Calon Ketua Umum PSSI', 'required',[
            'required'=>'Nama Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('nik', 'NIK Calon Ketua Umum PSSI', 'required',[
            'required'=>'NIK Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('asal', 'Asal Calon Ketua Umum PSSI', 'required',[
            'required'=>'Asal Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('umur', 'Umur Calon Ketua Umum PSSI', 'required|integer',[
            'required'=>'Umur Calon Ketua Umum PSSI Wajib diisi',
            'integer'=>'Umur harus angka'
        ]);
        $this->form_validation->set_rules('pengalaman', 'Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI', 'required',[
            'required'=>'Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI Wajib diisi'
        ]);
        $this->form_validation->set_rules('durasi', 'Durasi Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI', 'required|integer',[
            'required'=>'Durasi Pengalaman di Sepak Bola Professional Calon Ketua Umum PSSI Wajib diisi',
            'integer'=>'Durasi Pengalaman di Sepak Bola Professional harus angka'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
            $this->load->view("caketum_pssi/vw_ubah_caketum_pssi", $data);
            $this->load->view("layout/footer", $data);
        } else{
            $data = [
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'asal' => $this->input->post('asal'),
                'umur' => $this->input->post('umur'),
                'pengalaman' => $this->input->post('pengalaman'),
                'durasi' => $this->input->post('durasi'),
            ];
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = 'assets/assets/img/caketum_pssi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['caketum_pssi']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/assets/img/caketum_pssi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Caketum_pssi_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Caketum_pssi Berhasil Diubah!</div>');
            redirect('Caketum_pssi');
        }
    }
}
?>