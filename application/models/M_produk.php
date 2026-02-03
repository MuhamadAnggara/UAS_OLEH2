<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    private $table = 'produk';

    /* =========================
       USER & UMUM
       ========================= */

    /**
     * Ambil SEMUA produk (USER)
     */
    public function get_all()
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('produk.id_produk', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Ambil produk TERBATAS (HOME)
     */
    public function get_limit($limit = 4)
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('produk.id_produk', 'DESC');
        $this->db->limit((int)$limit);
        return $this->db->get()->result();
    }

    /**
     * Ambil 1 produk berdasarkan ID
     */
    public function get_by_id($id)
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->where('produk.id_produk', (int)$id);
        return $this->db->get()->row();
    }

    /* =========================
       ADMIN (CRUD)
       ========================= */

    /**
     * Ambil semua produk (ADMIN)
     */
    public function get_all_admin()
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('produk.id_produk', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Simpan produk baru
     */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update produk
     */
    public function update($id, $data)
    {
        return $this->db
                    ->where('id_produk', (int)$id)
                    ->update($this->table, $data);
    }

    /**
     * Hapus produk
     */
    public function delete($id)
    {
        return $this->db
                    ->where('id_produk', (int)$id)
                    ->delete($this->table);
    }
}
