<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('admin/templates/sidebar'); ?>

<style>
    /* Warna tema krem dan biru muda */
    :root {
        --cream-bg: #F8F4EA;
        --cream-card: #FFFDF6;
        --blue-light: #E3F2FD;
        --blue-primary: #42A5F5;
        --blue-dark: #1976D2;
        --blue-hover: #64B5F6;
        --gray-text: #424242;
        --gray-border: #E0E0E0;
        --success-light: #E8F5E9;
        --success-dark: #2E7D32;
        --shadow-light: 0 4px 12px rgba(66, 165, 245, 0.08);
        --shadow-medium: 0 6px 20px rgba(66, 165, 245, 0.12);
    }
    
    body {
        background-color: var(--cream-bg);
    }
    
    /* Header Dashboard */
    h3 {
        color: var(--blue-dark);
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid var(--blue-primary);
        position: relative;
        font-size: 1.8rem;
    }
    
    h3::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, var(--blue-primary), var(--blue-hover));
        border-radius: 3px;
    }
    
    /* Alert Welcome */
    .alert-success {
        background: linear-gradient(135deg, var(--success-light), #F1F8E9);
        border: none;
        border-left: 4px solid var(--success-dark);
        border-radius: 10px;
        color: var(--success-dark);
        padding: 1.25rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-light);
        font-size: 1.05rem;
    }
    
    .alert-success b {
        color: var(--blue-dark);
        font-weight: 700;
    }
    
    /* Card Styling */
    .card {
        background: var(--cream-card);
        border: none;
        border-radius: 15px;
        box-shadow: var(--shadow-light);
        transition: all 0.3s ease;
        overflow: hidden;
        border-top: 4px solid var(--blue-primary);
        height: 100%;
        margin-bottom: 1.5rem;
    }
    
    .card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-medium);
        border-top-color: var(--blue-hover);
    }
    
    .card-body {
        padding: 1.75rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 180px;
    }
    
    .card h5 {
        color: var(--blue-dark);
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 0.75rem;
        text-align: center;
    }
    
    .card p {
        color: var(--gray-text);
        margin-bottom: 1.25rem;
        text-align: center;
        font-size: 0.95rem;
        line-height: 1.5;
        opacity: 0.8;
    }
    
    /* Button Styling */
    .btn-sm {
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
        border: none;
        background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
        color: white;
        min-width: 100px;
        box-shadow: 0 4px 8px rgba(66, 165, 245, 0.25);
    }
    
    .btn-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(66, 165, 245, 0.35);
        background: linear-gradient(135deg, var(--blue-hover), var(--blue-primary));
        color: white;
    }
    
    /* Row dan Column Layout */
    .row {
        margin: 0 -10px;
    }
    
    .col-md-4 {
        padding: 0 10px;
    }
    
    /* Ikon visual untuk card */
    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--blue-primary), var(--blue-hover));
    }
    
    .card:nth-child(1) .card-body::before {
        content: '📦';
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
    }
    
    .card:nth-child(2) .card-body::before {
        content: '🏷️';
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
    }
    
    .card:nth-child(3) .card-body::before {
        content: '💳';
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
    }
    
    /* Responsif */
    @media (max-width: 768px) {
        .col-md-4 {
            margin-bottom: 1rem;
        }
        
        .card-body {
            padding: 1.5rem;
            min-height: 160px;
        }
        
        .card h5 {
            font-size: 1.2rem;
        }
        
        h3 {
            font-size: 1.6rem;
        }
    }
    
    /* Animasi */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .card {
        animation: fadeInUp 0.5s ease forwards;
    }
    
    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    
    /* Stats Badge (opsional) */
    .stats-badge {
        position: absolute;
        top: -10px;
        right: 10px;
        background: var(--blue-primary);
        color: white;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
</style>

<div class="container-fluid mt-4">
    <h3>Dashboard</h3>
    
    <div class="alert alert-success">
        Selamat datang, <b><?= $this->session->userdata('admin_nama'); ?></b>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5>Produk</h5>
                    <p>Manajemen Produk</p>
                    <a href="<?= base_url('admin/produk'); ?>" class="btn btn-sm btn-primary">
                        Kelola
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5>Kategori</h5>
                    <p>Manajemen Kategori</p>
                    <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-sm btn-primary">
                        Kelola
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5>Transaksi</h5>
                    <p>Verifikasi Pembayaran</p>
                    <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-sm btn-primary">
                        Lihat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/templates/footer'); ?>