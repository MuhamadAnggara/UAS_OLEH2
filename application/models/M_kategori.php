<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    private $table = 'kategori';

    /* =========================
       AMBIL DATA
       ========================= */

    // Ambil semua kategori
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil 1 kategori berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db
                    ->where('id_kategori', $id)
                    ->get($this->table)
                    ->row();
    }

    /* =========================
       CRUD
       ========================= */

    // Simpan kategori baru
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update kategori
    public function update($id, $data)
    {
        return $this->db
                    ->where('id_kategori', $id)
                    ->update($this->table, $data);
    }

    // Hapus kategori
    public function delete($id)
    {
        return $this->db
                    ->where('id_kategori', $id)
                    ->delete($this->table);
    }

    /* =========================
       STATISTIK
       ========================= */

    // Hitung total kategori
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
}
