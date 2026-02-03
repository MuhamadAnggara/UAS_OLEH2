<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan Bulanan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h2>LAPORAN PENJUALAN BULANAN</h2>
        <p>Periode: <?= $bulan ?> / <?= $tahun ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Customer</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; $total=0; foreach($laporan as $row): $total += $row->total; ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>#<?= $row->id_transaksi ?></td>
                <td><?= $row->nama_customer ?></td>
                <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                <td><?= $row->status ?></td>
                <td>Rp <?= number_format($row->total, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="5" style="text-align:center;">Total Penjualan</th>
                <th>Rp <?= number_format($total, 0, ',', '.') ?></th>
            </tr>
        </tbody>
    </table>
</body>
</html>