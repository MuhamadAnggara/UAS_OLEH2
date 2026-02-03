<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembelian');
        $this->load->model('M_supplier');
        $this->load->model('M_produk');
    }

    // =========================
    // LIST DATA PEMBELIAN
    // =========================
    public function index()
    {
        $data['pembelian'] = $this->M_pembelian->get_all();
        $this->load->view('admin/pembelian/index', $data);
    }

    // =========================
    // FORM TAMBAH PEMBELIAN
    // =========================
    public function tambah()
    {
        $data['supplier'] = $this->M_supplier->get_all();
        $data['produk']   = $this->M_produk->get_all();
        $this->load->view('admin/pembelian/tambah', $data);
    }

    // =========================
    // SIMPAN PEMBELIAN
    // =========================
    public function simpan()
    {
        // SIMPAN HEADER PEMBELIAN
        $id_pembelian = $this->M_pembelian->insert([
            'id_supplier' => $this->input->post('id_supplier', true),
            'tanggal'     => date('Y-m-d'),
            'total'       => 0
        ]);

        $total = 0;

        $id_produk = $this->input->post('id_produk');
        $qty       = $this->input->post('qty');
        $harga     = $this->input->post('harga');

        if (is_array($id_produk)) {
            foreach ($id_produk as $i => $produk) {

                // simpan detail pembelian
                $this->db->insert('detail_pembelian', [
                    'id_pembelian' => $id_pembelian,
                    'id_produk'    => $produk,
                    'qty'          => $qty[$i],
                    'harga_beli'   => $harga[$i]
                ]);

                // update stok produk
                $this->db->set('stok', 'stok + '.$qty[$i], false);
                $this->db->where('id_produk', $produk);
                $this->db->update('produk');

                // hitung total
                $total += $qty[$i] * $harga[$i];
            }
        }

        // UPDATE TOTAL PEMBELIAN
        $this->db->update(
            'pembelian',
            ['total' => $total],
            ['id_pembelian' => $id_pembelian]
        );

        redirect('admin/pembelian');
    }
}
