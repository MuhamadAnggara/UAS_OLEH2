<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembelian Harian</title>
</head>
<body>

<h3>Laporan Pembelian Harian</h3>
<p>Tanggal: <?= date('d-m-Y') ?></p>

<table border="1" width="100%" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Supplier</th>
        <th>Total</th>
    </tr>

    <?php if (!empty($laporan)): ?>
        <?php $no=1; foreach ($laporan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nama_supplier ?></td>
            <td><?= number_format($row->total,0,',','.') ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Tidak ada data</td>
        </tr>
    <?php endif; ?>
</table>

<script>
window.print();
</script>

</body>
</html>
