<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Oleh-Oleh Malang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f8f5f0;
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }
        .checkout-header {
            background: #424242;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .checkout-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .card-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
            margin-top: 20px;
        }
        .btn-checkout {
            margin-top: 20px;
            width: 100%;
            background: #2c3e50;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-checkout:hover {
            background: #1a252f;
        }
    </style>
</head>

<body>

<div class="container" style="max-width: 900px;">
    
    <div class="checkout-header">
        <i class="bi bi-cart-check-fill" style="font-size: 1.5rem;"></i>
        <h2>Halaman Checkout</h2>
    </div>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($cart)): ?>
        <div class="alert alert-warning text-center py-5">
            <h4><i class="bi bi-exclamation-circle"></i> Keranjang Belanja Kosong</h4>
            <p>Silakan pilih produk terlebih dahulu.</p>
            <a href="<?= base_url('produk') ?>" class="btn btn-primary mt-3">Belanja Sekarang</a>
        </div>
    <?php else: ?>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white fw-bold py-3">
                Ringkasan Pesanan
            </div>
            <div class="card-body p-0">
                <table class="table table-borderless mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Produk</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Harga</th>
                            <th class="text-end pe-4">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $item): ?>
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold"><?= htmlspecialchars($item['nama']) ?></span>
                            </td>
                            <td class="text-center"><?= (int)$item['qty'] ?></td>
                            <td class="text-end">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                            <td class="text-end pe-4 fw-bold">
                                Rp <?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="border-top">
                        <tr class="fw-bold fs-5">
                            <td colspan="3" class="text-end pt-3">Total Bayar</td>
                            <td class="text-end pe-4 pt-3 text-success">
                                Rp <?= number_format($total_belanja, 0, ',', '.') ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <form action="<?= base_url('checkout/proses') ?>" method="post" enctype="multipart/form-data" class="card-form">
            
            <input type="hidden" name="checkout_submit" value="1">
            <input type="hidden" name="total_bayar" value="<?= $total_belanja ?>">

            <h5 class="mb-4 border-bottom pb-2"><i class="bi bi-person-lines-fill"></i> Lengkapi Data Pengiriman</h5>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Penerima</label>
                <input type="text" 
                       name="nama_customer" 
                       class="form-control" 
                       value="<?= isset($customer->nama_customer) ? $customer->nama_customer : '' ?>" 
                       placeholder="Masukkan nama lengkap penerima"
                       required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" 
                           name="email" 
                           class="form-control" 
                           value="<?= isset($customer->email) ? $customer->email : '' ?>" 
                           placeholder="contoh@email.com"
                           required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">No. Handphone / WhatsApp</label>
                    <input type="number" 
                           name="no_hp" 
                           class="form-control" 
                           value="<?= isset($customer->no_hp) ? $customer->no_hp : '' ?>" 
                           placeholder="08xxxxxxxx"
                           required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Alamat Lengkap Pengiriman</label>
                <textarea name="alamat" 
                          class="form-control" 
                          rows="3" 
                          placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan..."
                          required><?= isset($customer->alamat) ? $customer->alamat : '' ?></textarea>
            </div>

            <hr class="my-4">

            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Upload Bukti Transfer</label>
                <div class="input-group">
                    <input type="file" 
                           name="bukti" 
                           class="form-control" 
                           accept="image/png, image/jpeg, image/jpg"
                           required>
                </div>
                <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
            </div>

            <button type="submit" class="btn-checkout">
                <i class="bi bi-shield-lock"></i> Konfirmasi & Proses Pesanan
            </button>

        </form>

    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>