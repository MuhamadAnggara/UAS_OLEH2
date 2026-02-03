<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            color: #333;
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h2 i {
            color: #3498db;
        }

        .action-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-secondary {
            background-color: #7f8c8d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #636e72;
            transform: translateY(-2px);
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        thead {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        thead th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e8f4fc;
        }

        tbody td {
            padding: 14px 12px;
            color: #555;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }

        .id-column {
            font-weight: bold;
            color: #3498db;
            text-align: center;
        }

        .btn-edit {
            background-color: #f1c40f;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-edit:hover {
            background-color: #f39c12;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            .action-bar {
                flex-direction: column;
            }
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

<h2><i class="fas fa-truck"></i> Data Supplier</h2>

<div class="action-bar">
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

    <a href="<?= base_url('admin/supplier/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah Supplier
    </a>
</div>

<table>
    <thead>
        <tr>
            <th width="50">No</th>
            <th>Nama Supplier</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Alamat</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($supplier)): ?>
            <?php $no = 1; foreach ($supplier as $s): ?>
            <tr>
                <td class="id-column"><?= $no++ ?></td>
                <td style="font-weight:600;color:#2c3e50;">
                    <?= htmlspecialchars($s->nama_supplier) ?>
                </td>
                <td>
                    <i class="fab fa-whatsapp text-success"></i>
                    <?= htmlspecialchars($s->no_telepon) ?>
                </td>
                <td><?= htmlspecialchars($s->email) ?></td>
                <td><?= htmlspecialchars($s->alamat) ?></td>
                <td>
                    <a href="<?= base_url('admin/supplier/edit/'.$s->id_supplier) ?>" class="btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('admin/supplier/hapus/'.$s->id_supplier) ?>"
                       class="btn-delete"
                       onclick="return confirm('Apakah Anda yakin ingin menghapus data supplier ini?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center;padding:30px;color:#999;">
                    <i class="fas fa-info-circle"></i> Belum ada data supplier.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
