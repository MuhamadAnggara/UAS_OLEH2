<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ======= STYLE ASLI KAMU (TIDAK DIUBAH) ======= */
        :root {
            --cream-bg: #F8F4EA;
            --cream-card: #FFFDF6;
            --blue-light: #E3F2FD;
            --blue-primary: #42A5F5;
            --blue-dark: #1976D2;
            --blue-hover: #64B5F6;
            --green-primary: #4CAF50;
            --red-primary: #f44336;
            --yellow-primary: #FFC107;
            --gray-text: #424242;
            --gray-border: #E0E0E0;
            --gray-light: #F5F5F5;
            --shadow-light: 0 4px 12px rgba(66, 165, 245, 0.08);
            --shadow-medium: 0 6px 20px rgba(66, 165, 245, 0.12);
        }

        body {
            background-color: var(--cream-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow-light);
            margin-top: 20px;
        }

        h3 {
            color: var(--blue-dark);
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--blue-primary);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        h3::before {
            content: '📦';
            font-size: 1.8rem;
        }

        .table thead {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            color: white;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th:nth-child(2),
        .table td:nth-child(2) {
            text-align: left;
            padding-left: 20px;
        }

        .kategori-badge {
            background-color: var(--blue-light);
            color: var(--blue-dark);
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }

        .stok-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .stok-tinggi { background-color: rgba(76,175,80,.15); color: #4CAF50; }
        .stok-sedang { background-color: rgba(255,193,7,.15); color: #FF9800; }
        .stok-rendah { background-color: rgba(244,67,54,.15); color: #f44336; }

        img {
            border-radius: 10px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3>Data Produk</h3>

    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

    <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> + Tambah Produk
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produk)): ?>
                    <?php $no = 1; foreach ($produk as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($p->nama_produk) ?></td>

                            <!-- ✅ INI KUNCI MASALAH KAMU -->
                            <td>
                                <?php if (!empty($p->nama_kategori)): ?>
                                    <span class="kategori-badge">
                                        <?= htmlspecialchars($p->nama_kategori) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>

                            <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>

                            <td>
                                <?php
                                    $stok_class = 'stok-tinggi';
                                    if ($p->stok < 10) $stok_class = 'stok-rendah';
                                    elseif ($p->stok < 50) $stok_class = 'stok-sedang';
                                ?>
                                <span class="stok-badge <?= $stok_class ?>">
                                    <?= $p->stok ?> unit
                                </span>
                            </td>

                            <td>
                                <?php if (!empty($p->gambar)): ?>
                                    <img src="<?= base_url('assets/images/produk/'.$p->gambar) ?>" width="80" height="80">
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="<?= base_url('admin/produk/edit/'.$p->id_produk) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/produk/hapus/'.$p->id_produk) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus produk ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Data produk belum tersedia
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
