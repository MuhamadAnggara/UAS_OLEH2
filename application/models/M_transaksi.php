<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    /* =================================================
       1. SIMPAN TRANSAKSI (Dipakai saat Checkout User)
       ================================================= */
    public function create_transaksi($data_transaksi, $detail_keranjang)
    {
        // 1. Cek Validasi Data Kosong
        if (empty($data_transaksi) || empty($detail_keranjang)) {
            return false;
        }

        // 2. Mulai Transaksi Database (Safety Mode)
        // Jika ada 1 error di tengah jalan, semua batal disimpan
        $this->db->trans_start();

        // A. Insert ke tabel 'transaksi' (Header)
        $this->db->insert('transaksi', $data_transaksi);
        
        // Ambil ID Transaksi yang baru saja tercipta
        $id_transaksi = $this->db->insert_id();

        // B. Siapkan data untuk tabel 'transaksi_detail' (Rincian Barang)
        $detail_batch = [];

        foreach ($detail_keranjang as $item) {
            // Validasi ID Produk (Penting agar tidak 0/Null)
            $id_produk = isset($item['id']) ? $item['id'] : null;

            if($id_produk) {
                $detail_batch[] = [
                    'id_transaksi' => $id_transaksi,
                    'id_produk'    => $id_produk,
                    'qty'          => $item['qty'],
                    'harga'        => $item['price'],    // Harga Satuan
                    'subtotal'     => $item['subtotal']  // Total per item
                ];
            }
        }

        // C. Insert Massal ke 'transaksi_detail'
        if (!empty($detail_batch)) {
            $this->db->insert_batch('transaksi_detail', $detail_batch);
        }

        // D. Selesaikan Transaksi
        $this->db->trans_complete();

        // Cek status akhir (Sukses/Gagal)
        if ($this->db->trans_status() === FALSE) {
            return false; // Gagal simpan
        }

        // Jika sukses, kembalikan ID Transaksi
        return $id_transaksi;
    }

    /* =================================================
       2. AMBIL RIWAYAT (Halaman Profil Customer)
       ================================================= */
    public function get_transaksi_user($id_customer)
    {
        // Pastikan id_customer ada
        if (!$id_customer) {
            return [];
        }

        $this->db->where('id_customer', $id_customer); 
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('transaksi')->result();
    }

    /* =================================================
       3. AMBIL DETAIL BARANG (PENTING UNTUK ADMIN & USER)
       ================================================= */
    // Fungsi ini dipanggil oleh Controller Admin untuk menampilkan Tabel Rincian Barang
    public function get_detail_barang($id_transaksi)
    {
        if (!$id_transaksi) {
            return [];
        }

        // Ambil data detail + Join ke Produk untuk dapat Nama & Gambar
        $this->db->select('transaksi_detail.*, produk.nama_produk, produk.gambar, produk.harga as harga_produk_saat_ini');
        $this->db->from('transaksi_detail');
        $this->db->join('produk', 'produk.id_produk = transaksi_detail.id_produk', 'left'); // Left join agar jika produk dihapus, history tetap ada
        $this->db->where('transaksi_detail.id_transaksi', $id_transaksi);
        
        return $this->db->get()->result();
    }

    /* =================================================
       4. GET ALL TRANSAKSI (Halaman List Admin)
       ================================================= */
    public function get_all_transaksi()
    {
        $this->db->select('transaksi.*, customer.nama_customer');
        $this->db->from('transaksi');
        // Join ke customer untuk ambil nama pembeli
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left');
        $this->db->order_by('transaksi.tanggal', 'DESC'); // Urutkan dari yang terbaru
        
        return $this->db->get()->result();
    }
    
    /* =================================================
       5. GET DETAIL HEADER TRANSAKSI (Info Customer di Admin)
       ================================================= */
    // Nama fungsi 'detail' disesuaikan dengan Controller Admin
    public function detail($id_transaksi)
    {
        $this->db->select('transaksi.*, customer.nama_customer, customer.alamat, customer.no_hp, customer.email');
        $this->db->from('transaksi');
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        
        return $this->db->get()->row();
    }

    /* =================================================
       6. UPDATE STATUS & BUKTI BAYAR
       ================================================= */
    
    // Fungsi untuk Customer upload bukti bayar
    public function upload_bukti_bayar($id_transaksi, $filename)
    {
        $this->db->set('bukti_bayar', $filename);
        $this->db->set('status', 'Pending'); // Status kembali ke Pending agar dicek admin
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }

    // Fungsi untuk Admin Update Status (Lunas/Ditolak/Dikirim)
    public function update_status($id_transaksi, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }
    
    // Fungsi Hapus Transaksi (Opsional - Jika Admin ingin hapus data sampah)
    public function delete($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi');
        // Detail transaksi akan otomatis terhapus jika di database diset ON DELETE CASCADE
        // Jika tidak, tambahkan: $this->db->delete('transaksi_detail', ['id_transaksi' => $id_transaksi]);
    }
}