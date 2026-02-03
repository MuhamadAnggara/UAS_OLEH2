<style>
  /* Custom Styles untuk mempercantik tampilan */
  .bg-dark.py-5 {
    background: linear-gradient(135deg, #1a5f7a 0%, #2c3e50 100%) !important;
    position: relative;
    overflow: hidden;
  }
  
  .bg-dark.py-5::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff10" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,176C960,192,1056,192,1152,170.7C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
    background-size: cover;
  }
  
  .bg-dark.py-5 h1 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    position: relative;
  }
  
  .bg-dark.py-5 .lead {
    font-size: 1.25rem;
    opacity: 0.9;
    position: relative;
  }
  
  .bg-dark.py-5 .lead span {
    font-weight: 500;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.15);
    display: inline-block;
    margin: 0.2rem;
  }
  
  .bg-dark.py-5 .btn-warning {
    background: linear-gradient(to right, #f39c12, #e74c3c);
    border: none;
    transition: all 0.3s ease;
    font-weight: 600;
    position: relative;
  }
  
  .bg-dark.py-5 .btn-warning:hover {
    background: linear-gradient(to right, #e67e22, #c0392b);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4) !important;
  }
  
  .card.shadow-sm {
    transition: all 0.3s ease;
    border: none;
    border-radius: 15px;
    overflow: hidden;
  }
  
  .card.shadow-sm:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
  }
  
  .card.shadow-sm img {
    transition: transform 0.5s ease;
  }
  
  .card.shadow-sm:hover img {
    transform: scale(1.05);
  }
  
  .card.shadow-sm .card-body {
    border-top: 1px solid #f0f0f0;
  }
  
  .text-primary {
    color: #2c3e50 !important;
    font-size: 1.1rem;
  }
  
  .btn-outline-primary {
    border-width: 2px;
    font-weight: 500;
  }
  
  .btn-primary {
    background: linear-gradient(to right, #3498db, #2c3e50);
    border: none;
    transition: all 0.3s ease;
    font-weight: 500;
  }
  
  .btn-primary:hover {
    background: linear-gradient(to right, #2980b9, #1a252f);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(41, 128, 185, 0.4);
  }
  
  h4.fw-bold {
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 30px;
  }
  
  h4.fw-bold::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, #3498db, #f39c12);
    border-radius: 2px;
  }
  
  .text-center.mt-5 {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    padding: 40px !important;
    margin-top: 30px !important;
  }
  
  .text-center.mt-5 .btn-primary {
    padding: 0.8rem 2.5rem;
    font-weight: 600;
  }
  
  .text-muted.mb-3 {
    font-size: 1.1rem;
    color: #6c757d !important;
  }
  
  .text-muted {
    color: #6c757d !important;
    font-style: italic;
  }
  
  .badge {
    padding: 0.4em 0.8em;
    font-weight: 500;
  }
</style>

<!-- HERO -->
<div class="bg-dark text-white py-5 mb-5">
  <div class="container text-center">
    <h1 class="fw-bold">Oleh-Oleh Khas Malang</h1>
    <p class="lead">
      <span>Keripik Tempe Sanan</span> • <span>Strudel Apel</span> • <span>Pia Mangkok</span> • <span>Sari Apel</span>
    </p>
    <a href="<?= base_url('produk') ?>" class="btn btn-warning btn-lg px-4 shadow">
      Belanja Sekarang
    </a>
  </div>
</div>

<!-- PRODUK UNGGULAN -->
<div class="container mb-5">
  <h4 class="mb-4 fw-bold">Produk Unggulan</h4>

  <div class="row">
    <?php if (!empty($produk)): ?>
      <?php foreach ($produk as $p): ?>
        <div class="col-md-3 mb-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="position-relative">
              <img src="<?= base_url('assets/images/produk/'.$p->gambar) ?>"
                   class="card-img-top"
                   style="height:200px; object-fit:cover;"
                   alt="<?= $p->nama_produk ?>">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">Hot</span>
            </div>

            <div class="card-body d-flex flex-column">
              <h6 class="fw-semibold"><?= $p->nama_produk ?></h6>

              <p class="fw-bold text-primary mb-3">
                Rp <?= number_format($p->harga, 0, ',', '.') ?>
              </p>

              <div class="mt-auto d-grid gap-2">
                <!-- DETAIL -->
                <a href="<?= base_url('produk/detail/'.$p->id_produk) ?>"
                   class="btn btn-outline-primary btn-sm">
                  Detail
                </a>

                <!-- TAMBAH KE KERANJANG (FIX UTAMA) -->
                <a href="<?= base_url('cart/tambah/'.$p->id_produk) ?>"
                   class="btn btn-primary btn-sm">
                  Tambah ke Keranjang
                </a>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach ?>
    <?php else: ?>
      <p class="text-muted">Produk belum tersedia.</p>
    <?php endif ?>
  </div>

  <!-- CTA LIHAT SEMUA PRODUK -->
  <div class="text-center mt-5">
    <p class="text-muted mb-3">
      Masih banyak oleh-oleh khas Malang lainnya
    </p>
    <a href="<?= base_url('produk') ?>"
       class="btn btn-primary btn-lg px-5 shadow">
      Lihat Semua Produk →
    </a>
  </div>
</div>