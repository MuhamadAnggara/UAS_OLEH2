<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('session');
    }

    public function login()
    {
        // Jika sudah login, lempar ke dashboard
        if ($this->session->userdata('admin_login')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        // Pastikan password di-MD5 karena di database kamu passwordnya terenkripsi MD5
        // (Berdasarkan data dummy di file SQL kamu)
        $cek_admin = $this->M_admin->login($username, md5($password));

        if ($cek_admin) {
            // LOGIN BERHASIL
            $this->session->set_userdata([
                'admin_id'    => $cek_admin->id_admin, // Perbaikan: id_user -> id_admin
                'admin_nama'  => $cek_admin->username,
                'role'        => 'admin',
                'admin_login' => TRUE
            ]);
            redirect('admin/dashboard');
        } else {
            // LOGIN GAGAL
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('admin/auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/auth/login');
    }
}