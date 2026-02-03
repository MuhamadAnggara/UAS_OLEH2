<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // 1. Load Model Transaksi
        $this->load->model('M_transaksi');

        // 2. CEK LOGIN ADMIN
        // Mengecek session 'admin_login' agar tidak dianggap User biasa
        if (!$this->session->userdata('admin_login')) {
            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
            
            // PENTING: Arahkan ke 'admin/auth/login'
            redirect('admin/auth/login');
        }
    }

    public function index()
    {
        redirect('admin/transaksi/penjualan');
    }

    /* ==========================================================
       FUNGSI 1: MENAMPILKAN DAFTAR PENJUALAN
       Link: admin/transaksi/penjualan
    ========================================================== */
    public function penjualan()
    {
        $data['penjualan'] = $this->M_transaksi->get_all_transaksi();
        $data['judul']     = 'Data Penjualan';

        // Load View
        // $this->load->view('templates_admin/header');
        // $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi/penjualan', $data);
        // $this->load->view('templates_admin/footer');
    }

    /* ==========================================================
       FUNGSI 2: LIHAT DETAIL TRANSAKSI
       Link: admin/transaksi/detail/ID
    ========================================================== */
    public function detail($id_transaksi)
    {
        // 1. Ambil Data Header Transaksi
        $header_transaksi = $this->M_transaksi->detail($id_transaksi);

        // 2. Cek apakah data ditemukan
        if (!$header_transaksi) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data transaksi tidak ditemukan!</div>');
            redirect('admin/transaksi/penjualan');
        }

        // 3. Ambil Data Rincian Barang
        $rincian_barang = $this->M_transaksi->get_detail_barang($id_transaksi);

        // 4. Masukkan ke variabel data
        $data['transaksi'] = $header_transaksi;
        $data['detail']    = $rincian_barang; 

        // 5. Load View Detail
        $this->load->view('admin/transaksi/detail', $data);
    }

    /* ==========================================================
       FUNGSI 3: UPDATE STATUS (VERIFIKASI) - DIPERBAIKI
       Bisa via Link (GET) ataupun Form (POST)
       Link: admin/transaksi/update_status/ID/STATUS
    ========================================================== */
    public function update_status($id_transaksi = null, $status = null)
    {
        // 1. Cek apakah data dikirim lewat Link (GET)?
        // Jika $id_transaksi & $status terisi dari parameter fungsi, berarti dari Link.
        
        // 2. Jika kosong, Coba ambil dari Form (POST)
        if ($id_transaksi == null && $status == null) {
            $id_transaksi = $this->input->post('id_transaksi');
            $status       = $this->input->post('status');
        }

        // 3. Validasi Akhir: Jika masih kosong juga, tendang balik
        if (empty($id_transaksi) || empty($status)) {
            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-warning">Gagal update: ID atau Status tidak terbaca.</div>');
            redirect('admin/transaksi/penjualan');
        }

        // 4. Bersihkan Status (Decode URL)
        // Mengubah "Sedang%20Dikirim" menjadi "Sedang Dikirim"
        $status_bersih = urldecode($status);

        // 5. Panggil Model Update
        $this->M_transaksi->update_status($id_transaksi, $status_bersih);

        // 6. Pesan Sukses
        $this->session->set_flashdata('pesan', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Status Transaksi <strong>#'.$id_transaksi.'</strong> berhasil diubah menjadi <strong>'.$status_bersih.'</strong>!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

        redirect('admin/transaksi/penjualan'); 
    }
}