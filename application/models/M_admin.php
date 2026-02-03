<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    // 🔥 PENTING: Arahkan ke tabel 'admin', BUKAN 'users'
    private $table = 'admin'; 

    public function login($username, $password)
    {
        // Query cek data ke tabel admin
        return $this->db->get_where($this->table, [
            'username' => $username,
            'password' => $password
        ])->row();
    }
    
    // Fungsi untuk mengambil data admin (jika perlu nanti)
    public function get_admin_by_id($id_admin)
    {
        return $this->db->get_where($this->table, ['id_admin' => $id_admin])->row();
    }
}