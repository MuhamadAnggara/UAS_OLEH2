<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
    }

    public function index()
    {
        // Produk unggulan saja (4)
        $data['produk'] = $this->M_produk->get_limit(4);

        $this->load->view('templates/header');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
