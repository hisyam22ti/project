<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Calon_presiden extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Calon_presiden_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Calon Presiden";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['calon_presiden'] = $this->Calon_presiden_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("calon_presiden/vw_calon_presiden", $data);
        $this->load->view("layout/footer");
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Calon_presiden";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("calon_presiden/vw_tambah_calon_presiden", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Calon_presiden";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['calon_presiden'] = $this->Calon_presiden_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("calon_presiden/vw_detail_calon_presiden", $data);
        $this->load->view("layout/footer");
    }

    public function hapus($id)
    {
        $this->Calon_presiden_model->delete($id);
        redirect('Calon_presiden');
    }

    function upload()
    {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'partai_pendukung' => $this->input->post('partai_pendukung'),
            'asal' => $this->input->post('asal'),
            'umur' => $this->input->post('umur'),
            'riwayat_pekerjaan' => $this->input->post('riwayat_pekerjaan'),
        ];
        $this->Calon_presiden_model->insert($data);
        redirect('Calon_presiden');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Calon_presiden";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['calon_presiden'] = $this->Calon_presiden_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("calon_presiden/vw_ubah_calon_presiden", $data);
        $this->load->view("layout/footer");
    }

    public function update()
    {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'partai_pendukung' => $this->input->post('partai_pendukung'),
            'asal' => $this->input->post('asal'),
            'umur' => $this->input->post('umur'),
            'riwayat_pekerjaan' => $this->input->post('riwayat_pekerjaan'),
        ];
        $id = $this->input->post('id');
        $this->Calon_presiden_model->update(['id' => $id], $data);
        redirect('Calon_presiden');
    }
}
?>