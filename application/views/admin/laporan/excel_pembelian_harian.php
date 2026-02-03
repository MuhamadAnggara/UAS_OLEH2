<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Pembelian_".$tanggal.".xls");
?>

<center>
    <h3>Laporan Pembelian Tanggal: <?= $tanggal ?></h3>
</center>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pembelian</th>
            <th>Supplier</th>
            <th>Tanggal</th>
            <th>Total Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; $total_semua=0; foreach($laporan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->id_pembelian ?></td>
            <td><?= $row->nama_supplier ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= number_format($row->total, 0, ',', '.') ?></td>
        </tr>
        <?php $total_semua += $row->total; endforeach; ?>
        <tr>
            <th colspan="4">Total Seluruhnya</th>
            <th>Rp. <?= number_format($total_semua, 0, ',', '.') ?></th>
        </tr>
    </tbody>
</table>