<?php
// Gabungkan semua komponen template admin Anda
$this->load->view('admin/layout/header'); // Jika ada
$this->load->view('admin/layout/sidebar'); // Jika ada
$this->load->view($isi); // Ini akan memanggil konten laporan
$this->load->view('admin/layout/footer'); // Jika ada
?>