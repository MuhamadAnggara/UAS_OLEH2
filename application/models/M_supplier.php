<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

    protected $table = 'supplier';

    /* =========================
       AMBIL SEMUA SUPPLIER
       ========================= */
    public function get_all()
    {
        return $this->db
            ->order_by('id_supplier', 'DESC')
            ->get($this->table)
            ->result();
    }

    /* =========================
       SIMPAN SUPPLIER BARU
       ========================= */
    public function insert($data)
    {
        return $this->db->insert($this->table, [
            'nama_supplier' => $data['nama_supplier'],
            'alamat'        => $data['alamat'],
            'email'         => $data['email'],
            'no_telepon'    => $data['no_telepon']
        ]);
    }

    /* =========================
       AMBIL SUPPLIER BY ID
       ========================= */
    public function get_by_id($id)
    {
        return $this->db
            ->where('id_supplier', (int) $id)
            ->get($this->table)
            ->row();
    }

    /* =========================
       UPDATE SUPPLIER
       ========================= */
    public function update($id, $data)
    {
        return $this->db
            ->where('id_supplier', (int) $id)
            ->update($this->table, [
                'nama_supplier' => $data['nama_supplier'],
                'alamat'        => $data['alamat'],
                'email'         => $data['email'],
                'no_telepon'    => $data['no_telepon']
            ]);
    }

    /* =========================
       HAPUS SUPPLIER
       ========================= */
    public function delete($id)
    {
        return $this->db
            ->where('id_supplier', (int) $id)
            ->delete($this->table);
    }
}
