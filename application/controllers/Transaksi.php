<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load Model, Helper, dan Library
        $this->load->database(); 
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->helper(['form', 'url']);

        // 1. CEK LOGIN (Support session lama 'id_user' atau baru 'id_customer')
        if (!$this->session->userdata('id_customer') && !$this->session->userdata('id_user')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan Login Terlebih Dahulu!</div>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->riwayat();
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Belanja';
        
        // Ambil ID dari session (Prioritas id_customer)
        $id_customer = $this->session->userdata('id_customer') ? $this->session->userdata('id_customer') : $this->session->userdata('id_user');
        
        $data['sudah_login'] = $id_customer; 

        // Ambil Data Transaksi
        $this->db->select('*');
        $this->db->from('transaksi');
        
        // HANYA cek kolom 'id_customer'. 
        $this->db->where('id_customer', $id_customer);
        
        $this->db->order_by('tanggal', 'DESC');
        
        // Return sebagai OBJECT (result)
        $data['transaksi'] = $this->db->get()->result(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data); 
        $this->load->view('transaksi/riwayat', $data); 
        $this->load->view('templates/footer');
    }

    public function detail($id_transaksi)
    {
        $data['title'] = 'Detail Transaksi';
        
        $id_customer = $this->session->userdata('id_customer') ? $this->session->userdata('id_customer') : $this->session->userdata('id_user');
        $data['sudah_login'] = $id_customer;

        // ==========================================
        // PERBAIKAN PENTING DI SINI (JOIN CUSTOMER)
        // ==========================================
        // Kita harus Join ke tabel customer agar bisa mengambil: Nama, Alamat, No HP
        $this->db->select('transaksi.*, customer.nama_customer, customer.alamat, customer.no_hp, customer.email');
        $this->db->from('transaksi');
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        
        $transaksi = $this->db->get()->row();

        // Security Check: Pastikan data ditemukan DAN milik customer yang sedang login
        if (!$transaksi || $transaksi->id_customer != $id_customer) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data tidak ditemukan atau bukan milik Anda!</div>');
            redirect('transaksi/riwayat');
        }
        
        $data['transaksi'] = $transaksi;

        // 2. Ambil Detail Barang
        $this->db->select('td.*, p.nama_produk, p.gambar');
        $this->db->from('transaksi_detail td');
        $this->db->join('produk p', 'td.id_produk = p.id_produk', 'left');
        $this->db->where('td.id_transaksi', $id_transaksi);
        $data['detail'] = $this->db->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data); 
        $this->load->view('transaksi/detail', $data); 
        $this->load->view('templates/footer');
    }

    public function pembayaran($id_transaksi)
    {
        $data['title'] = 'Konfirmasi Pembayaran';
        
        $id_customer = $this->session->userdata('id_customer') ? $this->session->userdata('id_customer') : $this->session->userdata('id_user');
        $data['sudah_login'] = $id_customer;

        $data['transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row();
        
        // Security check
        if(!$data['transaksi'] || $data['transaksi']->id_customer != $id_customer){
             redirect('transaksi/riwayat');
        }

        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim'); 

        if (empty($_FILES['bukti_bayar']['name'])) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('transaksi/pembayaran', $data); 
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/bukti_bayar/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size']      = 4096; 
            $config['encrypt_name']  = TRUE; // Nama file diacak otomatis

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_bayar')) {
                $this->session->set_flashdata('pesan', 
                    '<div class="alert alert-danger">Upload Gagal: '. $this->upload->display_errors() .'</div>');
                redirect('transaksi/pembayaran/'.$id_transaksi);
            } else {
                $gambar_upload = $this->upload->data('file_name');

                $data_update = array(
                    'bukti_bayar' => $gambar_upload,
                    'bukti'       => $gambar_upload, // Jaga-jaga jika ada 2 kolom
                    'status'      => 'Pending' 
                );

                $this->db->where('id_transaksi', $id_transaksi);
                $this->db->update('transaksi', $data_update);

                $this->session->set_flashdata('pesan', 
                    '<div class="alert alert-success">Bukti Berhasil Diupload! Menunggu Verifikasi Admin.</div>');
                redirect('transaksi/riwayat'); 
            }
        }
    }
}