<div class="container mt-5 mb-5">

<?php if (!empty($produk)): ?>
  <div class="row align-items-start">

    <!-- GAMBAR PRODUK -->
    <div class="col-md-5 mb-4">
      <img
        src="<?= !empty($produk->gambar)
              ? base_url('assets/images/produk/'.$produk->gambar)
              : base_url('assets/images/no-image.png') ?>"
        alt="<?= htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8') ?>"
        class="img-fluid rounded shadow w-100">
    </div>

    <!-- INFORMASI PRODUK -->
    <div class="col-md-7">
      <h2 class="fw-bold mb-2">
        <?= htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8') ?>
      </h2>

      <h4 class="text-primary mb-3">
        Rp <?= number_format((int)$produk->harga, 0, ',', '.') ?>
      </h4>

      <hr>

      <h6 class="fw-semibold">Deskripsi Produk</h6>
      <p class="text-muted">
        <?= nl2br(htmlspecialchars($produk->deskripsi, ENT_QUOTES, 'UTF-8')) ?>
      </p>

      <?php if (isset($produk->stok)): ?>
        <p class="text-muted">
          Stok tersedia:
          <strong><?= (int)$produk->stok ?></strong>
        </p>
      <?php endif; ?>

      <!-- TOMBOL AKSI -->
      <div class="mt-4 d-flex flex-wrap gap-2">

        <?php if (!isset($produk->stok) || $produk->stok > 0): ?>
          <!-- TAMBAH KE KERANJANG (TANPA LOGIN) -->
          <a href="<?= base_url('cart/tambah/'.$produk->id_produk) ?>"
             class="btn btn-success btn-lg">
            🛒 Tambah ke Keranjang
          </a>
        <?php else: ?>
          <!-- STOK HABIS -->
          <button class="btn btn-secondary btn-lg" disabled>
            ❌ Stok Habis
          </button>
        <?php endif; ?>

        <!-- KEMBALI -->
        <a href="<?= !empty($back_url) ? $back_url : base_url('produk') ?>"
           class="btn btn-outline-secondary btn-lg">
          ← Kembali
        </a>

      </div>

    </div>
  </div>

<?php else: ?>
  <div class="alert alert-danger text-center">
    Produk tidak ditemukan.
  </div>
<?php endif; ?>

</div>
