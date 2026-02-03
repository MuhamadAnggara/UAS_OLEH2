<?php
// Header ini wajib ada biar browser download sebagai file Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Pembelian_Bulan_".$bulan."_".$tahun.".xls");
?>

<center>
    <h3>Laporan Pembelian Bulanan</h3>
    <p>Periode: Bulan <?= $bulan ?> Tahun <?= $tahun ?></p>
</center>

<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>ID Pembelian</th>
            <th>Nama Supplier</th>
            <th>Tanggal</th>
            <th>Total Pembelian</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1; 
        $total_akhir = 0;
        
        if(empty($laporan)) {
            echo "<tr><td colspan='5' align='center'>Data tidak ditemukan pada bulan ini</td></tr>";
        } else {
            foreach($laporan as $row): 
                $total_akhir += $row->total;
        ?>
        <tr>
            <td align="center"><?= $no++ ?></td>
            <td>#<?= $row->id_pembelian ?></td>
            <td><?= $row->nama_supplier ?></td>
            <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
            <td align="right">Rp <?= number_format($row->total, 0, ',', '.') ?></td>
        </tr>
        <?php 
            endforeach; 
        }
        ?>
        <tr>
            <th colspan="4" align="center">Total Keseluruhan</th>
            <th align="right">Rp <?= number_format($total_akhir, 0, ',', '.') ?></th>
        </tr>
    </tbody>
</table>