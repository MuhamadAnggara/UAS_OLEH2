<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembelian</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-box {
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

        .table th {
            background: #3498db;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card-box">

        <h3>
            <i class="fas fa-cart-plus"></i>
            Tambah Pembelian
        </h3>

        <form action="<?= base_url('admin/pembelian/simpan') ?>" method="post">

            <!-- ================= SUPPLIER ================= -->
            <div class="form-group">
                <label>Supplier</label>
                <select name="id_supplier" class="form-control" required>
                    <option value="">-- Pilih Supplier --</option>
                    <?php foreach ($supplier as $s): ?>
                        <option value="<?= $s->id_supplier ?>">
                            <?= htmlspecialchars($s->nama_supplier) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <hr>

            <!-- ================= DETAIL PEMBELIAN ================= -->
            <h5 class="mb-3"><i class="fas fa-box"></i> Detail Pembelian</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th width="120">Qty</th>
                        <th width="180">Harga Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- BARIS DETAIL 1 -->
                    <tr>
                        <td>
                            <select name="id_produk[]" class="form-control" required>
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach ($produk as $p): ?>
                                    <option value="<?= $p->id_produk ?>">
                                        <?= htmlspecialchars($p->nama_produk) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="qty[]" class="form-control" min="1" required>
                        </td>
                        <td>
                            <input type="number" name="harga[]" class="form-control" min="0" required>
                        </td>
                    </tr>

                    <!-- BARIS DETAIL 2 (OPSIONAL, BOLEH TAMBAH MANUAL) -->
                    <tr>
                        <td>
                            <select name="id_produk[]" class="form-control">
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach ($produk as $p): ?>
                                    <option value="<?= $p->id_produk ?>">
                                        <?= htmlspecialchars($p->nama_produk) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="qty[]" class="form-control" min="1">
                        </td>
                        <td>
                            <input type="number" name="harga[]" class="form-control" min="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- ================= BUTTON ================= -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Pembelian
                </button>

                <a href="<?= base_url('admin/pembelian') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

        </form>

    </div>
</div>

</body>
</html>
