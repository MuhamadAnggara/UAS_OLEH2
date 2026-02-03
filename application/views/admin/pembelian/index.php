<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembelian</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }

        h3 {
            color: #3498db;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        thead {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        thead th {
            text-align: center;
        }

        tbody td {
            vertical-align: middle;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="container-box">

        <h3>
            <i class="fas fa-cart-plus"></i>
            Data Pembelian
        </h3>

        <div class="mb-3">
            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <a href="<?= base_url('admin/pembelian/tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus-circle"></i> Tambah Pembelian
            </a>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="130">Tanggal</th>
                    <th>Supplier</th>
                    <th width="180">Total Pembelian</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pembelian)): ?>
                    <?php $no=1; foreach ($pembelian as $p): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                            <?= date('d-m-Y', strtotime($p->tanggal)) ?>
                        </td>
                        <td><?= htmlspecialchars($p->nama_supplier) ?></td>
                        <td class="text-right">
                            Rp <?= number_format($p->total, 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data pembelian
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
