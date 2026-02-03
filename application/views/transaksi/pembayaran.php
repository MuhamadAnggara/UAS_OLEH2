<div class="container-fluid" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0 font-weight-bold">Konfirmasi Pembayaran</h5>
                </div>
                
                <div class="card-body">
                    <div class="alert alert-info">
                        <strong>Total Tagihan:</strong> <br>
                        <h3 class="text-success font-weight-bold">Rp <?= number_format($transaksi->total, 0, ',', '.') ?></h3>
                        <small>Silakan transfer ke Bank BRI: <b>123-456-7890</b> a.n Toko Oleh-Oleh</small>
                    </div>

                    <?= $this->session->flashdata('pesan'); ?>
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <?php echo form_open_multipart('transaksi/pembayaran/' . $transaksi->id_transaksi); ?>

                        <div class="form-group">
                            <label>Nama Bank Pengirim</label>
                            <input type="text" name="nama_bank" class="form-control" placeholder="Contoh: BRI, BCA, Mandiri" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Pemilik Rekening</label>
                            <input type="text" name="nama_rekening" class="form-control" placeholder="Nama pengirim..." required>
                        </div>

                        <div class="form-group">
                            <label>Upload Bukti Pembayaran (Struk/Screenshot)</label>
                            <input type="file" name="bukti_bayar" class="form-control-file" required>
                            <small class="text-muted text-danger">* Format: JPG/PNG/PDF. Maksimal 2MB.</small>
                        </div>

                        <hr>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-upload mr-1"></i> Kirim Bukti Pembayaran
                        </button>
                        
                        <a href="<?= base_url('transaksi') ?>" class="btn btn-secondary btn-block mt-2">Batal</a>

                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>