<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

    /**
     * ==================================================
     * MODEL INI SUDAH TIDAK DIGUNAKAN UNTUK KERANJANG
     * KERANJANG SEKARANG PAKAI SESSION
     *
     * MODEL INI DISIAPKAN JIKA:
     * - DIBUTUHKAN MIGRASI
     * - ATAU LEGACY CODE
     * ==================================================
     */

    /* =========================
       AMBIL CART USER (DISABLED)
    ========================== */
    public function get_cart_user($id_user)
    {
        // ❌ KERANJANG TIDAK LAGI DARI DATABASE
        return [];
    }

    /* =========================
       TAMBAH CART (DISABLED)
    ========================== */
    public function add_cart($data)
    {
        // ❌ KERANJANG SEKARANG PAKAI SESSION
        return false;
    }

    /* =========================
       HAPUS SEMUA CART (DISABLED)
    ========================== */
    public function clear_cart($id_user)
    {
        // ❌ TIDAK ADA CART DATABASE
        return true;
    }

    /* =========================
       HAPUS ITEM CART (DISABLED)
    ========================== */
    public function delete_item($id_keranjang, $id_user)
    {
        // ❌ TIDAK ADA CART DATABASE
        return true;
    }
}
