<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Oleh-Oleh Khas Malang</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<?php
// AMBIL INSTANCE CI (WAJIB DI VIEW)
$CI =& get_instance();
$CI->load->library('session');

// CART
$cart = $CI->session->userdata('cart');
$jumlah_cart = 0;
if (is_array($cart)) {
    foreach ($cart as $item) {
        $jumlah_cart += $item['qty'];
    }
}

// USER
$id_user  = $CI->session->userdata('id_user');
$username = $CI->session->userdata('username');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url() ?>">
            Oleh-Oleh Malang
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('produk') ?>">Produk</a>
                </li>

                <!-- KERANJANG -->
                <li class="nav-item ms-3">
                    <a class="nav-link position-relative" href="<?= base_url('cart') ?>">
                        🛒 Keranjang
                        <?php if ($jumlah_cart > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle
                                         badge rounded-pill bg-danger">
                                <?= $jumlah_cart ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>

                <!-- USER LOGIN -->
                <?php if ($id_user): ?>
                    <li class="nav-item dropdown ms-4">
                        <a class="nav-link dropdown-toggle text-white"
                           href="#"
                           id="navbarProfile"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            👤 <?= htmlspecialchars($username) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('transaksi') ?>">
                                    Riwayat Transaksi
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger"
                                   href="<?= base_url('logout') ?>"
                                   onclick="return confirm('Yakin ingin logout?')">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-sm btn-outline-light"
                           href="<?= base_url('register') ?>">Register</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
