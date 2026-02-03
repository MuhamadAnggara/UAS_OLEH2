<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

    // Target tabel sekarang hanya 'customer' (karena username & password sudah ada di sini)
    private $table = 'customer';

    /* =======================================
       AMBIL SEMUA DATA CUSTOMER
    ======================================= */
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('id_customer', 'DESC');
        
        // 🔥 PERBAIKAN: 
        // Dulu ada JOIN ke tabel users, sekarang KITA HAPUS karena tabel users sudah tidak ada.
        
        return $this->db->get()->result();
    }

    /* =======================================
       HAPUS DATA
    ======================================= */
    public function delete($id_customer)
    {
        $this->db->where('id_customer', $id_customer);
        return $this->db->delete($this->table);
    }
}