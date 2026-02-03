<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_supplier');

        // OPTIONAL: proteksi login admin
        // if ($this->session->userdata('role') != 'admin') {
        //     redirect('auth');
        // }
    }

    /* ========================
       DATA SUPPLIER
       ======================== */
    public function index()
    {
        $data['supplier'] = $this->M_supplier->get_all();
        $this->load->view('admin/supplier/index', $data);
    }

    /* ========================
       FORM TAMBAH SUPPLIER
       ======================== */
    public function tambah()
    {
        $this->load->view('admin/supplier/tambah');
    }

    /* ========================
       SIMPAN SUPPLIER
       ======================== */
    public function simpan()
    {
        $data = [
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat'        => $this->input->post('alamat', true),
            'no_telepon'    => $this->input->post('no_hp', true), // 🔥 FIX UTAMA
            'email'         => $this->input->post('email', true)
        ];

        $this->M_supplier->insert($data);
        redirect('admin/supplier');
    }

    /* ========================
       FORM EDIT SUPPLIER
       ======================== */
    public function edit($id)
    {
        $data['supplier'] = $this->M_supplier->get_by_id($id);

        if (!$data['supplier']) {
            show_404();
        }

        $this->load->view('admin/supplier/edit', $data);
    }

    /* ========================
       UPDATE SUPPLIER
       ======================== */
    public function update()
    {
        $id = (int) $this->input->post('id_supplier');

        $data = [
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat'        => $this->input->post('alamat', true),
            'no_telepon'    => $this->input->post('no_hp', true), // 🔥 FIX UTAMA
            'email'         => $this->input->post('email', true)
        ];

        $this->M_supplier->update($id, $data);
        redirect('admin/supplier');
    }

    /* ========================
       HAPUS SUPPLIER
       ======================== */
    public function hapus($id)
    {
        $this->M_supplier->delete((int)$id);
        redirect('admin/supplier');
    }
}
