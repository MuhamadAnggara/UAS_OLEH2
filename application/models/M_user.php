<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    // KITA FOKUSKAN DEFAULT TABEL KE 'customer'
    protected $table = 'customer';

    /* ==========================================================
       LOGIN (MULTI-LEVEL)
       Fungsi ini mengecek tabel ADMIN dulu, kalau tidak ada
       baru mengecek tabel CUSTOMER.
       (Sesuai request agar terhubung ke data customer & admin)
    ========================================================== */
    public function login($username, $password)
    {
        // 1. Cek ke Tabel ADMIN
        $cek_admin = $this->db->get_where('admin', [
            'username' => $username, 
            'password' => $password
        ])->row();

        // Jika data ditemukan di tabel admin
        if ($cek_admin) {
            // Kita tambahkan properti 'role' manual agar controller tau ini admin
            $cek_admin->role = 'admin'; 
            $cek_admin->id_user = $cek_admin->id_admin; // Normalisasi ID
            return $cek_admin;
        }

        // 2. Cek ke Tabel CUSTOMER
        // Pastikan tabel customer sudah kamu tambah kolom 'username' & 'password'
        $cek_customer = $this->db->get_where('customer', [
            'username' => $username, 
            'password' => $password
        ])->row();

        // Jika data ditemukan di tabel customer
        if ($cek_customer) {
            $cek_customer->role = 'user'; // Penanda role user
            $cek_customer->id_user = $cek_customer->id_customer; // Normalisasi ID
            return $cek_customer;
        }

        // 3. Jika tidak ada di keduanya
        return false;
    }

    /* ==========================================================
       GET USER BY USERNAME (Untuk Cek Duplikasi saat Register)
    ========================================================== */
    public function get_user_by_username($username)
    {
        // Cek di tabel customer saja
        return $this->db
            ->where('username', $username)
            ->get($this->table) // tabel customer
            ->row();
    }

    /* ==========================================================
       REGISTER (INSERT KE CUSTOMER)
       Data register langsung masuk ke tabel customer
    ========================================================== */
    public function insert_user($data)
    {
        // Pastikan $data dari controller sesuai dengan kolom tabel customer
        // (username, password, nama_customer, email, no_hp, alamat)
        return $this->db->insert($this->table, $data);
    }

    /* ==========================================================
       ADMIN - GET ALL CUSTOMERS
    ========================================================== */
    public function get_all_users()
    {
        return $this->db
            ->order_by('id_customer', 'DESC')
            ->get($this->table)
            ->result();
    }

    // Alias untuk fungsi di atas (biar controller lama tidak error)
    public function get_customer()
    {
        return $this->get_all_users();
    }

    /* ==========================================================
       ADMIN - DELETE CUSTOMER
    ========================================================== */
    public function delete_customer($id_customer)
    {
        return $this->db
            ->where('id_customer', $id_customer) // Pakai id_customer
            ->delete($this->table);
    }

    /* ==========================================================
       GET USER BY ID (Untuk Profil/Checkout)
    ========================================================== */
    public function get_user_by_id($id_customer)
    {
        return $this->db
            ->where('id_customer', $id_customer)
            ->get($this->table)
            ->row();
    }
}