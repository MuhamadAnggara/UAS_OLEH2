<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // Kita hanya butuh M_user karena di dalamnya sudah logic ke tabel customer/admin
        $this->load->model('M_user'); 
    }

    /* =========================
       LOGIN FORM
    ========================== */
    public function login()
    {
        // Cek jika sudah login
        if ($this->session->userdata('logged_in') === TRUE) {
            if ($this->session->userdata('role') === 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('home');
            }
            exit;
        }

        $this->load->view('auth/login');
    }

    /* =========================
       PROSES LOGIN
    ========================== */
    public function proses_login()
    {
        $username = trim($this->input->post('username', TRUE));
        $password = trim($this->input->post('password', TRUE));

        // 1. Validasi Input Kosong
        if ($username === '' || $password === '') {
            $this->session->set_flashdata('error', 'Username dan password wajib diisi.');
            redirect('auth/login');
            exit;
        }

        // 2. Cek User via Model (Mengecek Admin dulu, lalu Customer)
        $user = $this->M_user->login($username, md5($password));

        // 3. Jika Gagal Login
        if (!$user) {
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('auth/login');
            exit;
        }

        // 4. Jika Berhasil, Set Session
        $this->session->sess_regenerate(TRUE);
        $this->session->set_userdata(array(
            'id_user'   => $user->id_user,   // Ini otomatis ambil id_admin atau id_customer
            'username'  => $user->username,
            'role'      => $user->role,      // 'admin' atau 'user'
            'logged_in' => TRUE
        ));

        // 5. Validasi Khusus: Admin tidak boleh belanja di halaman depan
        // (Opsional: tergantung kebijakan sistem kamu)
        /* if ($user->role === 'admin') {
             // Jika ingin admin login khusus di /admin/login, aktifkan blok ini
        } 
        */

        // 6. Redirect Cerdas
        // Jika user tadi dipaksa login saat checkout, kembalikan ke checkout
        if ($this->session->userdata('redirect_after_login')) {
            $redirect = $this->session->userdata('redirect_after_login');
            $this->session->unset_userdata('redirect_after_login');
            redirect($redirect);
        } else {
            // Default Redirect
            if ($user->role === 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('home');
            }
        }
        exit;
    }

    /* =========================
       REGISTER FORM
    ========================== */
    public function register()
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            redirect('home');
            exit;
        }
        $this->load->view('auth/register');
    }

    /* =========================
       PROSES REGISTER
    ========================== */
    public function proses_register()
    {
        $username = trim($this->input->post('username', TRUE));
        $password = trim($this->input->post('password', TRUE));

        // 1. Validasi Input
        if ($username === '' || $password === '') {
            $this->session->set_flashdata('error', 'Username dan password wajib diisi.');
            redirect('auth/register');
            exit;
        }

        // 2. Cek apakah username sudah dipakai
        if ($this->M_user->get_user_by_username($username)) {
            $this->session->set_flashdata('error', 'Username sudah terdaftar.');
            redirect('auth/register');
            exit;
        }

        // 3. Simpan ke Database (Tabel Customer)
        // Kita tidak perlu memisah users & customer lagi. Langsung satu tabel.
        $data_customer = array(
            'username'      => $username,
            'password'      => md5($password),
            'nama_customer' => $username, // Default nama disamakan dengan username
            'email'         => '',        // Kosongkan dulu (bisa diupdate di profil)
            'no_hp'         => '',
            'alamat'        => ''
        );

        // Panggil insert_user di M_user (yang mengarah ke tabel customer)
        $simpan = $this->M_user->insert_user($data_customer);

        if ($simpan) {
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan sistem saat mendaftar.');
            redirect('auth/register');
        }
        
        exit;
    }

    /* =========================
       LOGOUT
    ========================== */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
        exit;
    }
}