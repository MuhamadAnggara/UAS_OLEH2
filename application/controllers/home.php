<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
    }

    public function index()
    {
        // HANYA ambil produk terbatas untuk HOME
        $data['produk'] = $this->M_produk->get_limit(4);

        $this->load->view('templates/header');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
