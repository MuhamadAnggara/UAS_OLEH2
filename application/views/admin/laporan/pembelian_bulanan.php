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
        <h3 class="text-primary"><i class="fas fa-calendar-alt"></i> <?= $judul ?></h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Periode</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/laporan/pembelian_bulanan') ?>" method="post" class="form-inline">
                
                <select name="bulan" class="form-control mr-2">
                    <?php 
                    $bulan_arr = [
                        1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni',
                        7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'
                    ];
                    foreach($bulan_arr as $k => $v) {
                        $selected = ($k == $bulan) ? 'selected' : '';
                        echo "<option value='$k' $selected>$v</option>";
                    }
                    ?>
                </select>

                <select name="tahun" class="form-control mr-2">
                    <?php 
                    $tahun_sekarang = date('Y');
                    for($i=$tahun_sekarang; $i>=$tahun_sekarang-5; $i--) {
                        $selected = ($i == $tahun) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>

                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Lihat</button>

                <div class="ml-auto">
                     <a href="<?= base_url('admin/laporan/export_pdf_pembelian_bulanan/'.$bulan.'/'.$tahun) ?>" target="_blank" class="btn btn-danger mr-1"><i class="fas fa-file-pdf"></i> Export PDF</a>
                     <a href="<?= base_url('admin/laporan/export_excel_pembelian_bulanan/'.$bulan.'/'.$tahun) ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="alert alert-info">
                Menampilkan data periode: <strong><?= $bulan_arr[(int)$bulan] ?> <?= $tahun ?></strong>
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
                                <td colspan="5" class="text-center text-danger">Tidak ada transaksi pembelian pada bulan ini.</td>
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
                                <td colspan="4" class="text-center">Total Bulanan</td>
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