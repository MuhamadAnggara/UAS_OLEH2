<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary"><i class="fas fa-cash-register"></i> <?= $judul ?></h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/laporan/penjualan_harian') ?>" method="post" class="form-inline">
                <label class="mr-2 font-weight-bold text-primary">Pilih Tanggal: </label>
                <input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control mr-2" required>
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Tampilkan</button>
                
                <div class="ml-auto">
                    <a href="<?= base_url('admin/laporan/export_pdf_penjualan_harian/'.$tanggal) ?>" target="_blank" class="btn btn-danger mr-1"><i class="fas fa-file-pdf"></i> Export PDF</a>
                    <a href="<?= base_url('admin/laporan/export_excel_penjualan_harian/'.$tanggal) ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="alert alert-info">Menampilkan data tanggal: <strong><?= date('d F Y', strtotime($tanggal)) ?></strong></div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama Customer</th>
                            <th>Status</th>
                            <th>Total Belanja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($laporan)): ?>
                            <tr><td colspan="5" class="text-center text-danger">Tidak ada penjualan pada tanggal ini.</td></tr>
                        <?php else: ?>
                            <?php $no=1; $total=0; foreach($laporan as $row): $total += $row->total; ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>#<?= $row->id_transaksi ?></td>
                                <td><?= $row->nama_customer ? $row->nama_customer : 'Guest/Dihapus' ?></td>
                                <td>
                                    <?php if($row->status == 'Lunas'): ?>
                                        <span class="badge badge-success">Lunas</span>
                                    <?php elseif($row->status == 'Pending'): ?>
                                        <span class="badge badge-warning">Pending</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger"><?= $row->status ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-right">Rp <?= number_format($row->total, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="font-weight-bold bg-light">
                                <td colspan="4" class="text-center">Total Penjualan</td>
                                <td class="text-right">Rp <?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>