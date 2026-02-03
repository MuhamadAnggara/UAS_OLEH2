<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model untuk mengambil data transaksi & pembelian
        $this->load->model('M_laporan');
        
        // Opsional: Cek apakah user sudah login sebagai admin
        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url("login"));
        // }
    }

    // =======================================================================
    // BAGIAN 1: LAPORAN PEMBELIAN (Barang Masuk dari Supplier)
    // =======================================================================

    // 1. Tampil Halaman Pembelian Harian
    public function pembelian_harian() {
        $tanggal = $this->input->post('tanggal');
        if (empty($tanggal)) {
            $tanggal = date('Y-m-d'); // Default hari ini
        }

        $data = [
            'judul'   => 'Laporan Pembelian Harian',
            'tanggal' => $tanggal,
            'laporan' => $this->M_laporan->get_pembelian_harian($tanggal)
        ];

        $this->load->view('admin/laporan/pembelian_harian', $data);
    }

    // 2. Tampil Halaman Pembelian Bulanan
    public function pembelian_bulanan() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if (empty($bulan)) {
            $bulan = date('m'); // Default bulan ini
        }
        if (empty($tahun)) {
            $tahun = date('Y'); // Default tahun ini
        }

        $data = [
            'judul'   => 'Laporan Pembelian Bulanan',
            'bulan'   => $bulan,
            'tahun'   => $tahun,
            'laporan' => $this->M_laporan->get_pembelian_bulanan($bulan, $tahun)
        ];

        $this->load->view('admin/laporan/pembelian_bulanan', $data);
    }

    // 3. Export PDF Pembelian
    public function export_pdf_pembelian_harian($tgl) {
        $data['laporan'] = $this->M_laporan->get_pembelian_harian($tgl);
        $data['tanggal'] = $tgl;
        $this->load->view('admin/laporan/print_pembelian_harian', $data);
    }

    public function export_pdf_pembelian_bulanan($bulan, $tahun) {
        $data['laporan'] = $this->M_laporan->get_pembelian_bulanan($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $this->load->view('admin/laporan/print_pembelian_bulanan', $data);
    }

    // 4. Export Excel Pembelian
    public function export_excel_pembelian_harian($tgl) {
        $data['laporan'] = $this->M_laporan->get_pembelian_harian($tgl);
        $data['tanggal'] = $tgl;
        $this->load->view('admin/laporan/excel_pembelian_harian', $data);
    }

    public function export_excel_pembelian_bulanan($bulan, $tahun) {
        $data['laporan'] = $this->M_laporan->get_pembelian_bulanan($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $this->load->view('admin/laporan/excel_pembelian_bulanan', $data);
    }


    // =======================================================================
    // BAGIAN 2: LAPORAN PENJUALAN (Transaksi Customer) - BARU DITAMBAHKAN
    // =======================================================================

    // 1. Tampil Halaman Penjualan Harian
    public function penjualan_harian() {
        $tanggal = $this->input->post('tanggal');
        if (empty($tanggal)) {
            $tanggal = date('Y-m-d');
        }

        $data = [
            'judul'   => 'Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'laporan' => $this->M_laporan->get_penjualan_harian($tanggal)
        ];

        $this->load->view('admin/laporan/penjualan_harian', $data);
    }

    // 2. Tampil Halaman Penjualan Bulanan
    public function penjualan_bulanan() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if (empty($bulan)) {
            $bulan = date('m');
        }
        if (empty($tahun)) {
            $tahun = date('Y');
        }

        $data = [
            'judul'   => 'Laporan Penjualan Bulanan',
            'bulan'   => $bulan,
            'tahun'   => $tahun,
            'laporan' => $this->M_laporan->get_penjualan_bulanan($bulan, $tahun)
        ];

        $this->load->view('admin/laporan/penjualan_bulanan', $data);
    }

    // 3. Export PDF Penjualan
    public function export_pdf_penjualan_harian($tgl) {
        $data['laporan'] = $this->M_laporan->get_penjualan_harian($tgl);
        $data['tanggal'] = $tgl;
        $this->load->view('admin/laporan/print_penjualan_harian', $data);
    }

    public function export_pdf_penjualan_bulanan($bulan, $tahun) {
        $data['laporan'] = $this->M_laporan->get_penjualan_bulanan($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $this->load->view('admin/laporan/print_penjualan_bulanan', $data);
    }

    // 4. Export Excel Penjualan
    public function export_excel_penjualan_harian($tgl) {
        $data['laporan'] = $this->M_laporan->get_penjualan_harian($tgl);
        $data['tanggal'] = $tgl;
        $this->load->view('admin/laporan/excel_penjualan_harian', $data);
    }

    public function export_excel_penjualan_bulanan($bulan, $tahun) {
        $data['laporan'] = $this->M_laporan->get_penjualan_bulanan($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $this->load->view('admin/laporan/excel_penjualan_bulanan', $data);
    }

}