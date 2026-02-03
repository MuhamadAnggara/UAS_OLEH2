<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .main-card { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-top: 20px; }
        .icon-box { background-color: #3498db; padding: 10px; border-radius: 10px; color: white; display: flex; align-items: center; justify-content: center; }
        .header-title { color: #3498db; font-weight: 700; }
        .form-control { border-radius: 10px; padding: 12px; border: 1px solid #ddd; }
        .btn-custom-blue { background-color: #3498db; color: white; border-radius: 10px; padding: 10px 25px; font-weight: 600; border: none; }
        .btn-custom-gray { background-color: #7f8c8d; color: white; border-radius: 10px; padding: 10px 25px; font-weight: 600; border: none; }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="card main-card">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
                <div class="icon-box"><i class="fas fa-truck fa-lg"></i></div>
                <h3 class="header-title mb-0 ml-3">Tambah Data Supplier</h3>
            </div>
            <hr class="mb-4">

            <form action="<?= base_url('admin/supplier/simpan') ?>" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Nama Supplier</label>
                        <input type="text" name="nama_supplier" class="form-control" placeholder="Masukkan nama supplier" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">No. HP / WhatsApp</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="font-weight-bold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="supplier@email.com" required>
                </div>
                <div class="mb-4">
                    <label class="font-weight-bold">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap supplier" required></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-custom-blue mr-2">
                        <i class="fas fa-save mr-1"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('admin/supplier') ?>" class="btn btn-custom-gray">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>