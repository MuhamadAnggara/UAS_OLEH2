<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_Bulanan_".$bulan."_".$tahun.".xls");
?>
<center>
    <h3>Laporan Penjualan Bulanan</h3>
    <p>Periode: <?= $bulan ?> / <?= $tahun ?></p>
</center>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Customer</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; $tot=0; foreach($laporan as $row): $tot+=$row->total; ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>#<?= $row->id_transaksi ?></td>
            <td><?= $row->nama_customer ?></td>
            <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
            <td><?= $row->status ?></td>
            <td><?= $row->total ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="5">Total</th>
            <th><?= $tot ?></th>
        </tr>
    </tbody>
</table>