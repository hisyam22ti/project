<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Menu_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Kantin_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman Customer";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->Kantin_model->get(); // Load customer data
        $this->load->view("layout/header", $data);
        $this->load->view("customer/vw_customer", $data);
        $this->load->view("layout/footer");
    }
    public function pilih($kantin)
    {
        $data['judul'] = "Halaman Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getById($kantin);
        $this->load->view("layout/header", $data);
        $this->load->view("customer/vw_customer_menu", $data);
        $this->load->view("layout/footer", $data);
    }
    public function pesanan($id)
    {
        $data['judul'] = "Halaman Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        $data['kantin'] = $this->Kantin_model->get();
        $data['pesanan'] = $this->Pesanan_model->getJoinKantin($id);
        $this->load->view("layout/header", $data);
        $this->load->view("customer/vw_customer_daftar_pesanan", $data);
        $this->load->view("layout/footer", $data);
    }
}
?>