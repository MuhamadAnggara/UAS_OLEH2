<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,.1);
        }

        h2 {
            color: #f39c12;
            border-bottom: 2px solid #f39c12;
            padding-bottom: 10px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: span 2;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        input, textarea {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52,152,219,.2);
        }

        textarea {
            resize: vertical;
        }

        .btn-group {
            margin-top: 30px;
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 12px 22px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-warning {
            background-color: #f1c40f;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #f39c12;
        }

        .btn-secondary {
            background-color: #7f8c8d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #636e72;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .form-group.full {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2><i class="fas fa-edit"></i> Edit Data Supplier</h2>

    <form action="<?= base_url('admin/supplier/update') ?>" method="post">
        <input type="hidden" name="id_supplier" value="<?= $supplier->id_supplier ?>">

        <div class="form-grid">
            <div class="form-group">
                <label>Nama Supplier</label>
                <input type="text"
                       name="nama_supplier"
                       value="<?= htmlspecialchars($supplier->nama_supplier) ?>"
                       required>
            </div>

            <div class="form-group">
                <label>No. HP / WhatsApp</label>
                <!-- 🔥 FIX UTAMA -->
                <input type="text"
                       name="no_hp"
                       value="<?= htmlspecialchars($supplier->no_telepon) ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="<?= htmlspecialchars($supplier->email) ?>">
            </div>

            <div class="form-group full">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" rows="4"><?= htmlspecialchars($supplier->alamat) ?></textarea>
            </div>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-warning">
                <i class="fas fa-save"></i> Update Data
            </button>

            <a href="<?= base_url('admin/supplier') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>

</body>
</html>
