<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penjualan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --cream-light: #f8f6f2;
            --cream-medium: #f1ede5;
            --cream-dark: #e8e2d4;
            --gray-light: #f5f5f5;
            --gray-medium: #e0e0e0;
            --gray-dark: #6d6d6d;
            --gray-darker: #4a4a4a;
            --accent-primary: #8c7b6c;
            --accent-secondary: #a89b8c;
            --text-dark: #3a3a3a;
            --text-light: #7a7a7a;
            --success-color: #5a8c5a;
            --info-color: #4a7a8c;
            --warning-color: #b8954a;
            --danger-color: #a85a5a;
        }
        
        body { 
            background-color: var(--cream-light); 
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        .main-card { 
            border-radius: 12px; 
            border: none; 
            box-shadow: 0 8px 30px rgba(0,0,0,0.05); 
            background-color: #ffffff;
            margin-top: 20px;
            overflow: hidden;
            border: 1px solid var(--cream-dark);
        }
        
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table-custom thead { 
            background-color: var(--accent-primary); 
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .table-custom thead th {
            border: none;
            padding: 18px 15px;
            font-size: 0.95rem;
            text-transform: uppercase;
        }
        
        .table-custom tbody tr {
            transition: all 0.2s ease;
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .table-custom tbody tr:hover {
            background-color: var(--cream-light);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .table-custom td { 
            vertical-align: middle !important; 
            padding: 18px 15px;
            border-top: 1px solid var(--cream-medium);
            color: var(--text-dark);
        }
        
        .table-custom tbody tr:first-child td {
            border-top: 1px solid var(--cream-medium);
        }
        
        .status-badge { 
            padding: 10px 18px; 
            border-radius: 30px; 
            font-weight: 600; 
            font-size: 0.85rem; 
            letter-spacing: 0.5px;
            display: inline-block;
            min-width: 120px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }
        
        .status-pending { 
            background-color: #fff9e6; 
            color: var(--warning-color); 
            border: 2px solid #ffeaa7;
        }
        
        .status-lunas { 
            background-color: #e9f6e9; 
            color: var(--success-color); 
            border: 2px solid #c8e6c9;
        }
        
        .status-dikirim { 
            background-color: #e8f4f8; 
            color: var(--info-color); 
            border: 2px solid #b3e5fc;
        }
        
        .status-selesai { 
            background-color: #f5f5f5; 
            color: var(--gray-darker); 
            border: 2px solid var(--gray-medium);
        }
        
        .status-ditolak { 
            background-color: #fce8e8; 
            color: var(--danger-color); 
            border: 2px solid #ffcdd2;
        }
        
        .card-body {
            padding: 30px !important;
        }
        
        h3.text-dark {
            color: var(--gray-darker) !important;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .text-primary {
            color: var(--accent-primary) !important;
        }
        
        .text-success {
            color: var(--success-color) !important;
        }
        
        .text-danger {
            color: var(--danger-color) !important;
        }
        
        .text-muted {
            color: var(--text-light) !important;
        }
        
        /* Button styling */
        .btn-secondary {
            background-color: var(--gray-darker);
            border-color: var(--gray-darker);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: var(--gray-dark);
            border-color: var(--gray-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn-info {
            background-color: var(--info-color);
            border-color: var(--info-color);
            color: white;
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-primary {
            background-color: var(--accent-secondary);
            border-color: var(--accent-secondary);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-group .btn {
            margin: 0 3px;
            border-radius: 8px !important;
            font-weight: 500;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }
        
        .btn-group .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-responsive {
                border-radius: 8px;
                border: 1px solid var(--cream-medium);
            }
            
            .table-custom thead th,
            .table-custom td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }
            
            .btn-group {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .btn-group .btn {
                margin: 2px;
                padding: 6px 10px;
                font-size: 0.8rem;
            }
            
            .status-badge {
                padding: 8px 12px;
                min-width: 100px;
                font-size: 0.8rem;
            }
        }
        
        /* Flash message styling */
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .main-card {
            animation: fadeIn 0.5s ease-out;
        }
        
        tbody tr {
            animation: fadeIn 0.3s ease;
        }
        
        /* Custom rounded-pill button */
        .rounded-pill {
            padding-left: 25px !important;
            padding-right: 25px !important;
        }
        
        /* Container spacing */
        .container-fluid {
            padding-left: 30px;
            padding-right: 30px;
        }
        
        @media (max-width: 576px) {
            .container-fluid {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .card-body {
                padding: 20px !important;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid px-4">
    
    <div class="mt-3">
        <?= $this->session->flashdata('pesan'); ?>
    </div>

    <div class="card main-card">
        <div class="card-body p-4">
            
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <div class="icon-wrapper rounded-circle p-3 mr-3" style="background-color: var(--cream-medium);">
                        <i class="fas fa-file-invoice-dollar fa-2x" style="color: var(--accent-primary);"></i>
                    </div>
                    <div>
                        <h3 class="font-weight-bold m-0 text-dark">Daftar Transaksi Penjualan</h3>
                        <p class="text-muted mb-0 mt-1">Kelola dan pantau semua transaksi pelanggan</p>
                    </div>
                </div>
                
                <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary rounded-pill px-4 py-2">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                </a>
            </div>
            
            <div class="table-responsive rounded-lg" style="border: 1px solid var(--cream-medium);">
                <table class="table table-hover table-custom mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Customer</th>
                            <th>Total Bayar</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="250">Aksi (Ubah Status)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($penjualan as $p) : ?>
                            
                            <?php 
                                $status_asli = isset($p->status) ? $p->status : 'pending';
                                if(empty($status_asli)) $status_asli = 'pending';
                                $status_lower = strtolower($status_asli); 
                            ?>

                            <tr>
                                <td class="text-center font-weight-bold text-muted"><?= $no++ ?></td>
                                
                                <td class="font-weight-bold text-dark" style="font-size: 1.1rem;">
                                    <span class="badge badge-light px-3 py-2" style="background-color: var(--cream-medium); color: var(--accent-primary);">
                                        <?= $p->id_transaksi ?>
                                    </span>
                                </td>
                                
                                <td>
                                    <span class="d-block"><?= date('d M Y', strtotime($p->tanggal)) ?></span>
                                    <small class="text-muted"><?= date('H:i', strtotime($p->tanggal)) ?></small>
                                </td>
                                
                                <td class="font-weight-bold">
                                    <?= isset($p->nama_customer) ? $p->nama_customer : '<span class="text-danger">User Terhapus</span>' ?>
                                </td>
                                
                                <td class="text-success font-weight-bold" style="font-size: 1.05rem;">
                                    Rp <?= number_format($p->total, 0, ',', '.') ?>
                                </td>
                                
                                <td class="text-center">
                                    <?php 
                                        $css_class = 'secondary';
                                        if (strpos($status_lower, 'pending') !== false) $css_class = 'pending';
                                        elseif (strpos($status_lower, 'lunas') !== false) $css_class = 'lunas';
                                        elseif (strpos($status_lower, 'dikirim') !== false) $css_class = 'dikirim';
                                        elseif (strpos($status_lower, 'selesai') !== false) $css_class = 'selesai';
                                        elseif (strpos($status_lower, 'tolak') !== false) $css_class = 'ditolak';
                                    ?>
                                    <span class="status-badge status-<?= $css_class ?>">
                                        <i class="fas fa-circle mr-2" style="font-size: 8px;"></i>
                                        <?= ucfirst($status_asli) ?>
                                    </span>
                                </td>
                                
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        
                                        <a href="<?= base_url('admin/transaksi/detail/'.$p->id_transaksi) ?>" class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye mr-1"></i> Detail
                                        </a>

                                        <?php if (strpos($status_lower, 'pending') !== false) : ?>
                                            <a href="<?= base_url('admin/transaksi/update_status/'.$p->id_transaksi.'/Lunas') ?>" 
                                               class="btn btn-sm btn-success" 
                                               onclick="return confirm('Verifikasi pembayaran ini?')" title="Terima Pembayaran">
                                               <i class="fas fa-check mr-1"></i> Terima
                                            </a>
                                            <a href="<?= base_url('admin/transaksi/update_status/'.$p->id_transaksi.'/Ditolak') ?>" 
                                               class="btn btn-sm btn-danger" 
                                               onclick="return confirm('Tolak pesanan ini?')" title="Tolak Pesanan">
                                               <i class="fas fa-times"></i>
                                            </a>

                                        <?php elseif (strpos($status_lower, 'lunas') !== false) : ?>
                                            <a href="<?= base_url('admin/transaksi/update_status/'.$p->id_transaksi.'/Dikirim') ?>" 
                                               class="btn btn-sm btn-primary" 
                                               onclick="return confirm('Barang sudah diserahkan ke kurir?')" title="Input Resi / Kirim">
                                               <i class="fas fa-truck mr-1"></i> Kirim
                                            </a>

                                        <?php elseif (strpos($status_lower, 'dikirim') !== false) : ?>
                                            <a href="<?= base_url('admin/transaksi/update_status/'.$p->id_transaksi.'/Selesai') ?>" 
                                               class="btn btn-sm btn-secondary" 
                                               onclick="return confirm('Transaksi Selesai?')" title="Selesaikan">
                                               <i class="fas fa-flag-checkered mr-1"></i> Selesai
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($penjualan)) : ?>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3" style="color: var(--cream-dark) !important;"></i>
                                        <h5 class="text-muted">Data transaksi kosong</h5>
                                        <p class="text-muted small mt-2">Belum ada transaksi yang tercatat</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    // Tambahkan efek hover yang lebih smooth
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.table-custom tbody tr');
        
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
        
        // Tambahkan efek pada tombol
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
    });
</script>

</body>
</html>