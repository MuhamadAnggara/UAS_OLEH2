<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
    }

    /**
     * HALAMAN LIST SEMUA PRODUK
     * URL: /produk
     */
    public function index()
    {
        // SEMUA produk hanya di halaman ini
        $data['produk'] = $this->M_produk->get_all();

        $this->load->view('templates/header');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * HALAMAN DETAIL PRODUK
     * URL: /produk/detail/{id}
     */
    public function detail($id = null)
    {
        // Validasi ID (AMAN)
        $id = (int) $id;
        if ($id <= 0) {
            show_404();
        }

        // Ambil data produk
        $produk = $this->M_produk->get_by_id($id);
        if (!$produk) {
            show_404();
        }

        /**
         * LOGIKA TOMBOL KEMBALI
         * - Jika dari halaman produk → kembali ke /produk
         * - Selain itu → kembali ke home
         */
        $referer  = $this->input->server('HTTP_REFERER');
        $base     = base_url();
        $back_url = base_url();

        if ($referer && strpos($referer, $base) !== false && strpos($referer, '/produk') !== false) {
            $back_url = base_url('produk');
        }

        // Kirim data ke view
        $data = [
            'produk'   => $produk,
            'back_url' => $back_url
        ];

        $this->load->view('templates/header');
        $this->load->view('produk/produk_detail', $data);
        $this->load->view('templates/footer');
    }
}
