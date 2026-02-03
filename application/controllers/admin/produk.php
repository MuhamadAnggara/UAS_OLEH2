<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_produk');
        $this->load->model('M_kategori');
    }

    /* ========================
       TAMPIL DATA PRODUK (ADMIN)
       ======================== */
    public function index()
    {
        // 🔥 WAJIB pakai function ADMIN (JOIN kategori)
        $data['produk'] = $this->M_produk->get_all_admin();
        $this->load->view('admin/produk/index', $data);
    }

    /* ========================
       FORM TAMBAH PRODUK
       ======================== */
    public function tambah()
    {
        $data['kategori'] = $this->M_kategori->get_all();
        $this->load->view('admin/produk/tambah', $data);
    }

    /* ========================
       SIMPAN PRODUK
       ======================== */
    public function simpan()
    {
        $config['upload_path']   = './assets/images/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload');
        $this->upload->initialize($config);

        $gambar = null;
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }
        }

        // 🔒 FIX FORMAT HARGA
        $harga = str_replace(['.', ','], '', $this->input->post('harga'));

        $data = [
            'nama_produk' => $this->input->post('nama_produk', true),
            'id_kategori' => (int) $this->input->post('id_kategori'),
            'harga'       => (int) $harga,
            'stok'        => (int) $this->input->post('stok'),
            'deskripsi'   => $this->input->post('deskripsi', true),
            'gambar'      => $gambar
        ];

        $this->M_produk->insert($data);
        redirect('admin/produk');
    }

    /* ========================
       FORM EDIT PRODUK
       ======================== */
    public function edit($id)
    {
        $data['produk']   = $this->M_produk->get_by_id($id);
        $data['kategori'] = $this->M_kategori->get_all();

        if (!$data['produk']) {
            show_404();
        }

        $this->load->view('admin/produk/edit', $data);
    }

    /* ========================
       UPDATE PRODUK
       ======================== */
    public function update($id)
    {
        $produk = $this->M_produk->get_by_id($id);
        if (!$produk) {
            show_404();
        }

        $harga = str_replace(['.', ','], '', $this->input->post('harga'));

        $data = [
            'nama_produk' => $this->input->post('nama_produk', true),
            'id_kategori' => (int) $this->input->post('id_kategori'),
            'harga'       => (int) $harga,
            'stok'        => (int) $this->input->post('stok'),
            'deskripsi'   => $this->input->post('deskripsi', true)
        ];

        $this->M_produk->update($id, $data);
        redirect('admin/produk');
    }

    /* ========================
       HAPUS PRODUK
       ======================== */
    public function hapus($id)
    {
        $produk = $this->M_produk->get_by_id($id);

        if ($produk && !empty($produk->gambar)) {
            $path = './assets/images/produk/' . $produk->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->M_produk->delete($id);
        redirect('admin/produk');
    }
}
