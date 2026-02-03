<?php
class M_laporan extends CI_Model {

    // Query Pembelian Harian
    public function get_pembelian_harian($tgl) {
        $this->db->select('pembelian.*, supplier.nama_supplier');
        $this->db->from('pembelian');
        $this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier'); // FK sesuai SQL
        $this->db->where('pembelian.tanggal', $tgl);
        return $this->db->get()->result();
    }

    // Query Pembelian Bulanan
    public function get_pembelian_bulanan($bulan, $tahun) {
        $this->db->select('pembelian.*, supplier.nama_supplier');
        $this->db->from('pembelian');
        $this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier');
        $this->db->where('MONTH(pembelian.tanggal)', $bulan);
        $this->db->where('YEAR(pembelian.tanggal)', $tahun);
        return $this->db->get()->result();
    }

    // --- LAPORAN PENJUALAN ---
    
    public function get_penjualan_harian($tgl) {
        $this->db->select('transaksi.*, customer.nama_customer');
        $this->db->from('transaksi');
        // Join ke tabel customer (left join agar jika customer dihapus, transaksi tetap tampil)
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left');
        // Ambil data yang Tanggal-nya saja sama (abaikan jam)
        $this->db->where('DATE(transaksi.tanggal)', $tgl);
        // Opsional: Urutkan dari yang terbaru
        $this->db->order_by('transaksi.id_transaksi', 'DESC');
        return $this->db->get()->result();
    }

    public function get_penjualan_bulanan($bulan, $tahun) {
        $this->db->select('transaksi.*, customer.nama_customer');
        $this->db->from('transaksi');
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left');
        $this->db->where('MONTH(transaksi.tanggal)', $bulan);
        $this->db->where('YEAR(transaksi.tanggal)', $tahun);
        $this->db->order_by('transaksi.id_transaksi', 'ASC');
        return $this->db->get()->result();
    }
}