<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        $this->load->model('Pesanan_model');
    }
    public function index()
    {
        $data['judul'] = "Silahkan Pilih Kantin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->User_model->getKantin(); 
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_customer", $data);
        $this->load->view("layout/footer_customer");
    }
    public function pilih($kantin)
    {
        $data['judul'] = "Silahkan Pilih Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->User_model->getId($kantin);
        $data['menu'] = $this->Menu_model->getKantinC($kantin);
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_menu_customer", $data);
        $this->load->view("layout/footer_customer", $data);
    }
    public function makan($kantin)
    {
        $data['judul'] = "Silahkan Pilih Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->User_model->getId($kantin);
        $data['menu'] = $this->Menu_model->getKantinMknC($kantin);
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_makan_customer", $data);
        $this->load->view("layout/footer_customer", $data);
    }
    public function minum($kantin)
    {
        $data['judul'] = "Silahkan Pilih Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->User_model->getId($kantin);
        $data['menu'] = $this->Menu_model->getKantinMnmC($kantin);
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_minum_customer", $data);
        $this->load->view("layout/footer_customer", $data);
    }
    public function pesanan()
    {
        $data['judul'] = "Halaman Pesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getJoinKantin($data['user']['id']);
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_daftar_pesanan_customer", $data);
        $this->load->view("layout/footer_customer", $data);
    }
    public function riwayat()
    {
        $data['judul'] = "Halaman Pesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->getJoinKantinRiwayat($data['user']['id']);
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_riwayat_customer", $data);
        $this->load->view("layout/footer_customer", $data);
    }
    public function profil()
    {
        $data['judul'] = "Halaman Profil";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->User_model->getById($data['user']['id']);
        $this->load->view("layout/header_customer", $data);
        $this->load->view("customer/vw_profil_customer", $data);
        $this->load->view("layout/footer_customer");
    }
    public function edit()
    {
        $data['judul'] = "Halaman Edit Customer";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->User_model->getById($data['user']['id']);
        $this->form_validation->set_rules('nama', 'Nama Customer', 'required',[
            'required'=>'Nama Customer Wajib diisi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header_customer", $data);
            $this->load->view("customer/vw_ubah_customer", $data);
            $this->load->view("layout/footer_customer", $data);
        } else{
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Customer Berhasil Diubah!</div>');
            redirect('Customer/profil');
        }
    }
}
?>