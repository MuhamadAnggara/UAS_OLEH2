<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');

        // Proteksi admin (aktifkan jika login sudah siap)
        /*
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        */
    }

    public function index()
    {
        $data['kategori'] = $this->M_kategori->get_all();
        $this->load->view('admin/kategori/index', $data);
    }

    public function tambah()
    {
        $this->load->view('admin/kategori/tambah');
    }

    public function simpan()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori', true)
        ];

        $this->M_kategori->insert($data);
        redirect('admin/kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->M_kategori->get_by_id($id);

        if (!$data['kategori']) {
            show_404();
        }

        $this->load->view('admin/kategori/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori', true)
        ];

        $this->M_kategori->update($id, $data);
        redirect('admin/kategori');
    }

    public function hapus($id)
    {
        $this->M_kategori->delete($id);
        redirect('admin/kategori');
    }
}
