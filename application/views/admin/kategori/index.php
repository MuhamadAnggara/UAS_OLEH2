<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
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
            content: '📂';
            font-size: 1.8rem;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .left-actions {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-secondary,
        .btn-primary {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover,
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--blue-hover), var(--blue-primary));
            transform: translateY(-2px);
            color: white;
        }

        .stats-card {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            text-align: center;
        }

        .stats-card h4 {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
        }

        .stats-card p {
            margin: 5px 0 0;
            font-size: 0.9rem;
        }

        .search-box {
            position: relative;
            max-width: 300px;
            width: 100%;
        }

        .search-box input {
            padding: 10px 15px 10px 40px;
            border-radius: 10px;
            border: 2px solid var(--gray-border);
            width: 100%;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--blue-primary);
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-light);
        }

        .table thead {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            color: white;
        }

        .kategori-badge {
            padding: 8px 16px;
            border-radius: 20px;
            border: 2px solid var(--blue-primary);
            background: var(--blue-light);
            font-weight: 600;
            color: var(--blue-dark);
        }

        .btn-sm {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--yellow-primary), #FF9800);
            color: #333;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--red-primary), #d32f2f);
            color: white;
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="action-bar">
        <div class="left-actions">
            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>

            <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Kategori
            </a>

            <!-- ✅ FIX: TOTAL KATEGORI DARI DATABASE -->
            <div class="stats-card">
                <h4><?= isset($total_kategori) ? $total_kategori : 0 ?></h4>
                <p>Total Kategori</p>
            </div>
        </div>

        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Cari kategori...">
        </div>
    </div>

    <h3>Data Kategori</h3>

    <div class="table-responsive">
        <table class="table table-bordered" id="kategoriTable">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Nama Kategori</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kategori)) : ?>
                    <?php $no = 1; foreach ($kategori as $k) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <span class="kategori-badge">
                                    <?= htmlspecialchars($k->nama_kategori) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/kategori/edit/'.$k->id_kategori) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/kategori/hapus/'.$k->id_kategori) ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus kategori ini?')">
                                   <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <i class="fas fa-folder-open fa-3x"></i>
                                <h5>Belum ada kategori</h5>
                                <p>Mulai dengan menambahkan kategori pertama</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('input', function () {
    let filter = this.value.toLowerCase();
    document.querySelectorAll('#kategoriTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
    });
});
</script>

</body>
</html>
