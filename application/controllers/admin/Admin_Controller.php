<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // CEK LOGIN ADMIN
        if (!$this->session->userdata('id_user') ||
            $this->session->userdata('role') != 'admin') {
            redirect('admin/auth/login');
        }
    }
}
