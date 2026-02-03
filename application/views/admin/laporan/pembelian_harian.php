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
        <h3 class="text-primary"><i class="fas fa-file-alt"></i> <?= $judul ?></h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Tanggal</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/laporan/pembelian_harian') ?>" method="post" class="form-inline">
                <label class="mr-2">Pilih Tanggal: </label>
                <input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control mr-2" required>
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Tampilkan</button>
                
                <div class="ml-auto">
                    <a href="<?= base_url('admin/laporan/export_pdf_pembelian_harian/'.$tanggal) ?>" target="_blank" class="btn btn-danger mr-1"><i class="fas fa-file-pdf"></i> Export PDF</a>
                    <a href="<?= base_url('admin/laporan/export_excel_pembelian_harian/'.$tanggal) ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="alert alert-info">
                Menampilkan data tanggal: <strong><?= date('d F Y', strtotime($tanggal)) ?></strong>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>ID Pembelian</th>
                            <th>Nama Supplier</th>
                            <th>Tanggal</th>
                            <th>Total Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($laporan)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-danger">Tidak ada transaksi pembelian pada tanggal ini.</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $no=1; 
                            $grand_total=0; 
                            foreach($laporan as $row): 
                                $grand_total += $row->total;
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>#<?= $row->id_pembelian ?></td>
                                <td><?= $row->nama_supplier ?></td>
                                <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                                <td class="text-right">Rp <?= number_format($row->total, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="font-weight-bold bg-light">
                                <td colspan="4" class="text-center">Total Harian</td>
                                <td class="text-right">Rp <?= number_format($grand_total, 0, ',', '.') ?></td>
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