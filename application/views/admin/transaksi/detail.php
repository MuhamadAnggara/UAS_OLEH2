<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    
    <div class="mb-3">
        <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Transaksi
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="m-0"><i class="fas fa-file-invoice"></i> Detail Transaksi #<?= $transaksi->id_transaksi ?></h5>
            <?php 
                $status_class = 'badge-secondary';
                if($transaksi->status == 'Lunas') $status_class = 'badge-success';
                elseif($transaksi->status == 'Pending') $status_class = 'badge-warning';
                elseif($transaksi->status == 'Ditolak') $status_class = 'badge-danger';
                elseif($transaksi->status == 'Dikirim') $status_class = 'badge-info';
            ?>
            <span class="badge <?= $status_class ?> p-2"><?= $transaksi->status ?></span>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted font-weight-bold">DATA CUSTOMER</h6>
                    <hr class="mt-0">
                    <h5 class="font-weight-bold"><?= $transaksi->nama_customer ?></h5>
                    <p class="mb-1"><i class="fas fa-phone fa-fw text-muted"></i> <?= $transaksi->no_hp ? $transaksi->no_hp : '-' ?></p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt fa-fw text-muted"></i> <?= $transaksi->alamat ? $transaksi->alamat : '-' ?></p>
                </div>
                
                <div class="col-md-6">
                    <h6 class="text-muted font-weight-bold">INFO PESANAN</h6>
                    <hr class="mt-0">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <td width="150">Tanggal Order</td>
                            <td>: <strong><?= date('d F Y, H:i', strtotime($transaksi->tanggal)) ?></strong></td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td>: <strong class="text-success" style="font-size: 1.2rem;">Rp <?= number_format($transaksi->total, 0, ',', '.') ?></strong></td>
                        </tr>
                        <tr>
                            <td>Status Saat Ini</td>
                            <td>: <strong><?= $transaksi->status ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="text-muted font-weight-bold">RINCIAN BARANG</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th class="text-center">Qty</th>
                                <th class="text-right">Harga Satuan</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1; 
                            if(!empty($detail)): 
                                foreach($detail as $d): 
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d->nama_produk ?></td>
                                <td class="text-center"><?= $d->qty ?></td>
                                <td class="text-right">Rp <?= number_format($d->harga, 0, ',', '.') ?></td>
                                <td class="text-right">Rp <?= number_format($d->harga * $d->qty, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td colspan="4" class="text-right">TOTAL PEMBAYARAN</td>
                                <td class="text-right text-success">Rp <?= number_format($transaksi->total, 0, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h6 class="text-muted font-weight-bold mb-3 text-center"><i class="fas fa-image"></i> BUKTI PEMBAYARAN</h6>
                    
                    <div class="card border-left-primary shadow-sm h-100 py-3">
                        <div class="card-body text-center">
                            <?php if(empty($transaksi->bukti_bayar)): ?>
                                <div class="alert alert-warning m-0">
                                    <i class="fas fa-exclamation-circle"></i> User belum mengupload bukti pembayaran.
                                </div>
                            <?php else: ?>
                                <img src="<?= base_url('assets/bukti_bayar/' . $transaksi->bukti_bayar) ?>" 
                                     class="img-fluid rounded shadow-sm mb-3" 
                                     style="max-height: 400px; width: auto;" 
                                     alt="Bukti Bayar">
                                <br>
                                <a href="<?= base_url('assets/bukti_bayar/' . $transaksi->bukti_bayar) ?>" target="_blank" class="btn btn-outline-primary">
                                    <i class="fas fa-search-plus"></i> Lihat Ukuran Penuh
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div> </div> </div>
</body>
</html>