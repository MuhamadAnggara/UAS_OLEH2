<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load library dan helper yang dibutuhkan
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'form', 'string']);
        $this->load->database(); 

        // 1. CEK LOGIN
        // Kita cek apakah user sudah login. 
        if (!$this->session->userdata('id_customer') && !$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu sebelum checkout.');
            redirect('auth/login');
        }
    }

    public function index()
    {
        // 2. AMBIL KERANJANG
        $cart = $this->session->userdata('cart');

        // Jika keranjang kosong, tendang ke home
        if (empty($cart) || !is_array($cart)) {
            $this->session->set_flashdata('error', 'Keranjang belanja Anda kosong.');
            redirect('home'); 
        }

        // 3. AMBIL DATA CUSTOMER
        // Kita ambil ID dari session (prioritas id_customer)
        $id_user = $this->session->userdata('id_customer') ? $this->session->userdata('id_customer') : $this->session->userdata('id_user');
        
        $customer = $this->db->get_where('customer', ['id_customer' => $id_user])->row();

        // 4. HITUNG TOTAL
        $total_belanja = 0;
        foreach ($cart as $item) {
            $total_belanja += ($item['harga'] * $item['qty']);
        }

        $data = [
            'title'         => 'Halaman Checkout',
            'cart'          => $cart,
            'total_belanja' => $total_belanja, 
            'customer'      => $customer
        ];

        // Load View
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar'); 
        $this->load->view('checkout/index', $data);
        $this->load->view('templates/footer');
    }

    public function proses()
    {
        // Cek submit form
        if (!$this->input->post('checkout_submit')) {
            redirect('checkout');
        }

        $cart = $this->session->userdata('cart');
        if (empty($cart)) {
            redirect('home');
        }

        // Ambil ID User
        $id_customer = $this->session->userdata('id_customer') ? $this->session->userdata('id_customer') : $this->session->userdata('id_user');

        // ==========================================
        // 1. UPDATE DATA CUSTOMER (PENTING!)
        // ==========================================
        $data_update_customer = [
            'nama_customer' => $this->input->post('nama_customer', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE)
        ];

        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $data_update_customer);

        // ==========================================
        // 2. PROSES UPLOAD BUKTI BAYAR
        // ==========================================
        $file_name_bukti = NULL;

        // Konfigurasi Upload
        $config['upload_path']   = './assets/bukti_bayar/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size']      = 5120; // 5MB
        $config['encrypt_name']  = TRUE; // Nama file diacak agar unik

        $this->upload->initialize($config);

        if ($this->upload->do_upload('bukti')) {
            $upload_data = $this->upload->data();
            $file_name_bukti = $upload_data['file_name'];
        } else {
            // Jika upload gagal (file wajib diupload)
            $error_upload = $this->upload->display_errors();
            $this->session->set_flashdata('error', 'Gagal Upload Bukti: ' . $error_upload);
            redirect('checkout');
            return; // Stop proses
        }

        // ==========================================
        // 3. SIMPAN KE TABEL TRANSAKSI
        // ==========================================
        
        // Hitung ulang total untuk keamanan
        $total_bayar = 0;
        foreach ($cart as $item) {
            $total_bayar += ($item['harga'] * $item['qty']);
        }

        // Siapkan data insert
        // PERBAIKAN DI SINI: Saya menghapus 'id_user' karena kolomnya sudah tidak ada di database
        $data_transaksi = [
            'id_customer' => $id_customer,       // Cukup pakai id_customer
            'total'       => $total_bayar,
            'status'      => 'Pending',
            'bukti'       => $file_name_bukti,
            // Jika di database kamu kolom 'bukti_bayar' masih ada, biarkan baris ini. 
            // Jika sudah dihapus, hapus baris di bawah ini.
            'bukti_bayar' => $file_name_bukti,   
            'tanggal'     => date('Y-m-d H:i:s')
        ];

        if ($this->db->insert('transaksi', $data_transaksi)) {
            // Ambil ID Transaksi yang baru dibuat
            $id_transaksi_baru = $this->db->insert_id();

            // ==========================================
            // 4. SIMPAN DETAIL BARANG (Looping Cart)
            // ==========================================
            $data_detail_batch = [];
            foreach ($cart as $item) {
                
                // Cek nama key ID produk di session cart kamu (kadang 'id', kadang 'id_produk')
                $id_produk_fix = isset($item['id']) ? $item['id'] : (isset($item['id_produk']) ? $item['id_produk'] : 0);

                $data_detail_batch[] = [
                    'id_transaksi' => $id_transaksi_baru,
                    'id_produk'    => $id_produk_fix, 
                    'qty'          => $item['qty'],
                    'harga'        => $item['harga'], 
                    'subtotal'     => ($item['harga'] * $item['qty'])
                ];
                
                // Opsional: Kurangi Stok Produk (Uncomment jika ingin stok berkurang saat checkout)
                 $this->db->set('stok', 'stok-' . $item['qty'], FALSE);
                 $this->db->where('id_produk', $id_produk_fix);
                 $this->db->update('produk');
            }

            // Insert Batch
            if (!empty($data_detail_batch)) {
                $this->db->insert_batch('transaksi_detail', $data_detail_batch);
            }

            // ==========================================
            // 5. BERSIHKAN KERANJANG & SELESAI
            // ==========================================
            $this->session->unset_userdata('cart');
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Pesanan berhasil dibuat! Menunggu verifikasi admin.</div>');
            
            // Arahkan ke Riwayat (Pastikan route/controller ini ada)
            redirect('transaksi/riwayat'); 

        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan sistem saat menyimpan transaksi.');
            redirect('checkout');
        }
    }
}