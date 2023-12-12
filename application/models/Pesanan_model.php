<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pesanan_model extends CI_Model
{
    public $table = 'pesanan';
    public $id = 'pesanan.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getJoinKantin($id){
        $this->db->select('m.nama AS menu_nama, p.deskripsi, p.porsi, p.harga, p.meja, k.nama AS kantin_nama, p.status, p.id');
        $this->db->from('pesanan p');
        $this->db->join('kantin k', 'p.kantin = k.id', 'inner');
        $this->db->join('menu m', 'p.menu = m.id', 'inner');
        $this->db->where('p.customer', $id);
        $this->db->order_by('p.status', 'ASC');
        $query = $this->db->get();
        if (!$query) {
            $error = $this->db->error();
            echo 'Query error: '.$error['message'];
            return false;
        }
        return $query->result_array();
    }
    public function getJoinCustomer($id){
        $this->db->select('m.nama AS menu_nama, p.deskripsi, p.porsi, p.harga, p.meja, c.nama AS customer_nama, p.status, p.id');
        $this->db->from('pesanan p');
        $this->db->join('customer c', 'p.customer = c.id', 'inner');
        $this->db->join('menu m', 'p.menu = m.id', 'inner');
        $this->db->where('kantin', $id);
        $this->db->order_by('p.status', 'ASC');
        $query = $this->db->get();if (!$query) {
            $error = $this->db->error();
            echo 'Query error: '.$error['message'];
            return false;
        }
        return $query->result_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
?>