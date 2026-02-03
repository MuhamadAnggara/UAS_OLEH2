<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // 🔐 Proteksi Login Admin
        if (!$this->session->userdata('admin_login')) {
            redirect('admin/auth/login');
            exit;
        }

        $this->load->model('M_customer');
    }

    public function index()
    {
        // 1. Ambil Data (Database sudah diperbaiki di Model)
        $data['customer'] = $this->M_customer->get_all();
        $data['title']    = 'Data Customer';

        // 2. Load View
        // Kita hapus bagian header/sidebar yang bikin error tadi.
        // Langsung load file intinya saja.
        $this->load->view('admin/customer/index', $data);
    }

    // Fitur Hapus (Opsional, buat jaga-jaga)
    public function hapus($id)
    {
        $this->M_customer->delete($id);
        $this->session->set_flashdata('success', 'Data customer berhasil dihapus');
        redirect('admin/customer');
    }
}