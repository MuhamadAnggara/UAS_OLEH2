<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelian extends CI_Model {

    /**
     * Ambil data pembelian + nama supplier
     */
    public function get_all()
    {
        return $this->db
            ->select('pembelian.*, supplier.nama_supplier')
            ->from('pembelian')
            ->join('supplier', 'supplier.id_supplier = pembelian.id_supplier')
            ->order_by('pembelian.id_pembelian', 'DESC')
            ->get()
            ->result();
    }

    /**
     * Simpan pembelian (header)
     */
    public function insert($data)
    {
        $this->db->insert('pembelian', $data);
        return $this->db->insert_id();
    }
}
