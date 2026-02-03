<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_produk');
    }

    /* =========================
       TAMPILKAN KERANJANG
       ========================== */
    public function index()
    {
        $cart = $this->session->userdata('cart');
        if (!is_array($cart)) {
            $cart = [];
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        $data['cart']  = $cart;
        $data['total'] = $total;

        $this->load->view('templates/header');
        $this->load->view('cart/index', $data);
        $this->load->view('templates/footer');
    }

    /* =========================
       TAMBAH KE KERANJANG
       ========================== */
    public function tambah($id_produk)
    {
        $produk = $this->M_produk->get_by_id($id_produk);
        if (!$produk) {
            redirect('home');
            return;
        }

        $cart = $this->session->userdata('cart');
        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$id_produk])) {
            $cart[$id_produk]['qty'] += 1;
        } else {
            $cart[$id_produk] = [
                'id_produk' => $produk->id_produk,
                'nama'      => $produk->nama_produk,
                'harga'     => $produk->harga,
                'qty'       => 1
            ];
        }

        $this->session->set_userdata('cart', $cart);
        redirect('cart');
    }

    /* =========================
       UPDATE QTY
       ========================== */
    public function update()
    {
        $id_produk = $this->input->post('id_produk');
        $qty       = (int)$this->input->post('qty');

        $cart = $this->session->userdata('cart');
        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$id_produk])) {
            if ($qty <= 0) {
                unset($cart[$id_produk]);
            } else {
                $cart[$id_produk]['qty'] = $qty;
            }
        }

        $this->session->set_userdata('cart', $cart);
        redirect('cart');
    }

    /* =========================
       HAPUS ITEM
       ========================== */
    public function hapus($id_produk)
    {
        $cart = $this->session->userdata('cart');
        if (is_array($cart) && isset($cart[$id_produk])) {
            unset($cart[$id_produk]);
            $this->session->set_userdata('cart', $cart);
        }

        redirect('cart');
    }
}
