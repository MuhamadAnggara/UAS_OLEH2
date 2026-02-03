<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Oleh-Oleh Malang</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --sidebar-bg: #1a1d29;
            --sidebar-hover: #2a2f3e;
            --sidebar-active: #3498db;
            --sidebar-text: #ecf0f1;
            --sidebar-border: #2c3e50;
            --sidebar-header: #151824;
            --content-bg: #f8f9fa;
        }

        body {
            margin:0;
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
            background-color:var(--content-bg);
            overflow-x:hidden;
        }

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:linear-gradient(180deg,var(--sidebar-bg),#1e212e);
            color:var(--sidebar-text);
            box-shadow:0 0 20px rgba(0,0,0,.3);
            z-index:1000;
            overflow-y:auto;
        }

        .sidebar-header{
            padding:25px 20px;
            text-align:center;
            background:var(--sidebar-header);
            border-bottom:1px solid var(--sidebar-border);
        }

        .sidebar-header h4{
            margin:0;
            font-weight:700;
            font-size:1.4rem;
            color:white;
        }

        .sidebar-nav{padding:20px 0}

        .sidebar a{
            display:flex;
            align-items:center;
            padding:14px 24px;
            color:var(--sidebar-text);
            text-decoration:none;
            transition:.3s;
            font-size:.95rem;
            font-weight:500;
            margin:5px 12px;
            border-radius:8px;
            cursor:pointer;
        }

        .sidebar a i{
            width:24px;
            margin-right:12px;
            font-size:1.1rem;
            text-align:center;
        }

        .sidebar a:hover{
            background:var(--sidebar-hover);
            color:white;
        }

        .sidebar a.text-danger{
            color:#e74c3c!important;
            background:rgba(231,76,60,.1);
        }

        .sidebar a.text-danger:hover{
            background:rgba(231,76,60,.2);
        }

        .submenu{
            display:none;
            background:rgba(0,0,0,0.2);
            margin-bottom:5px;
        }

        .submenu.show{
            display:block;
        }

        .submenu a{
            font-size:.9rem;
            padding-left:55px;
        }

        .user-info{
            padding:15px 20px;
            border-top:1px solid var(--sidebar-border);
            display:flex;
            gap:12px;
            background:rgba(255,255,255,.05);
        }

        .user-avatar{
            width:40px;
            height:40px;
            border-radius:50%;
            background:linear-gradient(135deg,var(--sidebar-active),#8e44ad);
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
        }

        .content{
            margin-left:260px;
            padding:25px 30px;
            min-height:100vh;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h4>Admin Panel</h4>
    </div>

    <div class="sidebar-nav">

        <!-- DASHBOARD -->
        <a href="<?= base_url('admin/dashboard') ?>">
            <i class="fas fa-home"></i>
            Dashboard
        </a>

        <!-- DATA MASTER -->
        <a onclick="toggleMenu('dataMasterMenu')">
            <i class="fas fa-database"></i>
            Data Master
            <i class="fas fa-chevron-down ml-auto" style="font-size:0.8rem;"></i>
        </a>

        <div class="submenu" id="dataMasterMenu">
            <a href="<?= base_url('admin/produk') ?>"><i class="fas fa-box"></i> Produk</a>
            <a href="<?= base_url('admin/kategori') ?>"><i class="fas fa-tags"></i> Kategori</a>
            <a href="<?= base_url('admin/customer') ?>"><i class="fas fa-users"></i> Customer</a>
            <a href="<?= base_url('admin/supplier') ?>"><i class="fas fa-truck"></i> Supplier</a>
        </div>

        <!-- TRANSAKSI -->
        <a onclick="toggleMenu('transaksiMenu')">
            <i class="fas fa-money-bill-wave"></i>
            Transaksi
            <i class="fas fa-chevron-down ml-auto" style="font-size:0.8rem;"></i>
        </a>

        <div class="submenu" id="transaksiMenu">
            <a href="<?= base_url('admin/transaksi/penjualan') ?>">
                <i class="fas fa-shopping-cart"></i> Data Penjualan
            </a>
            <a href="<?= base_url('admin/pembelian') ?>">
                <i class="fas fa-cart-plus"></i> Data Pembelian
            </a>
        </div>

        <!-- LAPORAN -->
        <a onclick="toggleMenu('laporanMenu')">
            <i class="fas fa-file-alt"></i>
            Laporan
            <i class="fas fa-chevron-down ml-auto" style="font-size:0.8rem;"></i>
        </a>

        <div class="submenu" id="laporanMenu">

            <a onclick="toggleMenu('laporanPembelianMenu')">
                <i class="fas fa-cart-plus"></i>
                Laporan Pembelian
                <i class="fas fa-chevron-down ml-auto" style="font-size:0.7rem;"></i>
            </a>

            <div class="submenu" id="laporanPembelianMenu">
                <a href="<?= base_url('admin/laporan/pembelian_harian') ?>">
                    <i class="fas fa-calendar-day"></i> Harian
                </a>
                <a href="<?= base_url('admin/laporan/pembelian_bulanan') ?>">
                    <i class="fas fa-calendar-alt"></i> Bulanan
                </a>
            </div>

            <a onclick="toggleMenu('laporanPenjualanMenu')">
                <i class="fas fa-shopping-cart"></i>
                Laporan Penjualan
                <i class="fas fa-chevron-down ml-auto" style="font-size:0.7rem;"></i>
            </a>

            <div class="submenu" id="laporanPenjualanMenu">
                <a href="<?= base_url('admin/laporan/penjualan_harian') ?>">
                    <i class="fas fa-calendar-day"></i> Harian
                </a>
                <a href="<?= base_url('admin/laporan/penjualan_bulanan') ?>">
                    <i class="fas fa-calendar-alt"></i> Bulanan
                </a>
            </div>

        </div>

        <hr style="border-color:var(--sidebar-border);">

        <!-- LOGOUT -->
        <a href="<?= base_url('auth/logout') ?>" class="text-danger"
           onclick="return confirm('Yakin ingin keluar?');">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>

    </div>

    <div class="user-info">
        <div class="user-avatar">
            <i class="fas fa-user-shield"></i>
        </div>
        <div>
            <strong><?= $this->session->userdata('nama_lengkap') ?: 'Administrator' ?></strong><br>
            <small class="text-success">
                <i class="fas fa-circle" style="font-size:8px"></i> Online
            </small>
        </div>
    </div>
</div>

<div class="content">

<script>
function toggleMenu(menuId){
    var menu = document.getElementById(menuId);
    menu.classList.toggle('show');
}
</script>

</body>
</html>
