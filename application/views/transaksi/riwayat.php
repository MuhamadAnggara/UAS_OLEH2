<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Belanja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root {
            --cream-light: #f9f7f2;
            --cream-medium: #f4f0e6;
            --cream-dark: #e8e2d1;
            --gray-light: #f8f9fa;
            --accent-primary: #8b7355;
            --accent-secondary: #a39176;
            --text-dark: #343a40;
            --text-light: #7d6d5a;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        body {
            background-color: var(--cream-light);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Card styling */
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }
        
        /* Table styling */
        .table thead th {
            border-bottom: 2px solid var(--cream-dark);
            font-weight: 600;
            background-color: var(--accent-primary);
            color: white;
            border: none;
        }
        
        .badge {
            font-weight: 500;
            padding: 0.5em 1em;
            min-width: 140px;
            display: inline-block;
            text-align: center;
        }

        .btn-primary { background-color: var(--accent-primary); border-color: var(--accent-primary); }
        .btn-primary:hover { background-color: var(--accent-secondary); border-color: var(--accent-secondary); }
    </style>
</head>
<body>
    <div class="container py-5">
        
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="font-weight-bold text-dark">
                    <i class="fas fa-history text-primary mr-2" style="color: var(--accent-primary) !important;"></i> Riwayat Belanja
                </h2>
                <p class="text-muted">Pantau status pesanan Anda di sini.</p>
            </div>
        </div>

        <?php if (empty($sudah_login)) : ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm text-center border-0">
                        <div class="card-body p-5">
                            <div class="mb-3"><i class="fas fa-lock fa-3x text-warning"></i></div>
                            <h4>Anda Belum Login</h4>
                            <p class="text-muted">Silakan login terlebih dahulu.</p>
                            <a href="<?= base_url('auth/login') ?>" class="btn btn-primary px-4 py-2 mt-2">Login Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif (empty($transaksi)) : ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm text-center border-0">
                        <div class="card-body p-5">
                            <div class="mb-3"><i class="fas fa-shopping-basket fa-3x text-muted"></i></div>
                            <h4>Belum Ada Transaksi</h4>
                            <p class="text-muted">Wah, keranjang belanjaanmu masih sepi nih.</p>
                            <a href="<?= base_url('produk') ?>" class="btn btn-success px-4 py-2 mt-2">Mulai Belanja</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>
            <?php if($this->session->flashdata('pesan')): ?>
                <?= $this->session->flashdata('pesan'); ?>
            <?php endif; ?>

            <div class="card shadow border-0 rounded-lg">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="py-3 pl-4 text-center" width="5%">No</th>
                                    <th class="py-3">Tanggal Order</th>
                                    <th class="py-3">Total Belanja</th>
                                    <th class="py-3">Status Pesanan</th>
                                    <th class="py-3 text-center">Bukti Bayar</th>
                                    <th class="py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($transaksi as $tr) : ?>
                                <tr>
                                    <td class="text-center font-weight-bold"><?= $no++ ?></td>
                                    
                                    <td>
                                        <span class="d-block font-weight-bold text-dark">
                                            <?= date('d M Y', strtotime($tr->tanggal)) ?>
                                        </span>
                                        <small class="text-muted">
                                            Pukul <?= date('H:i', strtotime($tr->tanggal)) ?> WIB
                                        </small>
                                    </td>

                                    <td class="font-weight-bold text-success">
                                        Rp <?= number_format($tr->total, 0, ',', '.') ?>
                                    </td>

                                    <td>
                                        <?php $status_cek = strtolower($tr->status); ?>
                                        
                                        <?php if ($status_cek == 'pending'): ?>
                                            <span class="badge badge-warning text-dark rounded-pill">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        <?php elseif ($status_cek == 'menunggu konfirmasi'): ?>
                                            <span class="badge badge-info text-white rounded-pill">
                                                <i class="fas fa-spinner mr-1"></i> Menunggu Konfirmasi
                                            </span>
                                        <?php elseif ($status_cek == 'lunas'): ?>
                                            <span class="badge badge-success rounded-pill">
                                                <i class="fas fa-check-circle mr-1"></i> Lunas / Dikemas
                                            </span>
                                        <?php elseif ($status_cek == 'ditolak'): ?>
                                            <span class="badge badge-danger rounded-pill">
                                                <i class="fas fa-times-circle mr-1"></i> Ditolak
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary rounded-pill"><?= $tr->status ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php 
                                            // Cek kolom 'bukti_bayar' dulu, kalau kosong cek 'bukti'
                                            $file_bukti = !empty($tr->bukti_bayar) ? $tr->bukti_bayar : $tr->bukti; 
                                        ?>

                                        <?php if (!empty($file_bukti)): ?>
                                            <a href="<?= base_url('assets/bukti_bayar/' . $file_bukti) ?>" target="_blank" class="btn btn-sm btn-info shadow-sm" title="Lihat Bukti">
                                                <i class="fas fa-eye mr-1"></i> Lihat
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= base_url('transaksi/pembayaran/' . $tr->id_transaksi) ?>" class="btn btn-sm btn-warning shadow-sm">
                                                <i class="fas fa-upload mr-1"></i> Upload
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="<?= base_url('transaksi/detail/' . $tr->id_transaksi) ?>" class="btn btn-sm btn-secondary shadow-sm" title="Lihat Detail Barang">
                                            <i class="fas fa-list-ul"></i> Detail
                                        </a>
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Efek hover halus pada baris tabel
            $('.btn').hover(
                function() { $(this).css('transform', 'translateY(-2px)'); },
                function() { $(this).css('transform', 'translateY(0)'); }
            );
        });
    </script>
</body>
</html>