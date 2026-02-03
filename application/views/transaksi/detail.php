<div class="container py-5">
    <div class="row">
        
        <div class="col-lg-8 mb-4">
            
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body d-flex justify-content-between align-items-center bg-white rounded">
                    <div>
                        <h5 class="mb-1 font-weight-bold text-dark" style="color: #5d4037;">
                            <i class="fas fa-file-invoice mr-2"></i> Invoice #<?php echo $transaksi->id_transaksi ?>
                        </h5>
                        <small class="text-muted">
                            <i class="far fa-calendar-alt mr-1"></i> <?php echo date('d F Y', strtotime($transaksi->tanggal)) ?>
                            &nbsp; | &nbsp; 
                            <i class="far fa-clock mr-1"></i> <?php echo date('H:i', strtotime($transaksi->tanggal)) ?> WIB
                        </small>
                    </div>
                    <div>
                        <?php 
                            // Logika Warna Badge Status
                            $badge_class = 'badge-secondary';
                            $icon_status = 'fa-question';
                            
                            if($transaksi->status == 'Pending') {
                                $badge_class = 'badge-warning text-white';
                                $icon_status = 'fa-clock';
                            } elseif($transaksi->status == 'Lunas') {
                                $badge_class = 'badge-success';
                                $icon_status = 'fa-check-circle';
                            } elseif($transaksi->status == 'Ditolak') {
                                $badge_class = 'badge-danger';
                                $icon_status = 'fa-times-circle';
                            }
                        ?>
                        <span class="badge <?php echo $badge_class ?> p-2 px-3 rounded-pill shadow-sm" style="font-size: 0.9rem;">
                            <i class="fas <?php echo $icon_status ?> mr-1"></i> <?php echo strtoupper($transaksi->status) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header text-white py-3" style="background-color: #795548;">
                    <h6 class="mb-0 font-weight-bold"><i class="fas fa-shopping-bag mr-2"></i> Daftar Produk Dibeli</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light text-muted">
                                <tr>
                                    <th class="border-top-0 pl-4 py-3">Produk</th>
                                    <th class="border-top-0 text-center py-3">Harga</th>
                                    <th class="border-top-0 text-center py-3">Qty</th>
                                    <th class="border-top-0 text-right pr-4 py-3">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($detail as $item) : ?>
                                <tr>
                                    <td class="pl-4 align-middle">
                                        <div class="media align-items-center">
                                            <img src="<?php echo base_url('assets/images/produk/'.$item->gambar) ?>" 
                                                 class="d-block ui-w-40 rounded border mr-3 shadow-sm" 
                                                 style="width: 55px; height: 55px; object-fit: cover;">
                                            <div class="media-body">
                                                <span class="d-block text-dark font-weight-bold"><?php echo $item->nama_produk ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle text-muted">
                                        Rp <?php echo number_format($item->harga, 0,',','.') ?>
                                    </td>
                                    <td class="text-center align-middle font-weight-bold">
                                        <?php echo $item->qty ?>
                                    </td>
                                    <td class="text-right font-weight-bold text-dark align-middle pr-4">
                                        Rp <?php echo number_format($item->subtotal, 0,',','.') ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot style="background-color: #fff8e1;">
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold pt-3 text-dark">TOTAL BELANJA</td>
                                    <td class="text-right font-weight-bold text-success h5 pt-3 pr-4">
                                        Rp <?php echo number_format($transaksi->total, 0,',','.') ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="<?php echo base_url('transaksi/riwayat') ?>" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Riwayat
                </a>
            </div>

        </div>

        <div class="col-lg-4">
            
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="mb-0 font-weight-bold" style="color: #5d4037;">
                        <i class="fas fa-map-marker-alt mr-2 text-danger"></i> Info Pengiriman
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block text-uppercase font-weight-bold" style="font-size: 0.7rem;">Penerima</small>
                        <span class="font-weight-bold text-dark" style="font-size: 1.05rem;">
                            <?php echo $transaksi->nama_customer ?>
                        </span>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block text-uppercase font-weight-bold" style="font-size: 0.7rem;">Alamat Tujuan</small>
                        <span class="text-dark">
                            <?php echo !empty($transaksi->alamat) ? $transaksi->alamat : '<span class="text-muted font-italic">(Alamat tidak tersedia)</span>' ?>
                        </span>
                    </div>

                    <div class="mb-0">
                        <small class="text-muted d-block text-uppercase font-weight-bold" style="font-size: 0.7rem;">Kontak / No. HP</small>
                        <span class="text-dark font-weight-bold">
                             <?php echo !empty($transaksi->no_hp) ? $transaksi->no_hp : '-' ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="mb-0 font-weight-bold" style="color: #5d4037;">
                        <i class="fas fa-receipt mr-2 text-warning"></i> Bukti Pembayaran
                    </h6>
                </div>
                <div class="card-body text-center">
                    <?php if(!empty($transaksi->bukti_bayar)) : ?>
                        
                        <div class="position-relative mb-3">
                            <img src="<?php echo base_url('assets/bukti_bayar/'.$transaksi->bukti_bayar) ?>" 
                                 class="img-fluid rounded border shadow-sm" 
                                 style="max-height: 250px; width: 100%; object-fit: contain; background: #f8f9fa;">
                            
                            <a href="<?php echo base_url('assets/bukti_bayar/'.$transaksi->bukti_bayar) ?>" target="_blank" class="btn btn-sm btn-dark position-absolute shadow" style="bottom: 10px; right: 10px; opacity: 0.8;">
                                <i class="fas fa-search-plus"></i> Lihat Penuh
                            </a>
                        </div>
                        
                        <?php if($transaksi->status == 'Pending') : ?>
                            <div class="alert alert-info py-2 small mb-0 rounded-pill">
                                <i class="fas fa-info-circle mr-1"></i> Sedang diverifikasi admin.
                            </div>
                        <?php elseif($transaksi->status == 'Lunas') : ?>
                            <div class="alert alert-success py-2 small mb-0 rounded-pill">
                                <i class="fas fa-check-circle mr-1"></i> Pembayaran Diterima.
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <div class="py-4 bg-light rounded mb-3 border border-light">
                            <i class="fas fa-file-invoice-dollar fa-3x text-muted mb-2"></i>
                            <p class="text-muted small mb-0">Belum ada bukti pembayaran.</p>
                        </div>
                    <?php endif; ?>

                    <?php if($transaksi->status != 'Lunas') : ?>
                        <hr>
                        <a href="<?php echo base_url('transaksi/pembayaran/'.$transaksi->id_transaksi) ?>" class="btn btn-primary btn-block rounded-pill shadow-sm" style="background-color: #795548; border-color: #795548;">
                            <i class="fas fa-upload mr-1"></i> Upload / Ganti Bukti
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>