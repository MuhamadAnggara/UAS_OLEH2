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
        <h3 class="text-primary"><i class="fas fa-chart-line"></i> <?= $judul ?></h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/laporan/penjualan_bulanan') ?>" method="post" class="form-inline">
                <label class="mr-2 font-weight-bold text-primary">Periode:</label>
                
                <select name="bulan" class="form-control mr-2">
                    <?php 
                    $bulan_arr = [1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'];
                    foreach($bulan_arr as $k => $v) {
                        $sel = ($k == $bulan) ? 'selected' : '';
                        echo "<option value='$k' $sel>$v</option>";
                    }
                    ?>
                </select>

                <select name="tahun" class="form-control mr-2">
                    <?php 
                    $thn_now = date('Y');
                    for($i=$thn_now; $i>=$thn_now-5; $i--) {
                        $sel = ($i == $tahun) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i</option>";
                    }
                    ?>
                </select>

                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Lihat</button>

                <div class="ml-auto">
                    <a href="<?= base_url('admin/laporan/export_pdf_penjualan_bulanan/'.$bulan.'/'.$tahun) ?>" target="_blank" class="btn btn-danger mr-1"><i class="fas fa-file-pdf"></i> Export PDF</a>
                    <a href="<?= base_url('admin/laporan/export_excel_penjualan_bulanan/'.$bulan.'/'.$tahun) ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="alert alert-info">Menampilkan data periode: <strong><?= $bulan_arr[(int)$bulan] ?> <?= $tahun ?></strong></div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total Belanja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($laporan)): ?>
                            <tr><td colspan="6" class="text-center text-danger font-weight-bold">Tidak ada data penjualan pada periode ini.</td></tr>
                        <?php else: ?>
                            <?php 
                            $no=1; 
                            $grand_total=0; 
                            foreach($laporan as $row): 
                                $grand_total += $row->total;
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>#<?= $row->id_transaksi ?></td>
                                
                                <td>
                                    <?php if(empty($row->nama_customer)): ?>
                                        <span class="text-danger font-italic small">(User Terhapus/Guest)</span>
                                    <?php else: ?>
                                        <?= $row->nama_customer ?>
                                    <?php endif; ?>
                                </td>

                                <td><?= date('d/m/Y', strtotime($row->tanggal)) ?></td>
                                
                                <td>
                                    <?php if($row->status == 'Lunas'): ?>
                                        <span class="badge badge-success">Lunas</span>
                                    <?php elseif($row->status == 'Pending'): ?>
                                        <span class="badge badge-warning">Pending</span>
                                    <?php elseif($row->status == 'Ditolak'): ?>
                                        <span class="badge badge-danger">Ditolak</span>
                                    <?php elseif(empty($row->status)): ?>
                                        <span class="badge badge-secondary">Tanpa Status</span>
                                    <?php else: ?>
                                        <span class="badge badge-info"><?= $row->status ?></span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-right">Rp <?= number_format($row->total, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                            
                            <tr class="font-weight-bold bg-light">
                                <td colspan="5" class="text-center">Total Penjualan Bulanan</td>
                                <td class="text-right text-success">Rp <?= number_format($grand_total, 0, ',', '.') ?></td>
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